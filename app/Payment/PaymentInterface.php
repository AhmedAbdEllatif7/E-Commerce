<?php

namespace App\Payment;

interface PaymentInterface{

    public function payment();

    public function cancel();

    public function success($request);
}
