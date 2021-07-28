
@extends('backend.layouts.master')

@section('title')
Role Create - Admin Panel
@endsection

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('dashboard_content')



<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Create New Category</h4>
                    

                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="icon">Category Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="{{ $category->icon }}">
                            @error('icon')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" value="{{ $category->category_name }}" id="name" name="category_name">
                            @error('category_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Category Name</label>
                            <input type="file" class="form-control" id="name" name="image" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="form-group">
                            <label for="image">Active Cateogry</label><br>
                            <input type="checkbox" name="status" value="1" {{ $category->status == 1 ? 'checked': '' }}>
                        </div>

                        <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                            <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                              <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Image Preview</h6>
                
                
                              <div class="row row-xs mg-t-20">
                                <img id="image" style="width: 150px" src="{{ asset('images/category/'. $category->image ) }}" alt="">
                              </div><!-- row -->
                              <div class="row row-xs mg-t-30">
                                <div class="col-sm-8 mg-l-auto">
                                  <div class="form-layout-footer">
                                  </div><!-- form-layout-footer -->
                                </div><!-- col-8 -->
                              </div>
                            </div><!-- card -->
                          </div><!-- col-6 -->

                         <a href="{{ route('admin.category.index') }}" class="btn btn-info mt-4 pr-4 pl-4">Cancel</a>
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