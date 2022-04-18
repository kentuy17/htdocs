@extends('hrms.layouts.base3')

@section('content')
<div class="content">
  <div class="container-fluid">
    <!-- <form method="post" action="/add-role"> -->
    <div class="row">
      <!-- Form -->
      
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">File Leave</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p25 p10">
              <form method="post" action="/apply-leave" class="form-horizontal">
                <div class="form-group row">
                  @if (session('message'))
                    <div class="alert {{session('class')}}">
                        {{ session('message') }}
                    </div>
                  @endif
                  <!-- text input -->
                  <div class="col-md-3 control-label">
                    <label class="float-left">Emp</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select2bs4" name="emp_id" id="emp_id" style="width: 100%;" required>
                      <option selected value="" disabled>Select</option>
                      @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <!-- select -->
                  <div class="col-md-3 control-label">
                    <label class="float-left">Type</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select2bs4" name="leave_type" id="leave_type" style="width: 100%;" required>
                      <option value="">Select</option>
                      @foreach($leaves as $leave)
                        <option value="{{$leave->id}}">{{$leave->leave_type}} - {{$leave->description}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <!-- desc input -->
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <label class="float-left">Reason</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="reason" id="reason" class="form-control" rows="3"></textarea>
                  </div>
                </div>
                <!-- desc Range -->
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <label class="float-left">From</label>
                  </div>
                  <!-- sample -->
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="date_from" id="date_from" value="{{date('Y-m-d')}}" class="form-control" required>
                  </div>
                  <!-- end -->
                </div>
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <label class="float-left">To</label>
                  </div>
                  <div class="input-group col-md-6">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" name="date_to" id="date_to" value="{{date('Y-m-d')}}" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  </div>
                  <div class="col-md-6">
                    <button id="submit" type="submit" class="btn btn-primary float-right">Submit</button>
                  </div>
                </div>
              </form>
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
  Add Employee
@endsection

@section('crumbs')
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('my-leave-list')}}">My Leave List</a></li>
      <li class="breadcrumb-item active">Apply</li>
    </ol>
  </div><!-- /.col -->
@endsection

@push('scripts')
  <!-- <script src="{{ URL::asset('assets/bower/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script> -->
  <script src="{{ URL::asset('assets/bower/plugins/jquery/jquery.js') }}"></script>
  <!-- <script src="{{ URL::asset('assets/bower/js/jquery.datetimepicker.full.min.js') }}"></script> -->
@endpush

@section('jsfunction')
<script>
document.getElementById("submit").addEventListener("click", function(){ 
  var dateFrom = $('#date_from').val()
  var dateTo = $('#date_to').val()

  // if(!dateFrom){
  //   alert('Please select Date From')
  //   return false
  // }

  // if(!dateTo){
  //   alert('Please select Date To')
  //   return false
  // }
})
</script>
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <style>label.float-left{ margin-left: 200px; }</style>
@endpush