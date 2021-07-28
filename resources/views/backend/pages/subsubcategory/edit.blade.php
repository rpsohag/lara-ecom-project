
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
                    
                    <form action="{{ route('admin.subsubcategory.update', $sscat->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">SubSubCategory Name</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control @error('subsubcategory_name') is-invalid @enderror" value="{{ $sscat->subsubcategory_name }}" name="subsubcategory_name">
                                @error('subsubcategory_name')
                                <span class="text-danger text-center">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Select Category</label>
                            <div class="col-sm-10">
                                <select name="cat_id" id="Subcategory" class="form-control">
                            @foreach ($categories as $cat_data )
                                 <option @if($cat_data->id == $sscat->cat_id) selected @endif value="{{ $cat_data->id }}">{{ $cat_data->category_name }}</option>
                            @endforeach
                           
                        </select>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Select SubCategory</label>
                            <div class="col-sm-10">
                                <select name="subcat_id" id="Subcategory" class="form-control">
                            @foreach ($scat as $scat_data )
                                 <option @if($scat_data->id == $sscat->cat_id) selected @endif value="{{ $scat_data->id }}">{{ $scat_data->subcategory_name }}</option>
                            @endforeach
                           
                        </select>
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Active SubCateogry</label>
                            <div class="col-sm-10">
                                <input type="checkbox" name="status" value="1" {{ $sscat->status == 1 ? 'checked': '' }}>
                            </div>
                        </div>

                         <a href="{{ route('admin.subsubcategory.index') }}" class="btn btn-info mt-4 pr-4 pl-4">Cancel</a>
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