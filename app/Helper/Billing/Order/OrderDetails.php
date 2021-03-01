<?php

namespace App\Helper\Billing\Order;

use App\Helper\Billing\PaymentGatewayContract;

class OrderDetails
{
    private $paymentGatewayContract;

    public function __construct(PaymentGatewayContract $paymentGatewayContract)
    {
        $this->paymentGatewayContract = $paymentGatewayContract;
    }

    public function all()
    {
       $this->paymentGatewayContract->setDiscount(500); 

       return [
            "name"=>'asad',
            "address"=> "mirpur 10"
       ];
    }
}
