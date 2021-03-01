<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Billing\PaymentGatewayContract;
use App\Helper\Billing\Order\OrderDetails;

class PayorderController extends Controller
{
    /* 
    * reflaction class
    */
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $payment)
    {
        $order = $orderDetails->all();
        dd($payment->charge(2500));
    }
}
