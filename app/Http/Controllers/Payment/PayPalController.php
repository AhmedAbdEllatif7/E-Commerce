<?php

namespace App\Http\Controllers\Payment;

use App\Events\PaidSuccess;
use App\Http\Controllers\Controller;

use App\Models\Order;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:customer');
    }
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
        return response()->json('Payment cancelled' , '402');
    }


    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']) , ['SUCCESS' , 'SUCCESSWITHWARNING'])){

            $userId = auth()->guard('customer')->user()->id;
            $orders = Order::where('customer_id', $userId)->get();

            event(new PaidSuccess($userId, $orders));

            return redirect()->route('home')->with([
                'success' => 'Paid successfully , Thank you we will send your order soon'
            ]);

        }

        return response()->json('Payment cancelled' , '402');
    }
}
