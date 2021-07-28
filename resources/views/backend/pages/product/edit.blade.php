
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('style_css')

@endsection


@section('dashboard_content')
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Edit Product</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('category.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.product.index') }}">Product List</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="form-group text-center">
                        @if (session('success'))
                          <div class="alert alert-success alert-dismissible fade show" id="sweetalert1" role="alert">
                          <strong> {{ session('success') }} </strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          </div>
                          @endif
                  </div>
                    <form action="{{ route('admin.product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" value="{{ $product->product_name }}" id="name" name="product_name">
                                @error('product_name')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Select Category</label>
                                <select name="cat_id" id="Subcategory" class="form-control">
                                    @foreach ($category as $cat_data )
                                         <option @if($cat_data->id == $product->cat_id) selected @endif value="{{ $cat_data->id }}">{{ $cat_data->category_name }}</option>
                                    @endforeach
                                   
                                </select>
                                @error('cat_id')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Select SubCategory</label>
                                <select name="subcat_id" id="Subcategory" class="form-control">
                                    @foreach ($subcategory as $scat_data )
                                         <option @if($scat_data->id == $product->subcat_id) selected @endif value="{{ $scat_data->id }}">{{ $scat_data->subcategory_name }}</option>
                                    @endforeach
                                </select>
                                @error('subcat_id')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Select SubSubCategory</label>
                                <select name="subsubcat_id" id="Subcategory" class="form-control">
                                    @foreach ($subsubcategory as $sscat_data )
                                         <option @if($sscat_data->id == $product->subsubcat_id) selected @endif value="{{ $sscat_data->id }}">{{ $sscat_data->subsubcategory_name }}</option>
                                    @endforeach
                                </select>
                                @error('subsubcat_id')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Select Brand</label>
                                <select name="subsubcat_id" id="Subcategory" class="form-control">
                                    @foreach ($brand as $brand_data )
                                         <option @if($brand_data->id == $product->brand_id) selected @endif value="{{ $brand_data->id }}">{{ $brand_data->brand_name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Price">Product Price</label>
                                <input type="text" class="form-control" value="{{ $product->price }}" id="price" name="price">
                                @error('price')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Discount">Product Discount</label>
                                <input type="text" class="form-control" value="{{ $product->discount }}" id="Discount" name="discount" placeholder="Enter Product Discount">
                                @error('discount')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Quantity">Product Quantity</label>
                                <input type="text" class="form-control" value="{{ $product->quantity }}" id="Quantity" name="quantity" placeholder="Enter Product Quantity">
                                @error('quantity')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Color">Product Color</label>
                                <select class="col-sm-12 form-control" name="color">
                                    <option value="">Chosse One</option>
                                    @foreach ($colors as $color )
                                        <option @if($color->id == $product->color_id) selected @endif value="{{ $color->id }}">{{ $color->color }}</option>
                                     @endforeach
                                    </select>
                                @error('cat_id')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Size">Product Size</label>
                                <select class="col-sm-12 form-control" name="size">
                                    <option value="">Chosse One</option>
                                    @foreach ($sizes as $size )
                                    <option @if($size->id == $product->size_id) selected @endif value="{{ $size->id }}">{{ $size->size }}</option>
                                     @endforeach
                                    </select>
                                @error('cat_id')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Summary">Product Summary</label>
                                <input type="text" class="form-control" value="{{ $product->summary }}" id="Summary" name="summary" placeholder="Enter Product Summary">
                                @error('summary')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="my-editor">Product Description</label>
                                <textarea name="description" id="my-editor" class="form-control">
                                    {{ $product->description }}
                                </textarea>
                                @error('description')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="stock">Product Stock</label>
                                <input type="text" class="form-control" value="{{ $product->stock }}" id="stock" name="stock" placeholder="Enter Product stock">
                                @error('stock')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="thumbanil">Product Thumbanil</label>
                                <input type="file" id="thumbnail" class="form-control" id="thumbanil" name="thumbnail" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                        <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Image Preview</h6>
    
    
                            <div class="row row-xs mg-t-20">
                                <img id="image" style="width: 150px" src="{{ asset('images/product/thumbnail/'. $product->thumbnail ) }}" alt="">
                            </div><!-- row -->
                            <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                </div><!-- form-layout-footer -->
                                </div><!-- col-8 -->
                            </div>
                            </div><!-- card -->
                        </div><!-- col-6 -->

                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection



@section('footer_js')
<script src="//cdn.ckeditor.com/4.6.2/full-all/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };

  CKEDITOR.replace('my-editor', options);
</script>
@endsection
