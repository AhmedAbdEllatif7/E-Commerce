<?php

namespace App\Models;

use App\Notifications\CartNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable , SoftDeletes;

       protected $table = 'orders';

       public $timestamps = true;

       protected $guarded=[];

    public function notifications()
    {
        return $this->hasMany(DatabaseNotification::class, 'data->cart_id') // Assuming 'cart_id' is stored in the data field of the notification
        ->where('type', '=', CartNotification::class); // Replace with the actual class name of your notification
    }

    public function categories(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

    public function customerAddress()
    {
        return $this->belongsTo(CustomerAdderss::class, 'customer_id', 'customer_id');
    }


}
