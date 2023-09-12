<?php

namespace App\Listeners;

use App\Events\PaidSuccess;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use App\Notifications\CartNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProcessesAfterPaid
{


    public function __construct()
    {
        //
    }


    public function handle(PaidSuccess $event)
    {
        $userId = $event->userId;
        $orders = $event->orders;

        // Update order status and delete orders
        foreach ($orders as $order) {
            $order->update([
                'payment_status' => 1,
                'address_title' => $order->customerAddress->address_title,
            ]);
            $order->delete();
        }

        $customer = Customer::find($userId);
        if ($customer) {
            $customer->unreadNotifications->markAsRead();
        }


        // Send notifications
        $customer = Customer::find($userId);
        $admins = User::all();
        $message = $customer->name . ' paid his orders';
        foreach ($orders as $order) {
            Notification::send($admins, new CartNotification($order->id, $customer->name, $order->products->name, $message));
        }
    }
}
