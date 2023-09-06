<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Customer_adderss;
use App\Models\Order;
use App\Models\User;
use App\Notifications\CartNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Srmklive\PayPal\Services\ExpressCheckout;
use function Sodium\increment;

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

            $id = auth()->guard('customer')->user()->id;

            $orders = Order::where('customer_id', $id)->get();

            foreach ($orders as $order) {
                $order->update([
                    'payment_status' => 1,
                    'address_title' => $order->customerAddress->address_title,
                ]);
                $order->delete(); // Delete the order
            }

            $customer = Customer::find($id);
            if ($customer) {
                $customer->unreadNotifications->markAsRead();
            }

            $admins = User::all();
            $message = $customer->name . ' paid his orders';
            foreach ($orders as $order) {
                Notification::send($admins, new CartNotification($order->id, $customer->name, $order->products->name, $message));
            }
            return redirect()->route('home')->with([
                'success' => 'Paid successfully , thank you we will receive the order '
            ]);

        }

        return response()->json('Payment cancelled' , '402');

    }
}
