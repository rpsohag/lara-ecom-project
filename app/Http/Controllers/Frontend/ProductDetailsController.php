<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAtt;
use App\Models\ProductImg;
use App\Models\ProductReview;

class ProductDetailsController extends Controller
{
    public function product_details($slug){
        $product_detail= Product::with('attributes')->where('slug' , $slug)->first();
        $imagesGalleries= ProductImg::where('product_id',$product_detail->id)->get();
        $relatedProducts= Product::where([['slug','!=',$slug],['cat_id',$product_detail->cat_id]])->get();
        $product_reviews = ProductReview::where('product_id',$product_detail->id)->where('status','approve')->get();
        return view('frontend.pages.product-details',compact('product_detail','imagesGalleries','relatedProducts','product_reviews'));
    }
}
