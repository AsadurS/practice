<?php

namespace App\Helper\Order;

use App\Helper\Billing\PaymentGateway;

class OrderDetails
{
    private $paymentGateway;

    public function __construct(PaymentGateway $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function all()
    {
       $this->paymentGateway->setDiscount(500); 

       return [
            "name"=>'asad',
            "address"=> "mirpur 10"
       ];
    }
}
