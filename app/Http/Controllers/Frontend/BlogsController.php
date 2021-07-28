<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function view_blog(){
        $blogs = Blog::latest()->paginate(4);
        return view('frontend.pages.blog',compact('blogs'));
    }

    public function single_blog($slug){
        $blog = Blog::where('slug' , $slug)->first();
        return view('frontend.pages.blog-single',compact('blog'));
    }
}
