<?php

namespace App\Helper\Billing;
use App\Helper\Billing\PaymentGatewayContract;

use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{
    private $curency;
    private $discount;
    public function __construct($curency)
    {
        $this->curency = $curency;
    }
    public function  charge($amount)
    {
        return [
            'amount' => $amount - $this->discount,
            "confirmation_number" => Str::random(),
            "currency" => $this->curency,
            "discount" => $this->discount
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
}
