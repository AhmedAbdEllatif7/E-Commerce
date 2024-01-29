<?php

namespace App\Http\Controllers\Payment;


use App\Http\Controllers\Controller;

use App\Payment\PaymentInterface;
use Illuminate\Http\Request;
use App\Events\PaidSuccess;
use App\Models\Order;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{
    // Dependency Inversion and Open Closed Principles

    public $payment;
    public function __construct(PaymentInterface $payment)
    {
        $this->payment = $payment;
        $this->middleware('auth:customer');
    }

    public function payment()
    {
        return $this->payment->payment();
    }

    public function cancel()
    {
        return $this->payment->cancel();
    }

    public function success(Request $request)
    {
        return $this->payment->success($request);
    }



}
