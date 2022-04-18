@extends('hrms.layouts.base3')

@section('content')
<div class="content">
  <div class="container-fluid">
    <form method="post" action="/add-employee">
    <div class="row">
      <!-- Form -->
      
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title">Details</h3>
            </div>
            <div class="card-body p-0">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#personal-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="personal-part" id="personal-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Personal</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#employment-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="employment-part" id="employment-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Employment</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                  <div id="personal-part" class="content" role="tabpanel" aria-labelledby="personal-part-trigger">
                    <div class="form-group">
                      <label for="exampleInputFile">File input</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="emp_code">Employee Code</label>
                      <input type="text" name="emp_code" class="form-control" id="emp_code" placeholder="Employee Code" required>
                    </div>
                    <div class="form-group">
                      <label for="emp_name">Full Name</label>
                      <input type="text" class="form-control" id="emp_name" name="emp_name" placeholder="Full Name" required>
                    </div>
                    <div class="form-group">
                      <label for="emp_status">Employment Status</label>
                      <select name="emp_status" id="emp_status" class="select2-single form-control">
                        <option value="">Select</option>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                        <option value="2">Fired</option>
                        <option value="3">Retired</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="emp_name">Role</label>
                      <select class="select2-single form-control" name="role" id="role" required>
                          <option value="">Select role</option>
                          @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="gender">Sex</label>
                      <select class="select2-single form-control" name="gender" id="gender">
                        <option selected disabled value="">Select sex</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                        <option value="2">Undecided</option>
                      </select>
                    </div>
                    
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob">
                      <!-- <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div> -->
                    </div>
                    <button 
                      class="btn btn-primary"
                      type="button"
                      onclick="stepper.next()"
                    >Next
                    </button>
                  </div>
                  <div id="employment-part" class="content" role="tabpanel" aria-labelledby="employment-part-trigger">
                    <div class="form-group">
                      <label for="department">Department</label>
                      <select class="select2-single form-control" name="department" id="department">
                        <option value="">Select role</option>
                        <option value="Faculty">Faculty</option>
                        <option value="Utility">Utility</option>
                        <option value="Maintenace">Maintenace</option>
                        <option value="IT">IT</option>
                        <option value="Security">Security</option>
                        <option value="Cafeteria">Cafeteria</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="salary">Salary</label>
                      <input type="number" class="form-control" name="salary" id="salary" placeholder="₱0.00" required>
                    </div>
                    <button class="btn btn-primary" onclick="stepper.previous()">Previous</button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              Visit <a href="https://github.com/Johann-S/bs-stepper/#how-to-use-it">bs-stepper documentation</a> for more examples and information about the plugin.
            </div>
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
      <li class="breadcrumb-item"><a href="{{route('list-employee')}}">Employees</a></li>
      <li class="breadcrumb-item active">Add</li>
    </ol>
  </div><!-- /.col -->
@endsection

@push('scripts')
  <script src="{{ URL::asset('assets/bower/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/plugins/jquery/jquery.js') }}"></script>
  <script src="{{ URL::asset('assets/bower/js/jquery.datetimepicker.full.min.js') }}"></script>
@endpush

@section('jsfunction')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    jQuery('#reservationdate').datetimepicker({
      theme: 'dark',
      formatDate:'DD.MM.YYYY',
      // closeOnDateSelect:true,
      timepicker: false
    })

    
    document.getElementById("submit").addEventListener("click", function(){ 
      var required_fields = {
        'Employee Code': $('#emp_code').val(),
        'Employee Name': $('#emp_name').val(),
        'Role': $('#role').val(),
        'Salary': $('#salary').val()
      }

      for (const [key, value] of Object.entries(required_fields)) {
        if(!value){
          alert('Please fillup ' + key)
        }
      }
    })
    
  </script>

@endsection

@push('styles')
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/bs-stepper/css/bs-stepper.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('assets/bower/css/jquery.datetimepicker.css') }}">
@endpush