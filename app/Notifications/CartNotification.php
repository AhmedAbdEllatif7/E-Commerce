<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CartNotification extends Notification
{
    use Queueable;

    public  $cart_id , $creator ,$product_name , $message ;
    public function __construct($cart_id ,$creator , $product_name , $message )
    {
        $this->cart_id= $cart_id;
        $this->creator = $creator;
        $this->product_name = $product_name;
        $this->message = $message;

    }


    public function via(object $notifiable): array
    {
        return ['database'];
    }


    public function toArray(object $notifiable): array
    {
        return [
            'cart_id'=>$this->cart_id,
            'creator'=>$this->creator,
            'product_name'=>$this->product_name,
            'message' => $this->message,
        ];
    }
}
