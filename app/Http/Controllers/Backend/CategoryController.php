<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
               // if (is_null($this->user) || !$this->user->can('category.view')) {
        //     abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        // }

        $categories = Category::all();
        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required',
            'icon'=>'required',
            'image'=>'required',
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
         Image::make($image)->save(public_path('images/category/'. $ext));

        }
          Category::insert([
              'icon' => $request->icon,
              'category_name' => $request->category_name,
              'slug' => Str::slug($request->category_name),
              'status' => $request->status,
              'image' => $ext,
              'created_at' => Carbon::now(),
              
          ]);
          return Redirect()->back()->with('success','Category inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::find($id);
        return view('backend.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
            
            $old_img_location = public_path('images/category/'. $category->image);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }
            Image::make($image)->save(public_path('images/category/'. $ext));
            $category->image = $ext;
        }

            $category->icon = $request->icon;
            $category->category_name = $request->category_name;
            $category->slug = Str::slug($request->category_name);
            $category->status = $request->status;
            $category->save();
      return Redirect()->back()->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) {
            $category->delete();
        }
        return Redirect()->back()->with('success','Category Updated Successfully');
    }
}
