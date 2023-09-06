<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

       protected $table = 'cities';

       public $timestamps = true;

       protected $guarded=[];
    public function states(){
        return $this->belongsTo(State::class,'state_id');
    }
}
