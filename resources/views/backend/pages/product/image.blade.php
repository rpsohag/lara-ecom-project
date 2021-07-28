
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
                                        <div class="user-thumb"> <img width="40" height="40" alt="User" src="{{url('images/product/thumbnail',$product->thumbnail)}}"> </div>
                                        <div class="article-post">
                                            <span class="user-info">Product Code : <b>{{$product->product_code}}</b></span>
                                            <p>Product Color : <b>black</b></p>
                                        </div>
                                    </li>
                                    <li>
                                        <form action="{{ route('admin.product.image.store')}}" method="post" enctype="multipart/form-data">
                                            <legend>You Can Add Multi Images</legend>
                                           @csrf
                                            <div class="form-group">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="file" name="image[]" id="id_imageGallery" class="form-control" multiple="multiple" required>
                                                <span class="text-danger">{{$errors->first('image')}}</span>
                                                <button type="submit" class="btn btn-success">Upload</button>
                                            </div>
        
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
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; ?>
                                    @foreach($imageGalleries as $imageGallery)
                                        <tr>
                                            <td class="taskDesc" style="text-align: center;vertical-align: middle;">{{$i++}}</td>
                                            <td class="taskOptions" style="text-align: center;vertical-align: middle;"><img src="{{url('images/product/gallery',$imageGallery->image)}}" class="img-responsive" alt="Image" width="60"></td>
                                            <td style="text-align: center;vertical-align: middle;"><a href="{{ route('admin.product.image.destroy',$imageGallery->id)}}" class="btn btn-primary btn-mini">delete</a></td>
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