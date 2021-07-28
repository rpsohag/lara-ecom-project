<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }
    public function subsubcategory()
    {
        return $this->belongsTo(SubSubCategory::class, 'subsubcat_id');
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
    public function productimage()
    {
        return $this->belongsTo(ProductImg::class, 'product_id');
    }
    public function attributes(){
        return $this->hasMany(ProductAtt::class,'product_id','id');
    }
    function wishlist(){

        return $this->hasMany(Wishlist::class, 'product_id');
    }
    public function product()
    {
        return $this->belongsTo(OrderDetail::class, 'product_id');
    }
    public function order_detail()
    {
        return $this->belongsToMany(OrderDetail::class);
    }
    public function product_review(){
        return $this->belongsTo(ProductReview::class,'product_id');
    }
}
