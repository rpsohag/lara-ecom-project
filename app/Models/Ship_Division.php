<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship_Division extends Model
{
    use HasFactory;

    public function divishion(){
        return $this->hasMany(Order::class, 'order_id','id');
    }
}
