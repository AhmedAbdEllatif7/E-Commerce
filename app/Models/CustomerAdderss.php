<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerAdderss extends Model
{
    use HasFactory;

    protected $table = 'customer_addersses';

    public $timestamps = true;

    protected $guarded = [];


    public function customers()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
