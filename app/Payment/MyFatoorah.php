<?php

namespace App\Payment;

class MyFatoorah implements PaymentInterface
{

    public function payment()
    {
        echo "My Fatoorah";
    }

    public function cancel()
    {
        // TODO: Implement cancel() method.
    }

    public function success($request)
    {
        // TODO: Implement success() method.
    }
}
