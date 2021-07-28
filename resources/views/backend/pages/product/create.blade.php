
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('product') active @endsection

@section('create_product') active @endsection

@section('all_product') d-block @endsection

@section('style_css')

@endsection


@section('dashboard_content')
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Create Product</h4>
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
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" value="{{ old('product_name') }}" id="name" name="product_name" placeholder="Enter Product Name">
                                @error('product_name')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Select Category</label>
                                <select class="col-sm-12 form-control" name="cat_id">
                                    <option value="">Chosse One</option>
                                    @foreach ($category as $cat_data )
                                        <option value="{{ $cat_data->id }}">{{ $cat_data->category_name }}</option>
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
                                <select class="col-sm-12 form-control" name="subcat_id">
                                    <option value="">Chosse One</option>
                                    @foreach ($subcategory as $scat_data )
                                        <option value="{{ $scat_data->id }}">{{ $scat_data->subcategory_name }}</option>
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
                                <select class="col-sm-12 form-control" name="subsubcat_id">
                                    <option value="">Chosse One</option>
                                    @foreach ($subsubcategory as $sscat_data )
                                        <option value="{{ $sscat_data->id }}">{{ $sscat_data->subsubcategory_name }}</option>
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
                                <select class="col-sm-12 form-control" name="brand_id">
                                    <option value="">Chosse One</option>
                                    @foreach ($brand as $brand_data )
                                        <option value="{{ $brand_data->id }}">{{ $brand_data->brand_name }}</option>
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
                                <input type="text" class="form-control" value="{{ old('product_name') }}" id="price" name="price" placeholder="Enter Product Price">
                                @error('price')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Discount">Product Discount</label>
                                <input type="text" class="form-control" value="{{ old('product_name') }}" id="Discount" name="discount" placeholder="Enter Product Discount">
                                @error('discount')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="Quantity">Product Quantity</label>
                                <input type="text" class="form-control" value="{{ old('product_name') }}" id="Quantity" name="quantity" placeholder="Enter Product Quantity">
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
                                        <option value="{{ $color->id }}">{{ $color->color }}</option>
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
                                        <option value="{{ $size->id }}">{{ $size->size }}</option>
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
                                <textarea name="summary" id="summary" class="form-control"></textarea>
                                @error('summary')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="my-editor">Product Description</label>
                                <textarea name="description" id="my-editor" class="form-control"></textarea>
                                @error('description')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="stock">Product Stock</label>
                                <input type="text" class="form-control" value="{{ old('product_name') }}" id="stock" name="stock" placeholder="Enter Product stock">
                                @error('stock')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="thumbanil">Product Thumbanil</label>
                                <input type="file" class="form-control" id="thumbanil" name="thumbnail">
                            </div>
                        </div>

                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('footer_js')
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
  CKEDITOR.replace('my-editor', options);
  $('textarea.my-editor').ckeditor(options);
</script>
@endsection