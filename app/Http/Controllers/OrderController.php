<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Api;

use App\Address;
use App\Cart;
use App\Order;
use App\OrderProduct;
use App\Wallet;
use App\WalletFollowup;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function placeOnlineOrder(Request $request)
    {
    	$input = $request->all();
        $api = new Api(config('custom.razor_key'), config('custom.razor_secret'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 

            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error',$e->getMessage());
                return redirect()->back();
            }

            // order submit
               $data['delivery_address'] = Address::where('is_default','1')->where('user_id',Auth::user()->id)->where('status','1')->value('id');
               $data['total_price'] = $request->session()->get('total_price');
               $data['discount_price'] = $request->session()->get('discount_price');
		       $data['total_payable_amount'] = $request->session()->get('total_payable_amount');
		       $data['wallet_amount'] = $request->session()->get('wallet_amount');
		       $data['shipping_charge'] = $request->session()->get('delivery_price');
		       $data['unique_order_id'] = app('App\Http\Controllers\BaseController')->generateUniqueNum();
		       $data['txn_id'] = $input['razorpay_payment_id'];
		       $data['payment_method'] = "Online: Razorpay";
               $data['cod_charge'] = "";
		       $data['order_status'] = "Placed";
		       Order::create_new_order($data);
		       $current_order_id = Order::where('unique_order_id',$data['unique_order_id'])->value('id');
		       $session_id = Session::get('session_id');
		       $cart_items = Cart::where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->get();
		       foreach ($cart_items as $cart_item) {
		       	 OrderProduct::insert([
                     'order_id' => $current_order_id,
                     'user_id' => Auth::user()->id,
                     'product_id' => $cart_item->product_id,
                     'product_qty' => $cart_item->quantity,
                     'product_price' => $cart_item->price,
		       	 ]);
		       }
		       Cart::where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->delete();
           app('App\Http\Controllers\ForwardController')->triggerSmsOrderPlaced($data);
		       if(session()->get('wallet_amount') > 0){
		       	$this->updateUserWallet(Auth::user()->unique_user_id, $data['wallet_amount'], $current_order_id);
		       }
           $coin = round($data['total_payable_amount'] / 100);
           $this->addCashbackInWallet($coin,$current_order_id);
            $request->session()->forget('total_price');
            $request->session()->forget('discount_price');
		        $request->session()->forget('total_payable_amount');
            $request->session()->forget('wallet_amount');
            $request->session()->forget('delivery_price');
            $request->session()->forget('usewalletbalance');
		        Session::put('status','success');
            Session::put('unique_order_id',$data['unique_order_id']);
		        return redirect()->route('order-success');
        }
        return redirect()->route('/')->with('error','something went wrong!');
    }
    public function placeCodOrder(Request $request)
    {
        $data['delivery_address'] = Address::where('is_default','1')->where('user_id',Auth::user()->id)->where('status','1')->value('id');
               $data['total_price'] = $request->session()->get('total_price');
               $data['discount_price'] = $request->session()->get('discount_price');
               $data['wallet_amount'] = $request->session()->get('wallet_amount');
               $data['shipping_charge'] = $request->session()->get('delivery_price');
               $data['unique_order_id'] = app('App\Http\Controllers\BaseController')->generateUniqueNum();
               $data['txn_id'] = "";
               $data['payment_method'] = "cod";
               $data['cod_charge'] = "50";
               $data['order_status'] = "Placed";
               $data['total_payable_amount'] = $request->session()->get('total_payable_amount') + $data['cod_charge'];
               Order::create_new_order($data);
               $current_order_id = Order::where('unique_order_id',$data['unique_order_id'])->value('id');
               $session_id = Session::get('session_id');
               $cart_items = Cart::where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->get();
               foreach ($cart_items as $cart_item) {
                 OrderProduct::insert([
                     'order_id' => $current_order_id,
                     'user_id' => Auth::user()->id,
                     'product_id' => $cart_item->product_id,
                     'product_qty' => $cart_item->quantity,
                     'product_price' => $cart_item->price,
                 ]);
               }
               Cart::where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->delete();
               app('App\Http\Controllers\ForwardController')->triggerSmsOrderPlaced($data);
               if(session()->get('wallet_amount') > 0){
                $this->updateUserWallet(Auth::user()->unique_user_id, $data['wallet_amount'],$current_order_id);
               }
               $coin = round($data['total_payable_amount'] / 100);
               $this->addCashbackInWallet($coin,$current_order_id);
               $request->session()->forget('total_price');
               $request->session()->forget('discount_price');
               $request->session()->forget('total_payable_amount');
               $request->session()->forget('wallet_amount');
               $request->session()->forget('delivery_price');
               $request->session()->forget('usewalletbalance');
               Session::put('status','success');
               Session::put('unique_order_id',$data['unique_order_id']);
               return redirect()->route('order-success');
      
    }
    public function updateUserWallet($user_id, $wallet_amount, $current_order_id)
    {
      $wallet_blnc = Wallet::where('user_id',$user_id)->value('wallet_balance');
      $current_wallet_balance = $wallet_blnc - $wallet_amount;
      Wallet::where('user_id',$user_id)->update([
        'wallet_balance' => $current_wallet_balance
      ]);
      WalletFollowup::insert([
        'user_id' => $user_id,
        'order_id' => $current_order_id,
        'description' => "Wallet amount ".$wallet_amount." has used for your order",
        'add_deduct_type' => 'deduct'
      ]);
    }
    public function addCashbackInWallet($coin,$orderid)
    {
      $wallet = Wallet::where('user_id',Auth::user()->unique_user_id)->count();
      if($wallet > 0){
        $pw_balance = Wallet::where('user_id',Auth::user()->unique_user_id)->value('pending_wallet_balance');
        Wallet::where('user_id',Auth::user()->unique_user_id)->update([
            'pending_wallet_balance' => $pw_balance + $coin ,
        ]);
      }
      else{
        Wallet::insert([
          'user_id' => Auth::user()->unique_user_id,
          'pending_wallet_balance' => $coin,
        ]);
      }
      
      WalletFollowup::insert([
        'user_id' => Auth::user()->unique_user_id,
        'order_id' => $orderid,
        'description' => $coin." coin added",
        'coin' => $coin,
        'add_deduct_type' => "add",
      ]);
    }
    public function orderSuccess()
    {
    	return view('frontend.order-success');
    }
}
