
@extends('backend.layouts.master')

@section('title')
Role Page - Admin Panel
@endsection

@section('attribute') active @endsection

@section('view_color') active @endsection

@section('all_attribute') d-block @endsection

@section('style_css')
   <!-- vendor css -->

   <link href="{{ asset('backend/lib/highlightjs/github.css') }}" rel="stylesheet">
   <link href="{{ asset('backend/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
   <link href="{{ asset('backend/lib/select2/css/select2.min.css') }}" rel="stylesheet">


   <!-- Starlight CSS -->
   <link rel="stylesheet" href="{{ asset('backend/css/starlight.css') }}">
   
@endsection


@section('dashboard_content')
  <div class="card pd-20 pd-sm-40">
    @include('backend.layouts.partials.messages')
    <h4 class="float-left" style="display: block">Color List</h4>
       <p class="float-right text-right mb-4">
            @if (Auth::guard('admin')->user()->can('role.create'))
              <a class="btn btn-primary text-white" href="{{ route('admin.color.create')}}">Create New Color</a>
          @endif
       </p>

    <div class="table-wrapper">

      <table id="datatable1" class="table display responsive">
        <thead>
          <tr>
            <th>Sl</th>
            <th >Color Name</th>
            <th >Status</th>
            <th >Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colors as $color)
            <tr>
                 <td>{{ $color->index+1 }}</td>
                 <td>{{ $color->color }}</td>
                 <td style="text-align: center;"><span class="badge badge-success">{{($color->status==0)?' Disabled':'Enable'}}</span></td>
                 <td>
                     {{-- @if (Auth::guard('admin')->user()->can('admin.edit')) --}}
                         <a class="btn btn-success text-white" href="{{ route('admin.subsubcategory.edit', $color->id) }}"> <i class="icon ion-compose"></i></a>
                     {{-- @endif --}}

                     {{-- @if (Auth::guard('admin')->user()->can('admin.edit')) --}}
                         <a class="btn btn-danger text-white" href="{{ route('admin.subcategory.destroy', $color->id) }}"
                         onclick="event.preventDefault(); document.getElementById('delete-form-{{ $color->id }}').submit();">
                             <i class="icon ion-trash-a"></i>
                         </a>

                         <form id="delete-form-{{ $color->id }}" action="{{ route('admin.subcategory.destroy', $color->id) }}" method="POST" style="display: none;">
                             @method('DELETE')
                             @csrf
                         </form>
                     {{-- @endif --}}
                 </td>
             </tr>
            @endforeach
         </tbody>
      </table>
    </div><!-- table-wrapper -->
  </div><!-- card -->



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

