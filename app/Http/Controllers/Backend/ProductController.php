<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductAtt;
use App\Models\ProductImg;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Str;
use Image;


class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('backend.pages.product.index',compact('products'));
    }
    public function create(){
        $category = Category::latest()->get();
        $colors = Color::latest()->get();
        $sizes = Size::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $brand = Brand::latest()->get();
        return view('backend.pages.product.create',compact('colors','sizes','category','subcategory','subsubcategory','brand'));
    }

    public function store(Request $request){

            $this->validate($request,[
            'product_name'=>'required',
            'cat_id'=>'required',
              ]);
        
        if ($request->hasfile('thumbnail')) {
            $image = $request->file('thumbnail');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
         Image::make($image)->save(public_path('images/product/thumbnail/'. $ext));


        }
          Product::insert([
              'product_name' => $request->product_name,
              'slug' => Str::slug($request->product_name),
              'cat_id' => $request->cat_id,
              'subcat_id' => $request->subcat_id,
              'subsubcat_id' => $request->subsubcat_id,
              'brand_id' => $request->brand_id,
              'price' => $request->price,
              'discount' => $request->discount,
              'quantity' => $request->quantity,
              'color_id' => $request->color,
              'size_id' => $request->size,
              'summary' => $request->summary,
              'description' => $request->description,
              'stock' => $request->stock,
              'thumbnail' => $ext,
              'created_at' => Carbon::now(),
              
          ]);
        
          return Redirect()->back()->with('success','Product inserted Successfully');
    }
    public function edit($id){
        $product = Product::where('id',$id)->first();
        $category = Category::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name','ASC')->get();
        $subsubcategory = SubSubCategory::orderBy('subsubcategory_name','ASC')->get();
        $brand = Brand::orderBy('brand_name','ASC')->get();
        $colors = Color::orderBy('color','ASC')->get();
        $sizes = Size::orderBy('size','ASC')->get();
        return view('backend.pages.product.edit',compact('product','category','subcategory','subsubcategory','brand','colors','sizes'));
    }
    public function update(request $request, $id){
        $product = Product::find($id);
        if ($request->hasfile('thumbnail')) {
            $image = $request->file('thumbnail');
            $ext = date('d-m-Y-H-i'). '.' . $image->getClientOriginalExtension();
            
            $old_img_location = public_path('images/product/thumbnail/'. $product->thumbnail);
            if (file_exists($old_img_location)) {
                unlink($old_img_location);
            }
            Image::make($image)->save(public_path('images/product/thumbnail/'. $ext));
            $product->thumbnail = $ext;
        }

            $product->product_name = $request->product_name;
            $product->description = $request->description;
            $product->slug = Str::slug($request->product_name);
            $product->save();
      return Redirect()->back()->with('success','product Updated Successfully');
    }
    public function pro_image($id){
        $product= Product::findOrFail($id);
        $imageGalleries=ProductImg::where('product_id',$id)->get();
        return view('backend.pages.product.image',compact('product','imageGalleries'));
    }
    public function pro_image_store(Request $request)
    {
        $inputData=$request->all();
        if($request->file('image')){
            $images=$request->file('image');
            foreach ($images as $image){
                if($image->isValid()){
                    $extension=$image->getClientOriginalExtension();
                    $filename=rand(100,999999).time().'.'.$extension;
                    $large_image_path=public_path('images/product/gallery/'.$filename);
                    $medium_image_path=public_path('images/product/gallery/'.$filename);
                    $small_image_path=public_path('images/product/gallery/'.$filename);
                    //// Resize Images
                    Image::make($image)->save($large_image_path);
                    Image::make($image)->resize(600,600)->save($medium_image_path);
                    Image::make($image)->resize(300,300)->save($small_image_path);
                    $inputData['image']=$filename;
                    ProductImg::create($inputData);
                }
            }
        }
        return Redirect()->back()->with('success','Product inserted successfully');
    }
    public function attribute($id){
        $attributes=ProductAtt::where('product_id',$id)->get();
        $product=Product::findOrFail($id);
        return view('backend.pages.product.attribute',compact('attributes','product'));
    }
    public function pro_attribute_store(request $request){
        ProductAtt::create($request->all());
        return Redirect()->back()->with('success','Product Attribute inserted successfully');
    }
    

}
