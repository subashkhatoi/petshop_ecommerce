<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public static function create_new_order($data)
    {
        $order                      = new Order();
    	$order->user_id             = Auth::user()->id;
    	$order->unique_order_id     = $data['unique_order_id'];
    	$order->delivery_address    = $data['delivery_address'];
    	$order->mobile              = Auth::user()->mobile;
        $order->total_price         = $data['total_price'];
        $order->discount_price      = $data['discount_price'];
    	$order->shipping_charges    = $data['shipping_charge'];
    	$order->wallet_deduction    = $data['wallet_amount'];
    	$order->payable_amount      = $data['total_payable_amount'];
    	$order->payment_method      = $data['payment_method'];
        $order->cod_charge          = $data['cod_charge'];
    	$order->txn_id              = $data['txn_id'];
    	$order->order_status        = $data['order_status'];
        $order->save();
    }
}
