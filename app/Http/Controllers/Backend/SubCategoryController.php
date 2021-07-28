<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
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

        $subcategories = SubCategory::all();
        return view('backend.pages.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::latest()->get();
        return view('backend.pages.subcategory.create',compact('category'));
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
            'subcategory_name'=>'required',
            'cat_id'=>'required',
        ]);
          SubCategory::insert([
              'cat_id' => $request->cat_id,
              'subcategory_name' => $request->subcategory_name,
              'slug' => Str::slug($request->subcategory_name),
              'status' => $request->status ?? 0,
              'created_at' => Carbon::now(),
              
          ]);
          return Redirect()->back()->with('success','SubCategory inserted Successfully');
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
        $subcategory = SubCategory::where('id',$id)->first();
        return view('backend.pages.subcategory.edit',[
            'subcategory' => $subcategory,
            'categories' => Category::OrderBy('category_name','asc')->get(),
        ]);
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
        $subcategory = SubCategory::find($id);
        $subcategory->cat_id = $request->cat_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->slug = Str::slug($request->subcategory_name);
        $subcategory->status = $request->status ?? 0;
        $subcategory->save();
        return Redirect()->back()->with('success','SubCategory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        if (!is_null($subcategory)) {
            $subcategory->delete();
        }
        return Redirect()->back()->with('success','SubCategory Updated Successfully');
    }
}
