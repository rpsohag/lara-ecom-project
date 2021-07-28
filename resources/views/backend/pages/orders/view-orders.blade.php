
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('orders') active @endsection

@section('view_orders') active @endsection

@section('all_orders') d-block @endsection

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
                                    <th style="text-align: center;">SL</th>
                                    <th style="text-align: center;">Order Id</th>
                                    <th style="text-align: center;">Date</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Total</th>
                                    <th style="text-align: center;">Order Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($orders as $order)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $order->tracking_code }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>৳ {{ $order->paying_amount }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        {{-- @if (Auth::guard('admin')->user()->can('category.edit')) --}}
                                            <a class="btn btn-success text-white" href="{{ route('admin.view_order_details', $order->id) }}">Details</a>
                                        {{-- @endif --}}
                                        
                                        {{-- @if (Auth::guard('admin')->user()->can('category.delete')) --}}
                                        <a class="btn btn-danger text-white" href=""
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $order->id }}').submit();">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $order->id }}" action="{{ route('admin.brand.destroy', $order->id) }}" method="POST" style="display: none;">
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