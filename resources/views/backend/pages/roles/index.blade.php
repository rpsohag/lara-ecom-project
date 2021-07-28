
@extends('backend.layouts.master')

@section('title')
Role Page - Admin Panel
@endsection


@section('all_roles')
active
@endsection

@section('view_roles')
active
@endsection

@section('all_roles_d')
d-block
@endsection

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
    <div class="card-body">
    <h4 class="header-title float-left">Roles List</h4>
    <p class="float-right mb-2">
            @if (Auth::guard('admin')->user()->can('role.create'))
              <a class="btn btn-primary text-white" href="{{ route('admin.roles.create')}}">Create New Role</a>
          @endif
       </p>
       <div class="clearfix"></div>
    <div class="table-wrapper">
      <table id="datatable1" class="table display responsive">
        <thead>
          <tr>
            <th width="5%">Sl</th>
            <th width="10%">Name</th>
            <th width="60%">Permissions</th>
            <th width="15%">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                 <td>{{ $loop->index+1 }}</td>
                 <td>{{ $role->name }}</td>
                 <td>
                     @foreach ($role->permissions as $perm)
                         <span class="badge badge-info mr-1">
                             {{ $perm->name }}
                         </span>
                     @endforeach
                 </td>
                 <td>
            
                         <a class="btn btn-success text-white" href="{{ route('admin.roles.edit', $role->id) }}"> <i class="icon ion-compose"></i></a>
              

            
                         <a class="btn btn-danger text-white" href="{{ route('admin.roles.destroy', $role->id) }}"
                         onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                             <i class="icon ion-trash-a"></i>
                         </a>

                         <form id="delete-form-{{ $role->id }}" action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" style="display: none;">
                             @method('DELETE')
                             @csrf
                         </form>
          
                 </td>
             </tr>
            @endforeach
         </tbody>
      </table>
    </div><!-- table-wrapper -->
    </div>
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

