<?php

namespace App\Traits;


trait OtpTrait
{

	private function generateOtp($min,$max)
    {
        $num = mt_rand($min,$max);
        return $num;
    }
}
