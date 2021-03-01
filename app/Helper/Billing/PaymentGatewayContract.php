<?php

namespace App\Helper\Billing;

interface PaymentGatewayContract
{
    
    public function  charge($amount);

    public function setDiscount($amount);
}
