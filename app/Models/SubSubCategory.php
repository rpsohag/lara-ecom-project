<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'subsubcategory_name', 'cat_id', 'subcat_id',
    ];
    
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id','id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id','id');
    }
    public function product(){
        return $this->hasMany(Product::class, 'cat_id');
    }

}
