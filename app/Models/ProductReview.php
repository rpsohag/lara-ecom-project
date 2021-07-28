<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

     public function product(){
        return $this->hasMany(Product::class, 'product_id','id');
    }
}
