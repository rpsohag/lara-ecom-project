<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    
    public function order_detail()
    {
        return $this->belongsToMany(Product::class);
    }
}
