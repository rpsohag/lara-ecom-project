
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
                    <h4 class="header-title float-left">Brand List</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('category.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.brand.index') }}">Brand List</a>
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
                    <form action="{{ route('admin.brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control" value="{{ $brand->brand_name }}" id="name" name="brand_name" placeholder="Enter Category">
                                @error('brand_name')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Brand Image</label>
                                <input type="file" class="form-control" id="name" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>
                         <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                        <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Image Preview</h6>


                        <div class="row row-xs mg-t-20">
                            <img id="image" style="width: 150px" src="{{ asset('images/brand/'. $brand->image ) }}" alt="">
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                            <div class="form-layout-footer">
                            </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                        </div><!-- card -->
                    </div><!-- col-6 -->

                        
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary mt-4 pr-4 pl-4">Back</a>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Category</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('footer_js')

@endsection