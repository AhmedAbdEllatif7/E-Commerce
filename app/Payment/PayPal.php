<?php

namespace App\Payment;

use App\Events\PaidSuccess;
use App\Models\Order;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPal implements PaymentInterface
{
    public function payment()
    {
        $user = auth()->guard('customer')->user();
        $orders = Order::where('customer_id', $user->id)->get();

        $items = [];
        $totalAmount = 0;

        foreach ($orders as $order) {
            $itemPrice = $order->amount * $order->quantity + ($totalAmount < 20 ? 20 : 0);

            $item = [
                'name' => $order->products->name,
                'des' => $order->products->description,
                'quantity' => $order->quantity,
                'price' => $itemPrice,
            ];

            $items[] = $item;
            $totalAmount += $itemPrice;
        }

        static $invoiceId = 0;
        $data = [];
        $data['items'] = $items;
        $data['invoice_id'] = ++$invoiceId; // Increment and assign the invoice ID
        $data['invoice_description'] = "Order {$data['invoice_id']} Invoice";
        $data['return_url'] = 'http://127.0.0.1:8000/payment/success';
        $data['cancel_url'] = 'http://127.0.0.1:8000/payment/cancel';
        $data['total'] = $totalAmount;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data, true);
        return redirect($response['paypal_link']);
    }


    public function cancel()
    {
        return redirect()->route('home')->with([
            'cancel' => 'Payment cancelled'
        ]);
//
// response()->json('Payment cancelled' , '402');
    }


    public function success($request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']) , ['SUCCESS' , 'SUCCESSWITHWARNING'])){

            $userId = auth()->guard('customer')->user()->id;
            $orders = Order::where('customer_id', $userId)->get();

            event(new PaidSuccess($userId, $orders));

            return redirect()->route('home')->with([
                'success' => 'Paid successfully , thank you we will send the order '
            ]);

        }

        return response()->json('Payment cancelled' , '402');
        // <!-- dd($request); -->

    }
}
