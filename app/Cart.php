<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    public static function userCartItems()
    {
    	$session_id = Session::get('session_id');
    	if(Auth::check())
    	{
    		$userCartItems = Cart::with(['product'=>function($query){
              $query->select('id','title','slug','unique_product_id','price','offer_price','weight');
    		}])->where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->orderBy('id','desc')->get()->toArray();
    	}else{
    		$userCartItems = Cart::with(['product'=>function($query){
              $query->select('id','title','slug','unique_product_id','price','offer_price','weight');
    		}])->where('session_id',$session_id)->orderBy('id','desc')->get()->toArray();
    	}
    	return $userCartItems;
    }
    public static function userCartItems_count()
    {
    	$session_id = Session::get('session_id');
    	if(Auth::check())
    	{
    		$userCartItems = Cart::with(['product'=>function($query){
              $query->select('id','title','slug','unique_product_id','price','offer_price','weight');
    		}])->where('user_id',Auth::user()->id)->orwhere('session_id',$session_id)->orderBy('id','desc')->count();
    	}else{
    		$userCartItems = Cart::with(['product'=>function($query){
              $query->select('id','title','slug','unique_product_id','price','offer_price','weight');
    		}])->where('session_id',$session_id)->orderBy('id','desc')->count();
    	}
    	return $userCartItems;
    }
    public function product()
    {
       return $this->belongsTo('App\Product','product_id');
    }
}
