<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

       protected $table = 'states';

       public $timestamps = true;

       protected $guarded=[];

    public function countries(){
        return $this->belongsTo(Country::class,'country_id');
    }
}
