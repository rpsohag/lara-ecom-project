<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Image;
use Carbon\Carbon;
use Illuminate\Support\Str;

class SubSubCategoryController extends Controller
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
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.pages.subsubcategory.index',compact('subsubcategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.pages.subsubcategory.create',compact('category','subcategory'));

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
            'subsubcategory_name'=>'required',
            'cat_id'=>'required',
            'subcat_id'=>'required',
        ]);
          SubSubCategory::insert([
              'cat_id' => $request->cat_id,
              'subcat_id' => $request->subcat_id,
              'subsubcategory_name' => $request->subsubcategory_name,
              'slug' => Str::slug($request->subsubcategory_name),
              'status' => $request->status ?? 0,
              'created_at' => Carbon::now(),
              
          ]);
          return Redirect()->back()->with('success','SubSubCategory inserted Successfully');

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
        $sscat = SubSubCategory::where('id',$id)->first();
        return view('backend.pages.subsubcategory.edit',[
            'sscat' => $sscat,
            'categories' => Category::OrderBy('category_name','asc')->get(),
            'scat' => SubCategory::OrderBy('subcategory_name','asc')->get(),
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
        $subsubcategory = SubSubCategory::find($id);
        $subsubcategory->cat_id = $request->cat_id;
        $subsubcategory->subcat_id = $request->subcat_id;
        $subsubcategory->subsubcategory_name = $request->subsubcategory_name;
        $subsubcategory->slug = Str::slug($request->subsubcategory_name);
        $subsubcategory->status = $request->status ?? 0;
        $subsubcategory->save();
        return Redirect()->back()->with('success','SubSubCategory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsubcategory = SubSubCategory::find($id);
        if (!is_null($subsubcategory)) {
            $subsubcategory->delete();
        }
        return Redirect()->back()->with('success','SubSubCategory Updated Successfully');
    }
}
