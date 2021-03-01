<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Billing\PaymentGateway;
use App\Helper\Order\OrderDetails;

class PayorderController extends Controller
{
    /* 
    * reflaction class
    */
    public function store(OrderDetails $orderDetails, PaymentGateway $payment)
    {
        $order = $orderDetails->all();
        dd($payment->charge(2500));
    }
}
