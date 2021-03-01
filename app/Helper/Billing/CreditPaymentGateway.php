<?php

namespace App\Helper\Billing;

use App\Helper\Billing\PaymentGatewayContract;

use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayContract
{
    private $curency;
    private $discount;
    public function __construct($curency)
    {
        $this->curency = $curency;
    }
    public function  charge($amount)
    {
        $fess = $amount * .03;
        return [
            'amount' => ($amount - $this->discount) + $fess,
            "confirmation_number" => Str::random(),
            "currency" => $this->curency,
            "discount" => $this->discount,
            'fees' => $fess
        ];
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
}
