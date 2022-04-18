@extends('hrms.layouts.base3')

@section('content')
<div class="content">
  <div class="container-fluid">
    <form method="post" action="/add-employee-tmp">
    <div class="row">
      <!-- Form -->
      
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
            <h3 class="card-title"> Employees</h3>
            </div>
            <div class="card-body p-0">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($employees as $employee)
                    <!-- {{print_r($employee)}} -->
                    <?php
                      $status_emp = ['Inactive', 'Active', 'Fired', 'Retired'];
                    ?>
                    <tr>
                      <td>{{$employee->id}}</td>
                      <td>{{$employee->name}}</td>
                      <td>{{$employee->email}}</td>
                      <td>{{$employee->employee->code}}</td>
                      <td>{{$status_emp[$employee->employee->status]}}</td>
                      <td class="align-center">
                        <div class="btn-group align-center">
                          <a href="employee/{{$employee->id}}" class="btn btn-primary btn-sm" >
                            <i class="fa fa-eye"></i> View
                          </a>
                          <button type="button" class="btn btn-primary btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <div class="dropdown-menu" role="menu">
                            <a class="dropdown-item" href="employee/edit/{{$employee->id}}"><i class="fas fa-user-edit"></i> Edit</a>
                            <a class="dropdown-item" href="employee/delete/{{$employee->id}}"><i class="fas fa-trash"></i> Delete</a>
                            <!-- <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a> -->
                          </div>
                        </div>
                      </td>
                    </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!-- @foreach($employees as $employee)
                {{print_r($employee)}}
              @endforeach -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      
    </div>
    </form>
  </div>
</div>
@endsection


@section('title')
  List Employee
@endsection

@section('crumbs')
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('list-employee')}}">Employees</a></li>
      <li class="breadcrumb-item active">List</li>
    </ol>
  </div><!-- /.col -->
@endsection

@push('scripts')
  <!-- <script src="{{ URL::asset('assets/bower/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/jquery/jquery.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/datatables/jquery.dataTables.min.js') }}"></script> -->
  <script src="{{ URL::asset('assets/bower/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <!-- <script src="{{ URL::asset('assets/bower/plugins/jquery/jquery.js') }}"></script> -->
@endpush

@section('jsfunction')
<script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    })
  })
</script>

@endsection

@push('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/bootstrap.min.css') }}">
  
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/adminlte.css') }}">
@endpush