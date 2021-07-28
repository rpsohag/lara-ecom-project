
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('brand') active @endsection

@section('view_brand') active @endsection

@section('all_brand') d-block @endsection

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
                    <h4 class="header-title float-left">Brand List</h4>
                    <p class="float-right mb-2">
                        {{-- @if (Auth::guard('admin')->user()->can('category.create')) --}}
                            <a class="btn btn-primary text-white" href="{{ route('admin.brand.create') }}">Create New Brnad</a>
                        {{-- @endif --}}
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="datatable1" class="text-center table display responsive">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th style="text-align: center;">Sl</th>
                                    <th style="text-align: center;">Brand Name</th>
                                    <th style="text-align: center;">Brand Slug</th>
                                    <th style="text-align: center;">Brand Image</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($brands as $brand)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{{ $brand->slug }}</td>
                                    <td style="text-align: center;"><img src="{{url('images/brand',$brand->image)}}" alt="" width="50"></td>
                                    <td>
                                        {{-- @if (Auth::guard('admin')->user()->can('category.edit')) --}}
                                            <a class="btn btn-success text-white" href="{{ route('admin.brand.edit', $brand->id) }}">Edit</a>
                                        {{-- @endif --}}
                                        
                                        {{-- @if (Auth::guard('admin')->user()->can('category.delete')) --}}
                                        <a class="btn btn-danger text-white" href="{{ route('admin.brand.destroy', $brand->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $brand->id }}').submit();">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $brand->id }}" action="{{ route('admin.brand.destroy', $brand->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
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