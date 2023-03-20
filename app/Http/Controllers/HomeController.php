<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Rules\MatchOldPassword;

use App\Cart;
use App\Address;
use App\Order;
use App\Wallet;
use App\WalletFollowup;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function checkout(Request $request)
    {
       $userCartItems = Cart::userCartItems();
       $userCartItems_count = Cart::userCartItems_count();
       if($userCartItems_count >0){
         return view('frontend.checkout',compact('userCartItems','userCartItems_count'));
       }else{
         return back()->with('error','Your cart is empty !'); 
       } 
    }
    public function useWalletBalanceInCart()
    {
        session()->put('usewalletbalance', 'check');
        return back();
    }
    public function uncheckWalletBalanceInCart()
    {
        session()->put('usewalletbalance', 'uncheck');
        return back();
    }
    public function checkoutAddresses()
    { 
      session()->put('address-type', 'checkout-address');
      return view('frontend.address.checkout-addresses');
    }
    public function addresses()
    {
      session()->put('address-type', 'account-address');
      return view('frontend.address.checkout-addresses');
    }
    public function addNewAddress()
    {
      return view('frontend.address.add-new-address');
    }
    public function postAddNewAddress(Request $request)
    {
      $validatedData = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'save_as' => 'required',
        ]);
      $default_address_count = Address::where('user_id',Auth::user()->id)->where('is_default',1)->where('status',1)->count();
      if($default_address_count > 0){
         Address::where('user_id',Auth::user()->id)->where('is_default',1)->where('status',1)->update(['is_default' => 0 ]);
      }
      Address::insert([
        'user_id' => Auth::user()->id,
        'name' => $request->get('name'),
        'mobile' => $request->get('mobile'),
        'alt_mobile' => $request->get('alt_mobile'),
        'address' => $request->get('address'),
        'locality' => $request->get('locality'),
        'landmark' => $request->get('landmark'),
        'city' => $request->get('city'),
        'state' => $request->get('state'),
        'country' => $request->get('country'),
        'pincode' => $request->get('pincode'),
        'this_is_my' => $request->get('save_as'),
        'is_default' => 1
      ]);
      if(session()->get('address-type') == "checkout-address"){
          return redirect()->route('checkout');
      }elseif(session()->get('address-type') == "account-address"){
          return redirect()->route('addresses');
      }
    }
    public function setDefaultAddress($id)
    {
      $default_address_count = Address::where('user_id',Auth::user()->id)->where('is_default',1)->where('status',1)->count();
      if($default_address_count > 0){
         Address::where('user_id',Auth::user()->id)->where('is_default',1)->where('status',1)->update(['is_default' => 0 ]);
      }
      Address::where('user_id',Auth::user()->id)->where('id',$id)->update(['is_default' => 1 ]);
      if(session()->get('address-type') == "checkout-address"){
          return redirect()->route('checkout');
      }elseif(session()->get('address-type') == "account-address"){
          return redirect()->route('addresses');
      }
    }
    public function removeAddress($id)
    {
      Address::where('user_id',Auth::user()->id)->where('id',$id)->update(['status' => 0 ]);
      return redirect()->back();
    }
    public function updateAddress($id)
    {
       $address_count = Address::where('id',$id)->where('status',1)->count();
       if($address_count == 0){
          return back()->with('error','Something went wrong!');
       }
       else{
          $address = Address::where('id',$id)->where('status',1)->first();
          return view('frontend.address.edit-address',compact('address','id'));
       }
       return back()->with('error','Something went wrong!');
    }
    public function postUpdateAddress(Request $request)
    {
      $validatedData = $request->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'pincode' => 'required',
            'save_as' => 'required',
        ]);
        Address::where('id',$request->address_id)->update([
          'user_id' => Auth::user()->id,
          'name' => $request->get('name'),
          'mobile' => $request->get('mobile'),
          'alt_mobile' => $request->get('alt_mobile'),
          'address' => $request->get('address'),
          'locality' => $request->get('locality'),
          'landmark' => $request->get('landmark'),
          'city' => $request->get('city'),
          'state' => $request->get('state'),
          'country' => $request->get('country'),
          'pincode' => $request->get('pincode'),
          'this_is_my' => $request->get('save_as'),
        ]);
        if(session()->get('address-type') == "checkout-address"){
          return redirect()->route('checkout-addresses');
        }elseif(session()->get('address-type') == "account-address"){
            return redirect()->route('addresses');
        }
    }
    public function orders()
    {
     $orders = Order::orderBy('id','desc')->where('user_id',Auth::user()->id)->get();
     $orders_count = Order::orderBy('id','desc')->where('user_id',Auth::user()->id)->count();
     return view('frontend.order.orders',compact('orders','orders_count'));
   }
   public function orderDetails($id)
   {
     $order_details = Order::where('id',$id)->where('user_id',Auth::user()->id)->count();
     if($order_details>0)
     {
       $order_details = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
       $delivery_address = app('App\Http\Controllers\BaseController')->getDeliveryAddress($order_details->delivery_address);
       return view('frontend.order.order-details',compact('order_details','delivery_address'));
     }
     else{
       return redirect()->back()->with('error', 'Oops! Something went wrong');
     }
   }
   public function wallet()
   {
     $wallet_count = Wallet::where('user_id',Auth::user()->unique_user_id)->count();
     return view('frontend.wallet.wallet',compact('wallet_count')); 
   }
   public function moveToWallet($id)
   {
     $wallet_followup_count = WalletFollowup::where('id',$id)->where('user_id',Auth::user()->unique_user_id)->count();
     if($wallet_followup_count > 0){
       $wallet_followup = WalletFollowup::where('id',$id)->where('user_id',Auth::user()->unique_user_id)->first();
       $pending_blnc = $wallet_followup->coin;
       $wallet = Wallet::where('user_id',Auth::user()->unique_user_id)->first();
       $updt_wallet_balance = $wallet->wallet_balance + $pending_blnc;
       $updt_pending_wallet_balance = $wallet->pending_wallet_balance - $pending_blnc;
       Wallet::where('user_id',Auth::user()->unique_user_id)->update([
         'wallet_balance' => $updt_wallet_balance,
         'pending_wallet_balance' => $updt_pending_wallet_balance
       ]);
       WalletFollowup::where('id',$id)->update(['wallet_added_status' => 'added' ]);
       return redirect()->back()->with('message', 'Successfully moved to wallet');
     }else{
       return redirect()->back()->with('error', 'Oops! Something went wrong');
     }
   }
   public function profile()
   {
      $user_details = User::where('id',Auth::user()->id)->first();
      return view('frontend.profile.my-profile',compact('user_details'));
   }
   public function userChangePassword(Request $request)
   {
       $request->validate([
            'currentpassword' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'confirmpassword' => ['same:newpassword'],
        ]);
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->newpassword)]);
        return redirect()->back()->with('message', 'Password changed successfully!');
   }
}
