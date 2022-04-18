@extends('hrms.layouts.base3')

@section('content')
<div class="content">
  <div class="container-fluid">
    <!-- <form method="post" action="/add-employee-tmp"> -->
    <div class="row">
      <!-- Form -->
      
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title"> Leave for Approval</h3>
            </div>
            <div class="card-body p-0">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Employee</th>
                    <th>Code</th>
                    <th>Leave</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Day/s</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($leaves as $leave)
                  <tr>
                    <td>{{$leave->employee->name}}</td>
                    <td>{{$leave->employee->code}}</td>
                    <td>{{$leave->leaveType->leave_type}}</td>
                    <td>{{$leave->date_from}}</td>
                    <td>{{$leave->date_to}}</td>
                    <td>{{$leave->days}}</td>
                    <td>{{$leave->reason}}</td>
                    <td>{{$leave->leaveStatus->name}}</td>
                    <td>
                      <button data-id="{{ $leave->id }}" class="btn btn-primary btn-sm" id="approve"><i class="fas fa-check"></i> </button> | 
                      <button data-id="{{ $leave->id }}" class="btn btn-danger btn-sm" id="reject"><i class="fas fa-trash"></i> </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      
    </div>
    <!-- </form> -->
  </div>
</div>
@endsection


@section('title')
  For Approval
@endsection

@section('crumbs')
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('leave-approved')}}">Approved</a></li>
      <li class="breadcrumb-item active">List</li>
    </ol>
  </div><!-- /.col -->
@endsection

@push('scripts')
<script src="{{ URL::asset('assets/bower/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush

@section('jsfunction')
<!-- Custom Script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)')

    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    })
  })

  $(document).on('click', '#approve', function() {
    var id = $(this).data("id")
    $.ajax({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      url: '/approve-leave',
      data: {id: id},
      success: function(resp) {
        response = JSON.parse(resp)
        alert(response.msg)
      }
    })
    $(this).closest('tr').remove()
  })
</script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush