@extends('hrms.layouts.base3')

@section('content')
<div class="container">
  <div class="main-body">

    <!-- Breadcrumb -->
    <!-- <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
        <li class="breadcrumb-item active" aria-current="page">User Profile</li>
      </ol>
    </nav> -->
    <!-- /Breadcrumb -->
    <form method="POST" action="/edit-employee">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>{{$emp->name}}</h4>
                <p class="text-secondary mb-1">{{$emp->user->role->role->name}}</p>
                <p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
                <a href="#" class="btn btn-primary">Follow</a>
                <a href="#" class="btn btn-outline-primary">Message</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="https://cdn.cdnlogo.com/logos/f/67/friendster.svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Friendster</h6>
              <span class="text-secondary">https://friendster.com</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
              <span class="text-secondary">https://bootdey.com</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
              <span class="text-secondary">bootdey</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
              <span class="text-secondary">@bootdey</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
              <span class="text-secondary">bootdey</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
              <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
              <span class="text-secondary">bootdey</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body" id="master_card">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" id="name" value="{{$emp->name}}" class="no-border" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" id="email" value="{{$emp->user->email}}" class="no-border" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Biometric ID</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="biometric_id" id="biometric_id" value="{{$emp->biometric_id}}" class="no-border" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Current Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" id="current_address" value="{{$emp->current_address}}" class="no-border" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Permanent Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" id="permanent_address" value="{{$emp->permanent_address}}" class="no-border" disabled>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="emp_id" value="{{ request()->id }} ">
                <button type="button" onclick="toggleButton()" id="edit_info" style="display:block" class="btn btn-info btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                <button type="button" onclick="toggleButton()" id="save_info" style="display:none" class="btn btn-info btn-sm"><i class="fas fa-save" aria-hidden="true"></i> Save</button>
              </div>
            </div>
          </div>
        </div>

        <div class="row gutters-sm">
          <div class="col-sm-6 mb-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                <small>Web Design</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Website Markup</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>One Page</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Mobile Template</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Backend API</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3">
            <div class="card h-100">
              <div class="card-body">
                <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">assignment</i>Project Status</h6>
                <small>Web Design</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Website Markup</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>One Page</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Mobile Template</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>Backend API</small>
                <div class="progress mb-3" style="height: 5px">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    </form>
  </div>
</div>
@endsection


@section('title')
  Employee Profile
@endsection

@section('crumbs')
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
    <a href="{{route('list-employee')}}"><i style="margin-right: 30px; size:20px;" class="fa fa-2xl fa-arrow-left" aria-hidden="true"></i></a>  
      <li class="breadcrumb-item">
        <a ref="{{route('list-employee')}}">
          List
        </a>
      </li>
      <li class="breadcrumb-item active">Info</li>
    </ol>
    
  </div><!-- /.col -->
@endsection

@push('scripts')

@endpush

@section('jsfunction')
<script>
  function toggleButton() {
    var id = this.window.event.srcElement.id
    var show = id == 'edit_info' ? '#save_info' : '#edit_info'
    document.getElementById(id).style.display = 'none'
    $(show)[0].style.display = 'block'
  } 

  $(document).on('click', '#edit_info', function(){
    var childDivs = document.querySelectorAll('#master_card input')
    var data = {}
    childDivs.forEach((i) => {
      i.removeAttribute('disabled','')
      data[i.id] = i.value
    })
    childDivs[0].focus()
  })

  $(document).on('click', '#save_info', function(){
    event.preventDefault();
    var childDivs = document.querySelectorAll('#master_card input')
    var data = {}
    childDivs.forEach((i) => {
      i.setAttribute('disabled','')
      data[i.id] = i.value
    })
    $.ajax({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST',
      data: data,
      url: '/edit-employee',
      success: function(res) {
        alert('Info Updated.')
      }
    })
  })
</script>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ URL::asset('assets/profile.css') }}">

@endpush
