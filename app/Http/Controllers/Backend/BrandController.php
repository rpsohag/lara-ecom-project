<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use Illuminate\Support\Str;
use Carbon\Carbon;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return view('backend.pages.brand.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
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
            'brand_name'=>'required',
            'image'=>'required',
        ]);

        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
         Image::make($image)->save(public_path('images/brand/'. $ext));

        }
          Brand::insert([
              'brand_name' => $request->brand_name,
              'slug' => Str::slug($request->brand_name),
              'image' => $ext,
              'created_at' => Carbon::now(),
              
          ]);
          return Redirect()->back()->with('success','Brand inserted Successfully');
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
        $brand = Brand::find($id);
        return view('backend.pages.brand.edit',compact('brand'));
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
        $brand = Brand::find($id);
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
            
            $old_img_location = public_path('image/brand/'. $brand->image);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }
            Image::make($image)->save(public_path('image/brand/'. $ext));
            $brand->image = $ext;
        }

            $brand->brand_name = $request->brand_name;
            $brand->brand_slug = Str::slug($request->brand_name);
            $brand->save();
      return Redirect()->back()->with('success','Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) {
            $brand->delete();
        }

        return Redirect()->back()->with('success','Brand Deleted Successfully');
    }
}
