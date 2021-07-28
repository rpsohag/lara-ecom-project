<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function subcategory(){
        return $this->hasMany(SubCategory::class, 'cat_id','id');
    }
    public function subsubcategory(){
        return $this->hasMany(SubSubCategory::class, 'cat_id','id');
    }
    public function product(){
        return $this->hasMany(Product::class, 'cat_id');
    }
}
