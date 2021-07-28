
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('blog') active @endsection

@section('view_blog') active @endsection

@section('all_blog') d-block @endsection

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
                            <a class="btn btn-primary text-white" href="{{ route('admin.create_blog') }}">Create New Product</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="datatable1" class="text-center table display responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th style="text-align: center;">Sl</th>
                                    <th style="text-align: center;">Title</th>
                                    <th style="text-align: center;">Thumbnail</th>
                                    <th style="text-align: center;">Created date</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($blogs as $blog)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td style="text-align: center;"><img src="{{url('images/blog/thumbnail',$blog->thumbnail)}}" alt="" width="50"></td>
                                  <td>{{ $blog->created_at }}</td>
                                <td>
                                       <a href="{{ route('admin.edit_blog',$blog->id) }}" class="btn btn-info">Edit</a> 
                                       <a href="{{ route('admin.delete_blog',$blog->id) }}" class="btn btn-danger">Delete</a> 
                
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