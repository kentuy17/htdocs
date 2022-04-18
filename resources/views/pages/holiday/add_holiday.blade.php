@extends('hrms.layouts.base3')

@section('content')
<div class="content">
  <div class="container-fluid">
    <form method="post" action="/add-holidays">
    <div class="row">
      <!-- Form -->
      
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Add Holiday</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p25 p10">
              <form method="post" action="/add-role" class="form-horizontal">
                <div class="form-group row">
                  <!-- text input -->
                  <div class="col-md-3 control-label">
                    <label class="float-right">Holiday</label>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" name="holiday" id="holiday" placeholder="Add Holiday">
                  </div>
                </div>
                <!-- desc input -->
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <label class="float-right">Date</label>
                  </div>
                  <div class="col-md-6">
                    <input type="date" name="holi_date" id="holi_date" class="form-control" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <label class="float-right">Type</label>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select2bs4" name="type" id="type" style="width: 100%;">
                      <option value="">Select</option>
                      @foreach($holiday_type as $key => $type)
                      <option value="{{$key}}">{{$type}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-3 control-label">
                    <label class="float-right">Note</label>
                  </div>
                  <div class="col-md-6">
                    <textarea name="note" id="note" class="form-control" rows="3" placeholder="Note..."></textarea>
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
    </form>
  </div>
</div>
@endsection


@section('title')
  Add Employee
@endsection

@section('crumbs')
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('role-list')}}">User Roles</a></li>
      <li class="breadcrumb-item active">Add</li>
    </ol>
  </div><!-- /.col -->
@endsection

@push('scripts')
  <!-- <script src="{{ URL::asset('assets/bower/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script> -->
  <script src="{{ URL::asset('assets/bower/plugins/jquery/jquery.js') }}"></script>
  <!-- <script src="{{ URL::asset('assets/bower/js/jquery.datetimepicker.full.min.js') }}"></script> -->
@endpush

@section('jsfunction')
@endsection

@push('styles')
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush