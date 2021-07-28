<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductComponentController extends Controller
{
    public function category($slug){
        
        
        $categories = Category::all();  
            return view('frontend.pages.product-grid',compact('categories'));
    
    
        }
}
