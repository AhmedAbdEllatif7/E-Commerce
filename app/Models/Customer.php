<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'customers';
    protected $guarded = [];
    public $timestamps = true;

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function customerAddress()
    {
        return $this->hasMany(CustomerAdderss::class, 'customer_id');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'customer_id');
    }



}
