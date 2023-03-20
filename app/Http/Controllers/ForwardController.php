<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ForwardController extends Controller
{
    public function triggerOtp($data)
    {
        $curl = curl_init();
        $no = session()->get('mobile');
        $no1 = "91" . $no;
        $authkey = env('SMS_AUTH_KEY');
        $otp = $data['otp'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.msg91.com/api/v5/flow",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"flow_id\":\"610579ddf5076b7374353\",\"sender\":\"SENDER\",\"recipients\":[{\"mobiles\":\"$no1\",\"VAR1\":\"$otp\"}]}",
            CURLOPT_HTTPHEADER => array(
                "authkey: 365098AWztsTMesXvN610575",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // if ($err) {
        //     return "cURL Error #:" . $err;
        //     return response()->json(['status' => 'error', 'message' => 'Some problem happed,try again !', 'error' => $err]);
        // } else {
        //     return response()->json(['status' => 'ok', 'message' => 'Otp Send Successfully !', 'otp' => $otp]);
        // }
    }
    public function triggerSmsOrderPlaced($data)
    {
        $curl = curl_init();
        $no = Auth::user()->mobile;
        $no1 = "91" . $no;
        $authkey = env('SMS_AUTH_KEY');
        $name = Auth::user()->name;
        $order_id = $data['unique_order_id'];
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.msg91.com/api/v5/flow",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"flow_id\":\"61057ab6bc2c4572b44c\",\"sender\":\"SENDER\",\"recipients\":[{\"mobiles\":\"$no1\",\"NAME\":\"$name\",\"ORDERID\":\"$order_id\"}]}",
            CURLOPT_HTTPHEADER => array(
                "authkey: 365098AWztsTMesX",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
    }
}
