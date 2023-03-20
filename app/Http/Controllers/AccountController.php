<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Traits\OtpTrait;

use App\User;
use App\Wallet;
use App\WalletFollowup;
use App\Pet;
use App\Category;
use App\Product;
use App\Cart;
use App\Pincode;

use DB;

class AccountController extends Controller
{
   use OtpTrait;

   public function postRegister(Request $request)
   {
      $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => 'required|regex:/[0-9]{10}/|min:10|max:13|unique:users',
            'password' => ['required', 'string', 'min:6', 'confirmed'],
      ]);
      session()->put('user', $request->all());
      session()->put('mobile', $request->mobile);
      $otp = $this->generateOtp(1000,9999);
      session()->put('otp', $otp);
      $data['otp'] = $otp;
      app('App\Http\Controllers\ForwardController')->triggerOtp($data);
      return redirect()->route('user-verify-mobile');
   }
   public function verifyMobile()
   {
        if(session()->has('otp'))
        {
            return view('otp.user.verify-mobile');
        }else{
           return redirect()->route('register');
        }
        
   }
   public function resendOtp()
    {
        session()->forget('otp');
        $otp = $this->generateOtp(1000,9999);
        session()->put('otp',$otp);
        $data['otp'] = $otp;
        app('App\Http\Controllers\ForwardController')->triggerOtp($data);
        return redirect()->back()->with('message', 'A new otp has been send to your mobile!');
    }
    public function verifyOtp(Request $request)
    {
        $input = $request->get('n1').$request->get('n2').$request->get('n3').$request->get('n4');
        if($input){
          $otp = $request->session()->get('otp');
          if($input != $otp){
          	return redirect()->back()->with('error', 'You have entered a wrong OTP!');
            return redirect()->back();
          }else{
            session()->forget('otp');
            $data = $request->session()->get('user');
            $unique_num = $this->generateUserId();
            $unique_id = 'UID'.$unique_num;
            User::createUser($data,$unique_id);
            if($data['referby'] != "")
            {
            	$referid_count = User::where('unique_user_id',$data['referby'])->count();
            	if($referid_count > 0)
            	{
                $wallet_count = Wallet::where('user_id',$data['referby'])->count();
                $referby = User::where('unique_user_id',$data['referby'])->first();
                if($wallet_count > 0){
                  $wallet_balance = Wallet::where('user_id',$data['referby'])->value('wallet_balance');
                  $update_wb = $wallet_balance + 100;
                  Wallet::where('user_id',$data['referby'])->update([
                    'wallet_balance' => $update_wb,
                  ]);
                  WalletFollowup::insert([
                    'user_id' => $referby->unique_user_id,
                    'description' => "Referral bonus added",
                    'add_deduct_type' => "add",
                    'refer_to' => $unique_id,
                  ]);
                }
                else{
                  $referby = User::where('unique_user_id',$data['referby'])->first();
                  Wallet::insert([
                    'user_id' => $referby->unique_user_id,
                    'wallet_balance' => '100',
                  ]);
                  WalletFollowup::insert([
                    'user_id' => $referby->unique_user_id,
                    'description' => "Referral bonus added",
                    'add_deduct_type' => "add",
                    'refer_to' => $unique_id,
                  ]);
                }
            	}
            }
            return redirect()->route('login')->with('message', 'You have registered successfully!');
         }
       }else{
           return redirect()->back()->with('error', 'Enter a valid OTP!');
      }
    }
     public function generateUserId()
    {
        $user=User::orderBy('id','desc')->first();
        if($user){
            $id=$user['unique_user_id'];
            $number=explode('UID',$id);
            $number[1]++;
            $unique_num=sprintf('%05d', $number[1]);
            return $unique_num;
        }
        else{
         $unique_num="00001";
         return $unique_num;
       }
    }
    public function checkReferId(Request $request)
    {
    	$referid = $request->referid;
    	$referid_count = User::where('unique_user_id',$referid)->count();
    	if($referid_count > 0)
    	{
    		echo "<span style='color:green;font-size:12px'>Valid referral code</span>";
    	}else{
           echo "<span style='color:red;font-size:12px'>Invalid referral code</span>";
    	} 
    }
    public function forgotPassword()
    {
     return view('auth.forgot-password');
    }
    public function sendOtp(Request $request)
    {
      $request->validate([
        'mobile' => 'required|regex:/[0-9]{10}/|min:10|max:13',
      ]);
      $input = $request->mobile;
      $user_count = DB::table('users')->where('mobile',$input)->count();
      if($user_count > 0){
        session()->put('mobile',$request->mobile);
        $otp = $this->generateOtp(1000,9999);
        session()->put('otp',$otp);
        $data['otp'] = $otp;
        app('App\Http\Controllers\ForwardController')->triggerOtp($data);
        return redirect()->route('fp-verify-mobile');
      }
      else{
        return back()->with('error','Please enter your registered mobile number!');
      }
    }
    public function fpVerifyMobile()
   {
      if(session()->has('otp'))
      {
         return view('otp.user.fp-verify-mobile');
      }else{
         return redirect()->route('forgot-password');
      }
   }
   public function fpResendOtp()
   {
        session()->forget('otp');
        $otp = $this->generateOtp(1000,9999);
        session()->put('otp',$otp);
        $data['otp'] = $otp;
        app('App\Http\Controllers\ForwardController')->triggerOtp($data);
        return redirect()->route('fp-verify-mobile')->with('message', 'A new otp has been send to your mobile!');
    }
   public function fpVerifyOtp(Request $request)
   {
      $input = $request->get('n1').$request->get('n2').$request->get('n3').$request->get('n4');
      if($input){
        $otp = $request->session()->get('otp');
        if($input != $otp){
          return redirect()->back()->with('error', 'You have entered a wrong otp');
        }else{
          return redirect()->route('reset-password');
        }
      }else{
        return redirect()->back()->with('error', 'Enter a valid otp');
      }
   }
   public function resetPassword()
   {
     return view('auth.passwords.reset-password');
   }
   public function postResetPassword(Request $request)
   {
      $request->validate([
          'newpassword' => ['required'],
          'confirmpassword' => ['same:newpassword'],
      ]);
      User::where('mobile',session()->get('mobile'))->update(['password'=> Hash::make($request->newpassword)]);
      session()->forget('otp');
      session()->forget('mobile');
      return redirect()->route('login')->with('message', 'Password reset successfully!');
   }
   public function dog()
   {
      $id_count = Pet::where('pet_name','Dog')->count();
      if($id_count > 0){
        $id = Pet::where('pet_name','Dog')->value('id');
        $categories = Category::where('pet_id',$id)->get();
        return view('frontend.pets.dog.dogs-category',compact('categories'));
      }
      return redirect()->back()->with('error','something went wrong!');
   }
   public function cat()
   {
      $id_count = Pet::where('pet_name','Cat')->count();
      if($id_count > 0){
        $id = Pet::where('pet_name','Cat')->value('id');
        $categories = Category::where('pet_id',$id)->get();
        return view('frontend.pets.cat.cats-category',compact('categories'));
      }
      return redirect()->back()->with('error','something went wrong!');
   }
   public function productsList(Request $request, $slug)
   {
     $category_id = Category::where('slug',$slug)->value('id');
     $minPrice = $request->minPrice;
     $maxPrice = $request->maxPrice;
     $products = DB::table('products');
     if(isset($request->minPrice)){
      $products = $products->where('offer_price','>=',$request->minPrice);
     }
     if(isset($request->maxPrice)){
      $products = $products->where('offer_price','<=',$request->maxPrice);
     }
     if(isset($request->lifestage)){
      $lstage[] = $request->lifestage;
       $products = $products->where(function ($query) use($lstage) {
            for($i = 0; $i < count($lstage); $i++){
                  $query->whereIn('lifestage',$lstage[$i]);
            }  
        });
     }
     if(isset($request->hc)){
      $hcons[] = $request->hc;
       $products = $products->where(function ($query) use($hcons) {
            for($i = 0; $i < count($hcons); $i++){
                  $query->whereIn('helath_consideration',$hcons[$i]);
            }  
        });
     }
     if(isset($request->breed)){
      $bd[] = $request->breed;
       $products = $products->where(function ($query) use($bd) {
            for($i = 0; $i < count($bd); $i++){
                  $query->whereIn('breed',$bd[$i]);
            }  
        });
     }
     if(isset($request->composition)){
      $comp[] = $request->composition;
       $products = $products->where(function ($query) use($comp) {
            for($i = 0; $i < count($comp); $i++){
                  $query->whereIn('composition',$comp[$i]);
            }  
        });
     }
     if(isset($request->weight)){
      $wt[] = $request->weight;
       $products = $products->where(function ($query) use($wt) {
            for($i = 0; $i < count($wt); $i++){
                  $query->whereIn('weight',$wt[$i]);
            }  
        });
     }
     if(isset($request->volume)){
      $vlm[] = $request->volume;
       $products = $products->where(function ($query) use($vlm) {
            for($i = 0; $i < count($vlm); $i++){
                  $query->whereIn('volume',$vlm[$i]);
            }  
        });
     }
     if(isset($request->quantity)){
      $qty[] = $request->quantity;
       $products = $products->where(function ($query) use($qty) {
            for($i = 0; $i < count($qty); $i++){
                  $query->whereIn('tablet_quantity',$qty[$i]);
            }  
        });
     }
     $products = $products->where('status',1)->where('category',$category_id)->get();
     return view('frontend.pets.product-list',compact('products','category_id','minPrice','maxPrice','slug'));
   }
   public function productDetails($sc,$slug)
   {
      $product = Product::where('slug',$slug)->first();
      return view('frontend.pets.product-details',compact('product'));
   }
   public function addToCart(Request $request)
   {
    if($request->isMethod('post'))
    {
        $data = $request->all();
        $session_id = Session::get('session_id');
        if(empty($session_id))
        {
          $session_id = Session::getId();
          Session::put('session_id',$session_id);
        }
        if(Auth::check())
        {
            $count_cart_products = Cart::where('user_id',Auth::user()->id)->where('product_id',$data['productid'])->count();
            if($count_cart_products>0){
               return back()->with('info','Product is already in cart!');
            }
            Cart::insert(['session_id'=>$session_id,'user_id'=>Auth::user()->id, 'product_id'=>$data['productid'], 'quantity'=>$data['quantity'], 'price'=>$data['quantity'] * $data['offerprice']]);
            return back()->with('message','Product added to cart successfully!');
        }else{
            $count_cart_products = Cart::where('session_id',$session_id)->where('product_id',$data['productid'])->count();
            if($count_cart_products>0){
               return back()->with('info','Product is already in cart!');
            }
            Cart::insert(['session_id'=>$session_id, 'product_id'=>$data['productid'], 'quantity'=>$data['quantity'], 'price'=>$data['quantity'] * $data['offerprice']]);
            return back()->with('message','Product added to cart successfully!');
        }
        
    }
   }
   public function cart()
   {
     $userCartItems = Cart::userCartItems();
     $userCartItems_count = Cart::userCartItems_count();
     if($userCartItems_count > 0){
        return view('frontend.cart',compact('userCartItems','userCartItems_count'));
     }else{
        return view('frontend.empty-cart');
     }
   }
   public function checkPincode(Request $request)
   {
      if($request->pincode != "")
      {
        $pincode_count = Pincode::where('pincode',$request->pincode)->count();
        if($pincode_count > 0)
        {
          return "<span style='color:green'>We are available in this area</span>";
        }else{
          return "<span style='color:red'>Currently we are not available in this area</span>";
        }
      }else{
          return "<span style='color:red'>Enter a Valid pincode</span>";
      }
   }
   public function updateRemoveCart(Request $request)
   {
    if($request->btn == "Update"){
       $cart_item = Cart::where('id',$request->cartid)->first();
       $unit_price = $cart_item->price / $cart_item->quantity;
       Cart::where('id',$request->cartid)->update(['quantity' => $request->quantity, 'price' => $request->quantity * $unit_price]);
       return back()->with('message','Cart updated successfully!');
     }elseif($request->btn == "Remove"){
       Cart::where('id',$request->cartid)->delete();
       return back()->with('message','Product removed successfully!');
     }
     return back()->with('error','Something went wrong!'); 
   }
   public function returnCancellationAndRefund()
   {
     return view('frontend.return-cancellation-and-refund');
   }
   public function privacyPolicy()
   {
     return view('frontend.privacy-policy');
   }
   public function termsAndConditions()
   {
     return view('frontend.terms-and-conditions');
   }
}
