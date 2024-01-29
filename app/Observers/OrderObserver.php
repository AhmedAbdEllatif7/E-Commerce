<?php

namespace App\Observers;

use App\Models\Customer;
use App\Models\Order;
use App\Notifications\CartNotification;
use Illuminate\Support\Facades\Notification;

class OrderObserver
{

    
    public function created(Order $order): void
    {
        $users = Customer::where('id', '=', auth('customer')->user()->id)->get();
        $creator = auth('customer')->user()->name;
        $message = $creator . ' create new order ' .  $order->products->name;

        Notification::send($users, new CartNotification($order->id, $creator, $order->products->name , $message));

    }


    public function deleted(Order $order): void
    {
        $order->notifications()->delete();
    }


}
