<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{ 
    public function view_blog(){
        $blogs = Blog::all();
        return view('backend.pages.blog.index',compact('blogs'));
    }

    public function create_blog(){
        return view('backend.pages.blog.create');
    }
    public function store_blog(Request $request){

        $this->validate($request,[
        'title'=>'required',
          ]);
    
    if ($request->hasfile('thumbnail')) {
        $image = $request->file('thumbnail');
        $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
     Image::make($image)->save(public_path('images/blog/thumbnail/'. $ext));


    }
      Blog::insert([
          'title' => $request->title,
          'admin_id' => Auth::guard('admin')->user()->id,
          'slug' => Str::slug($request->title),
          'post' => $request->post,
          'thumbnail' => $ext,
          'created_at' => Carbon::now(),
          
      ]);
    
      return Redirect()->back()->with('success','Post inserted Successfully');
    }
    public function edit_blog($id){
        $blog = Blog::where('id',$id)->first();
        return view('backend.pages.blog.edit',compact('blog'));
    }

    public function update_blog(request $request, $id){
        $blog = Blog::find($id);
        if ($request->hasfile('thumbnail')) {
            $image = $request->file('thumbnail');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
            
            $old_img_location = public_path('images/blog/thumbnail/'. $blog->thumbnail);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }
            Image::make($image)->save(public_path('images/blog/thumbnail/'. $ext));
            $blog->thumbnail = $ext;
        }

            $blog->title = $request->title;
            $blog->post = $request->post;
            $blog->slug = Str::slug($request->title);
            $blog->save();
      return Redirect()->back()->with('success','blog Updated Successfully');
    }

    public function delete_blog($id){
        $blog = Blog::find($id);
        if (!is_null($blog)) {
            $blog->delete();
        }

        return Redirect()->back()->with('success','Blog Deleted Successfully');
    }
}
