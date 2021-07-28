<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\ProductReview;

class IndexController extends Controller
{
    public function index(){
        $Indexcategories = Category::where('status',1)->OrderBy('category_name','asc')->limit(6)->get();
        $Indexproduct_category = Category::where('status',1)->OrderBy('category_name','asc')->skip(0)->take(1)->get();
        $skip_category_0 = Category::skip(0)->first();
        $skip_category_1 = Category::where('status',1)->OrderBy('category_name','asc')->skip(1)->take(1)->first();
        $skip_category_2 = Category::skip(2)->first();
        $skip_product_0 = Product::where('status',1)->where('cat_id',$skip_category_0->id)->orderBY('product_name','asc')->get();
        $skip_product_1 = Product::where('status',1)->where('cat_id',$skip_category_1->id)->orderBY('product_name','DESC')->get();
        $skip_product_2 = Product::where('status',1)->where('cat_id',$skip_category_2->id)->orderBY('product_name','DESC')->get();
        $blogs = Blog::latest()->get();
        $product_detail= Product::with('attributes')->first();
        $product_reviews = ProductReview::where('product_id',$product_detail->id)->get();
        return view('frontend.index',compact('Indexcategories','Indexproduct_category','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_category_2','skip_product_2','skip_product_0','blogs','product_detail','product_reviews'));
    }
}
