
@extends('backend.layouts.master')

@section('title')
Role Create - Admin Panel
@endsection

@section('category') active @endsection

@section('create_category') active @endsection

@section('all_category') d-block @endsection

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
                    
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="icon">Category Icon</label>
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Enter a category icon">
                            @error('icon')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter a category Name">
                            @error('category_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Category Name</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="image">Active Cateogry</label><br>
                            <input type="checkbox" name="status" value="1">
                        </div>
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