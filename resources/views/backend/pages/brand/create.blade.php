
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('brand') active @endsection

@section('create_brand') active @endsection

@section('all_brand') d-block @endsection

@section('style_css')

@endsection


@section('dashboard_content')
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Create Brand</h4>
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
                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Brand Name</label>
                                <input type="text" class="form-control" value="{{ old('brand_name') }}" id="name" name="brand_name" placeholder="Enter Category">
                                @error('brand_name')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Category Image</label>
                                <input type="file" class="form-control" id="name" name="image" placeholder="Enter Name">
                            </div>
                        </div>

                        
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