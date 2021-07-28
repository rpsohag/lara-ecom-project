
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

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
                    <h4 class="header-title float-left">Product Attributes</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('category.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.product.create') }}">Create New Product</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="span6">
                        <div class="widget-box">
                            <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
                                <h5>Product : {{$product->product_name}}</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <ul class="recent-posts">
                                    <li>
                                        <form action="{{ route('admin.product.attribute.store')}}" method="post" role="form">
                                               @csrf
                                            <legend>Add Attribute</legend>
                                         
                                            <div class="form-group">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="text" class="form-control mb-1" name="sku" value="{{old('sku')}}" id="sku" placeholder="SKU" >
                                                <input type="text" class="form-control mb-1" name="size" value="{{old('size')}}" id="size" placeholder="Size" >
                                                <input type="text" class="form-control mb-1" name="price" value="{{old('price')}}" id="price" placeholder="Price" >
                                                <input type="text" class="form-control mb-1" name="color" value="{{old('color')}}" id="price" placeholder="color">
                                                <input type="text" class="form-control mb-1" name="quantity" value="{{old('quantity')}}" id="price" placeholder="quantity">
                                                <input type="number" class="form-control" name="stock" value="{{old('stock')}}" id="stock" placeholder="Stock" required>
                                            </div>
                                            <button type="submit" class="btn btn-success">Add</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="data-tables">
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
                        <table id="datatable1" class="text-center table display responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th style="text-align: center;">Sl</th>
                                    <th style="text-align: center;">sku</th>
                                    <th style="text-align: center;">size</th>
                                    <th style="text-align: center;">price</th>
                                    <th style="text-align: center;">quantity</th>
                                    <th style="text-align: center;">stock</th>

                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($attributes as $attribute)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $attribute->sku }}</td>
                                    <td>{{ $attribute->size }}</td>
                                    <td>{{ $attribute->price }}</td>
                                    <td>{{ $attribute->quantity }}</td>
                                    <td>{{ $attribute->stock }}</td>
                                    <td style="text-align: center; ">
                                        <a href="{{ route('admin.product.attribute.destroy',$attribute->id)}}" rel="{{$attribute->id}}" rel1="delete-attribute" class="btn btn-danger btn-mini deleteRecord">Delete</a>
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