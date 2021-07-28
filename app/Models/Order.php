<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function division(){
        return $this->belongsTo('App\Models\Ship_Division','division_id');
    }
    public function district(){
        return $this->belongsTo('App\Models\Ship_District','district_id');
    }

    public function state(){
        return $this->belongsTo('App\Models\Ship_Upzilla','state_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function shipping(){
        return $this->belongsTo(Shipping::class,'shipping_id');
    }
}
