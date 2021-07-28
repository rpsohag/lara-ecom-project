
@extends('backend.layouts.master')

@section('title')
Role Create - Admin Panel
@endsection

@section('category') active @endsection

@section('create_subcategory') active @endsection

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
                    <h4 class="header-title text-center">Create New SubCategory</h4>
                    

                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.subcategory.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">SubCategory Name</label>
                            <input type="text" class="form-control" value="{{ old('subcategory_name') }}" id="name" name="subcategory_name" placeholder="Enter Category">
                            @error('subcategory_name')
                        <span class="text-danger text-center">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="form-group">
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
                        <div class="form-group">
                            <label for="image">Active SubCateogry</label><br>
                            <input type="checkbox" name="status" value="1">
                        </div>
                         <a href="{{ route('admin.subcategory.index') }}" class="btn btn-info mt-4 pr-4 pl-4">Cancel</a>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save SubCategory</button>
                       
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