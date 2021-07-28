
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('blog') active @endsection

@section('create_blog') active @endsection

@section('all_blog') d-block @endsection

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
                            <a class="btn btn-primary text-white" href="{{ route('admin.view_blog') }}">Product List</a>
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
                    <form action="{{ route('admin.store_blog') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="name">Blog title</label>
                                <input type="text" class="form-control" value="{{ old('title') }}" id="name" name="title" placeholder="Enter Blog title">
                                @error('title')
                            <span class="text-danger text-center">{{$message}}</span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="my-editor">Blog Post</label>
                                <textarea name="post" id="my-editor" class="form-control"></textarea>
                                @error('post')
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

                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Blog</button>
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