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
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead> 
                    <tr>
                      <td>Employee</td>
                      <td>Biometric#</td> 
                      <td>Date</td> 
                      <td id="code">Code</td> 
                    </tr> 
                  </thead> 
                </table> 
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>


<!-- <script src="{{ URL::asset('assets/bower/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/bower/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script> -->

<!-- <script src="{{ URL::asset('assets/js/jquery/jquery.min.js') }}"></script>  -->

<!-- <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script> -->

  
  <!-- <script src="{{ URL::asset('assets/bower/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/jquery/jquery.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/js/jquery.datetimepicker.full.min.js') }}"></script> -->
@endpush

@section('jsfunction')
<script>
  $(document).ready( function () {
    $('#example1').DataTable({
      createdRow: function ( row, data, index ) {
        // $(row).val('yawa').index
      },
      "ajax": '/attendance/logs',
      "columns": [
        {"data": "employee.name"},
        {"data": "user_id"},
        {"data": "date"},
        {
          "mData": "date",
          "mRender": function (data, type, row) {
            nDate = new Date(data)
            dateOnly = data.split(' ')
            return nDate.getTime() < toTimestamp(dateOnly[0]) ? 'TIME-IN' : 'TIME-OUT'
          }
        }
      ],
      "dom": 'Bfrtip',
      "responsive": true,
      "lengthChange": true, 
      "autoWidth": false,
      "buttons": ["csv", "excel"],
    })
  })

  // $(function () {
  //   $("#example1").DataTable({
  //     "responsive": true, "lengthChange": false, "autoWidth": false,
  //     "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  //   }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  // });
  // "dom": 'Bfrtip',
  // $("#example1").DataTable({
  //   "responsive": true, "lengthChange": false, "autoWidth": false,
  //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
  // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  function timeNow(i) {
    return new Date(i).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
  }

  const toTimestamp = (strDate) => {  
    var target = new Date(strDate + " 12:00:00")
    return target.getTime()
  }  
</script>

@endsection

@push('styles')
  <!-- orig -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  
  <!-- <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}"> -->
  
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/adminlte.css') }}">
  
  <!-- <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/jquery.datetimepicker.css') }}"> -->
@endpush