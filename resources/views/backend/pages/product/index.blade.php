
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('product') active @endsection

@section('view_product') active @endsection

@section('all_product') d-block @endsection

@section('style_css')
<link href="{{ asset('backend/lib/highlightjs/github.css') }}" rel="stylesheet">
<link href="{{ asset('backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset('backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">


<!-- Starlight CSS -->
<link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">
@endsection


@section('dashboard_content')
<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Product List</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('category.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.product.create') }}">Create New Product</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="datatable1" class="text-center table display responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th style="text-align: center;">Sl</th>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Thumbnail</th>
                                    <th style="text-align: center;">category</th>
                                    <th style="text-align: center;">s Category</th>
                                    <th style="text-align: center;">ss Category</th>

                                    <th style="text-align: center;">Price</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($products as $product)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ Str::limit($product->product_name, 10) }}</td>
                                    <td style="text-align: center;"><img src="{{url('images/product/thumbnail',$product->thumbnail)}}" alt="" width="50"></td>
                                    <td>{{ $product->category->category_name }}</td>
                                    <td>{{ $product->subcategory->subcategory_name }}</td>
                                    <td>{{ $product->subsubcategory->subsubcategory_name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        <a class="btn btn-success text-white" href="" title="view product details" > <i class="icon ion-eye"></i></a>
                                        <a class="btn btn-success text-white" href="{{ route('admin.product.image',$product->id)}}" title="Add multiple image"> <i class="fa fa-image"></i></a>
                                        <a class="btn btn-success text-white" href="{{ route('admin.product.attribute', $product->id) }}" title="add product attribute"> <i class="fa fa-plus"></i></a>
                                        <a class="btn btn-success text-white" href="{{ route('admin.product.edit', $product->id) }}" title="edit product"> <i class="icon ion-compose"></i></a>
                                        <a class="btn btn-danger text-white" href="{{ route('admin.product.destroy',$product->id)}}" title="delete product"> <i class="icon ion-trash-a"></i></a>
                                    </td>
                                    {{-- <td>
                                        <a href="{{ route('admin.product.attribute', $product->id) }}"><i class="fa fa-plus"></i></a>
                                        <a href="{{ route('admin.product.image',$product->id)}}"><i class="fa fa-image"></i></a>
                                   
                                        {{-- @if (Auth::guard('admin')->user()->can('category.edit')) --}}
                                            {{-- <a href="{{ route('admin.product.edit', $product->id) }}" title="Edit"><i class="fa fa-edit"></i></a> --}}
                                        {{-- @endif --}}
                                        {{-- @if (Auth::guard('admin')->user()->can('category.edit')) --}}
                                            {{-- <a href="{{ route('admin.product.delete', $product->id) }}" title="Edit"><i class="fa fa-trash"></i></a> --}}
                                        {{-- @endif --}}
                                        
                                        {{-- @if (Auth::guard('admin')->user()->can('category.delete')) --}}
                                        {{-- <a href="{{ route('admin.product.destroy',$product->id)}}" class="btn btn-danger">Delete</a> --}}
                                        {{-- @endif --}}
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection


@section('footer_js')
<script src="{{ asset('backend/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset('backend/lib/select2/js/select2.min.js') }}"></script>
<script>
  $(function(){
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
    });

    // Select2
    $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

  });
</script>
@endsection