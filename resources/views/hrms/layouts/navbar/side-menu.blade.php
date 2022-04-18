  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
      <!-- EMPLOYEES -->
      <li class="nav-item">
        <a href="#" id="employees" class="nav-link">
          <i class="nav-icon fa fa-user"></i>
          <p>Employees</p>
          <i class="fas fa-angle-left right"></i>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('add-employee')}}" id="add-employee" class="nav-link">
              <i class="fa fa-plus nav-icon" style="margin-left:10px"></i>
              <p>Add Employee</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('list-employee')}}" id="list-employee" class="nav-link">
              <i class="fa fa-list nav-icon" style="margin-left:10px"></i>
              <p>Employee List</p>
            </a>
          </li>
        </ul>
      </li>

      <!-- ATTENDANCE -->
      <li class="nav-item">
          <a href="#" id="attendance" class="nav-link">
            <i class="nav-icon fa fa-clock"></i>
            <p>Attendance</p>
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
            @if(\Auth::user()->isHR())
            <li class="nav-item">
              <a href="{{route('timesheet')}}" id="timesheet" class="nav-link">
                <i class="fa fa-calendar nav-icon" style="margin-left:10px"></i>
                <p>Employee Timesheet</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('timesheet')}}" id="timesheet" class="nav-link">
                <i class="fa fa-calendar-alt nav-icon" style="margin-left:10px"></i>
                <p>My Timesheet</p>
              </a>
            </li>
            @endif
            <!-- <li class="nav-item">
              <a href="{{route('attendance-upload')}}" class="nav-link">
                <i class="fa fa-upload nav-icon" style="margin-left:10px"></i>
                <p>Upload Excel</p>
              </a>
            </li> -->
          </ul>
        </li>

      <!-- ROLES -->
      @if(\Auth::user()->isHR())
      <li class="nav-item">
        <a href="#" id="roles" class="nav-link">
          <i class="nav-icon fa fa-graduation-cap"></i>
          <p>Roles</p>
          <i class="fas fa-angle-left right"></i>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('add-role')}}" id="add-role" class="nav-link">
              <i class="fa fa-plus nav-icon" style="margin-left:10px"></i>
              <p>Add Role</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('role-list')}}" id="role-list" class="nav-link">
              <i class="fa fa-list nav-icon" style="margin-left:10px"></i>
              <p>List Roles</p>
            </a>
          </li>
        </ul>
      </li>
      @endif

      <!-- LEAVES -->
      <li class="nav-item">
        <a href="#" id="leaves" class="nav-link">
          <i class="nav-icon fa fa-envelope"></i>
          <p>Leaves</p>
          <i class="fas fa-angle-left right"></i>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('apply-leave')}}" id="apply-leave" class="nav-link">
              <i class="fa fa-calendar nav-icon" style="margin-left:10px"></i>
              <p>Apply Leave</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('leave-for-approval')}}" id="leave-for-approval" class="nav-link">
              <i class="fa fa-regular fa-clipboard nav-icon" style="margin-left:10px"></i>
              <p>to be approved Leave</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('leave-approved')}}" id="leave-approved" class="nav-link">
            <i class="fa fa-regular fa-calendar-check nav-icon" style="margin-left:10px"></i>
              <p>Approved Leave</p>
            </a>
          </li>
          <!-- For HR -->
          @if(\Auth::user()->isHR())
            <!-- <li class="nav-item">
              <a href="{{route('add-leave-type')}}" id="add-leave-type" class="nav-link">
              <i class="fa fa-plus nav-icon" style="margin-left:10px"></i>
                <p>Add Leave Type</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="{{route('leave-type-listing')}}" id="leave-type-listing" class="nav-link">
              <i class="fa fa-calendar-alt nav-icon" style="margin-left:10px"></i>
                <p>Types of Leave</p>
              </a>
            </li>
          @endif
          <!-- HR or Coordinator -->
          @if(Auth::user()->isHR() || Auth::user()->isCoordinator())
            <li class="nav-item">
              <a href="{{route('total-leave-list')}}" id="total-leave-list" class="nav-link">
              <i class="fa fa-list-alt nav-icon" style="margin-left:10px"></i>
                <p>Total Leave Lists</p>
              </a>
            </li>
          @endif
        </ul>
      </li>

      
      @if(Auth::user()->isHR())
        <!-- HOLIDAY -->
        <li class="nav-item">
          <a href="#" id="holiday" class="nav-link">
            <i class="nav-icon fa fa-calendar"></i>
            <p>Holiday</p>
            <i class="fas fa-angle-left right"></i>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('add-holidays')}}" id="add-holidays" class="nav-link">
                <i class="fa fa-tree nav-icon" style="margin-left:10px"></i>
                <p>Add Holiday</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('holiday-listing')}}" id="holiday-listing" class="nav-link">
                <i class="fa fa-table nav-icon" style="margin-left:10px"></i>
                <p>Holiday List</p>
              </a>
            </li>
          </ul>
        </li>
      @endif

      <!-- MISC -->
      <li class="nav-header">MISC</li>
      <!-- Downloadable forms -->
      <li class="nav-item">
        <a href="/download-forms" class="nav-link">
          <i class="fa fa-file-excel nav-icon" style="margin-left:10px"></i>
          <p>Download Forms</p>
        </a>
      </li>
      <!-- policy -->
      <li class="nav-item">
        <a href="/hr-policy" class="nav-link">
        <i class="fa fa-file-pdf nav-icon" style="margin-left:10px"></i>
          <p>HR Policy</p>
        </a>
      </li>

      <!-- DEFAULT -->
    </ul>
  </nav>

  <script>
    const MENUS = {
      employees: ['add-employee', 'employee-manager', 'upload-emp', 'list-employee'], 
      roles: ['add-role', 'role-list'], 
      assets: ['add-asset', 'asset-listing', 'assign-asset', 'assignment-listing'], 
      leaves: ['apply-leave', 'leave-for-approval', 'add-leave-type', 'leave-type-listing', 'leave-approved', 'total-leave-list'],
      attendance: ['attendance-upload', 'timesheet'],
      holiday: ['add-holidays', 'holiday-listing',]
    }

    const getRoute = () => {
      return "{{ Route::current()->getName() }}"
    }

    const NO_NAV = ['welcom', 'dashboard']
    
    const toggleOpen = (route) => {
      var hasNav = NO_NAV.includes(route)
      console.log(hasNav)

      if(hasNav || route) {
        console.log(route, 'route')
        var nav = document.getElementById(route)
        nav.classList.add("active")
      }
      
      Object.keys(MENUS).forEach(key => {
        if(MENUS[key].includes(route)){
          var element = document.getElementById(key).parentElement
          if(hasNav || route){
            element.classList.add("menu-open")
          }
        }
      })
    }

    toggleOpen(getRoute())



  </script>