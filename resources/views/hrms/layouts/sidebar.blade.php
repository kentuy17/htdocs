<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="/profile" class="media-left">
            @if(Auth::user()->employee->photo)
                <img src="photos/{{Auth::user()->employee->photo}}" width="40px" height="30px" class="img-responsive">
            @else
                <img src="{{ URL::asset('assets/img/avatars/profile_pic.png') }}" class="img-responsive">
            @endif

        </a>

        <div class="media-body">
            <div class="media-author"><a href="/profile">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a class="accordion-toggle menu-open" href="/dashboard">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" id="employees" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Employees</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Employee </a>
                </li>
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="glyphicon glyphicon-tags"></span> Employee Listing </a>
                </li>
                <li>
                    <a href="{{route('upload-emp')}}">
                        <span class="glyphicon glyphicon-tags"></span> Upload </a>
                </li>
            </ul>
        </li>

        @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
            <li>
                <a class="accordion-toggle" id="clients" href="/dashboard">
                    <span class="fa fa-user"></span>
                    <span class="sidebar-title">Clients</span>
                    <span class="caret"></span>
                </a>
                <ul class="nav sub-nav">
                    <li>
                        <a href="{{route('add-client')}}">
                            <span class="glyphicon glyphicon-tags"></span> Add Client </a>
                    </li>

                    <li>
                        <a href="{{route('list-client')}}">
                            <span class="glyphicon glyphicon-tags"></span> List Client </a>
                    </li>
                </ul>
            </li>
        @endif

        <li>
            <a class="accordion-toggle" id="projects" href="/dashboard">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Projects</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Project </a>
                </li>

                <li>
                    <a href="{{route('list-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> List Project</a>
                </li>

                <li>
                    <a href="{{route('assign-project')}}">
                        <span class="glyphicon glyphicon-tags"></span> Assign Project</a>
                </li>

                <li>
                    <a href="{{route('project-assignment-listing')}}">
                        <span class="glyphicon glyphicon-tags"></span> Project Assignment Listing</a>
                </li>
            </ul>
        </li>

        <li>

            <a href="/bank-account-details">
                <span class="fa fa-bank"></span>
                <span class="sidebar-title">Bank Account</span>

            </a>
        </li>

        <li>
            <a class="accordion-toggle" id="teams" href="/dashboard">
                <span class="fa fa-group"></span>
                <span class="sidebar-title">Teams</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-team')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Team </a>
                </li>
                <li>
                    <a href="{{route('team-listing')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Team Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" id="roles" href="/dashboard">
                <span class="fa fa-graduation-cap"></span>
                <span class="sidebar-title">Roles</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-role')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Role </a>
                </li>
                <li>
                    <a href="{{route('role-list')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Role Listings </a>
                </li>
            </ul>
        </li>
        <li>
            <a class="accordion-toggle" id="assets" href="/dashboard">
                <span class="fa fa fa-laptop"></span>
                <span class="sidebar-title">Assets</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-asset')}}">
                        <span class="glyphicon glyphicon-shopping-cart"></span> Add Asset </a>
                </li>
                <li>
                    <a href="{{route('asset-listing')}}">
                        <span class="glyphicon glyphicon-calendar"></span> Asset Listings </a>
                </li>
                <li>
                    <a href="{{route('assign-asset')}}">
                        <span class="fa fa-desktop"></span> Assign Asset </a>
                </li>
                <li>
                    <a href="{{route('assignment-listing')}}">
                        <span class="fa fa-clipboard"></span> Assignment Listings </a>
                </li>
            </ul>
        </li>
    @endif
    <li>
        <a class="accordion-toggle" id="leaves" href="/dashboard">
            <span class="fa fa-envelope"></span>
            <span class="sidebar-title">Leaves</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            <li>
                <a href="{{route('apply-leave')}}">
                    <span class="glyphicon glyphicon-shopping-cart"></span> Apply Leave </a>
            </li>
            <li>
                <a href="{{route('my-leave-list')}}">
                    <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
            </li>

            @if(\Auth::user()->isHR())
                <li>
                    <a href="{{route('add-leave-type')}}">
                        <span class="fa fa-desktop"></span> Add Leave Type </a>
                </li>
                <li>
                    <a href="{{route('leave-type-listing')}}">
                        <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                </li>
            @endif
            @if(Auth::user()->isHR() || Auth::user()->isCoordinator())
                <li>
                    <a href="{{route('total-leave-list')}}">
                        <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                </li>
            @endif
        </ul>
    </li>

    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" id="promotions" href="/dashboard">
                <span class="fa fa-arrow-circle-o-up"></span>
                <span class="sidebar-title">Promotions</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/promotion">
                        <span class="glyphicon glyphicon-book"></span> Promote </a>
                </li>
                <li>
                    <a href="/show-promotion">
                        <span class="glyphicon glyphicon-modal-window"></span> Promotion Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" id="expenses" href="/dashboard">
                <span class="fa fa-money"></span>
                <span class="sidebar-title">Expenses</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('add-expense')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Expense </a>
                </li>
                <li>
                    <a href="{{route('expense-list')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Expense Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle" id="awards" href="/dashboard">
                <span class="fa fa fa-trophy"></span>
                <span class="sidebar-title">Awards</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="/add-award">
                        <span class="fa fa-adn"></span> Add Award </a>
                </li>
                <li>
                    <a href="/award-listing">
                        <span class="glyphicon glyphicon-calendar"></span> Award Listings </a>
                </li>
                <li>
                    <a href="/assign-award">
                        <span class="fa fa-desktop"></span> Awardees </a>
                </li>
                <li>
                    <a href="/awardees-listing">
                        <span class="fa fa-clipboard"></span> Awardees Listings </a>
                </li>
            </ul>
        </li>
    @endif


    <li>
        <a class="accordion-toggle" id="trainings" href="#">
            <span class="fa fa fa-gavel"></span>
            <span class="sidebar-title">Trainings</span>
            <span class="caret"></span>
        </a>
        <ul class="nav sub-nav">
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="/add-training-program">
                        <span class="fa fa-adn"></span> Add Training Program </a>
                </li>
            @endif
            <li>
                <a href="/show-training-program">
                    <span class="glyphicon glyphicon-calendar"></span> Program Listings </a>
            </li>
            @if(\Auth::user()->notAnalyst())
                <li>
                    <a href="/add-training-invite">
                        <span class="fa fa-desktop"></span> Training Invite </a>
                </li>
            @endif
            <li>
                <a href="/show-training-invite">
                    <span class="fa fa-clipboard"></span> Invitation Listings </a>
            </li>
        </ul>
    </li>
    @if(Auth::user()->isHR())
        <li>
            <a class="accordion-toggle" id="attendance" href="#">
                <span class="fa fa-clock-o"></span>
                <span class="sidebar-title"> Attendance </span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('attendance-upload')}}">
                        <span class="glyphicon glyphicon-book"></span> Upload Sheets</a>
                </li>

            </ul>
        </li>

        <li>
            <a class="accordion-toggle" id="holiday" href="#">
                <span class="fa fa-tree"></span>
                <span class="sidebar-title">Holiday</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <!-- <a href="/add-holidays"> -->
                    <a href="{{route('add-holidays')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Holiday </a>
                </li>
                <li>
                    <a href="/holiday-listing">
                        <span class="glyphicon glyphicon-modal-window"></span> Holiday Listings </a>
                </li>
            </ul>
        </li>

    @endif

    {{--<li class="sidebar-label pt30"> Extras</li>--}}
    <li>
        <a href="/create-meeting">
            <span class="fa fa-calendar-o"></span>
            <span class="sidebar-title"> Meeting  &nbsp Invitation </span>
        </a>
    </li>

    @if(Auth::user()->isCoordinator() ||  Auth::user()->isHR())
        <li>
            <a href="/create-event">
                <span class="fa fa-calendar-o"></span>
                <span class="sidebar-title"> Event  &nbsp Invitation </span>
            </a>
        </li>
    @endif
    <li>

        <a href="/download-forms">
            <span class="fa fa-book"></span>
            <span class="sidebar-title">Download Forms</span>

        </a>
    </li>

    <li>
        <a href="/hr-policy">
            <span class="fa fa-gavel"></span>
            <span class="sidebar-title"> Company Policy </span>
        </a>
    </li>
    <p> &nbsp; </p>
</ul>
<!-- -------------- /Sidebar Menu  -------------- -->

<script>
    const MENUS = {
        employees: [
            'add-employee', 
            'employee-manager', 
            'upload-emp'
        ],
        clients: [
            'add-client', 
            'list-client'
        ],
        projects: [
            'add-project', 
            'list-project',
            'assign-project',
            'project-assignment-listing'
        ],
        teams: [
            'add-team', 
            'team-listing'
        ],
        roles: [
            'add-role', 
            'role-list'
        ],
        assets: [
            'add-asset', 
            'asset-listing', 
            'assign-asset', 
            'assignment-listing'
        ],
        leaves: [
            'apply-leave', 
            'my-leave-list', 
            'add-leave-type', 
            'leave-type-listing', 
            'total-leave-list'
        ],
        promotions: [
            'promotion', 
            'show-promotion'
        ],
        expenses: [
            'add-expense', 
            'expense-list'
        ],
        awards: [
            'add-award', 
            'award-listing', 
            'assign-award', 
            'awardees-listing'
        ],
        training: [
            'add-training-program', 
            'show-training-program', 
            'add-training-invite', 
            'show-training-invite'
        ],
        attendance: [
            'attendance-upload'
        ],
        holiday: [
            'add-holidays', 
            'holiday-listing',
        ]
    }

    const getRoute = () => {
        return "{{ Route::current()->getName() }}"
    }

    const toggleOpen = (route) => {
        var promises = []
        console.log(route)
        // await Promise.all([...arr.map(i => "our promise func"())]);
        
        Object.keys(MENUS).forEach(key => {
            if(MENUS[key].includes(route)){
                var element = document.getElementById(key)
                console.log(element)
                element.classList.add("menu-open")
            }
        })
    }

    let menuList = []
    let menuKeys = []

    const promiseList = new Promise(function(resolve,reject){
        Object.keys(MENUS).forEach((key)=>{
            menuList.push(MENUS[key])
            menuKeys.push(key)
        });
        // console.log(menuList)
        resolve(menuList);
    })


    Promise.all([promiseList]).then((list)=>{
        let currentRoute = getRoute()
        console.log(list, 'list')
        console.log(menuKeys, 'menuKeys')
        
        let ctr = 0
        list[0].forEach(array => {
            // console.log(array, 'key')
            if(array.includes(currentRoute)){
                // console.log(menuKeys[ctr], 'fuck')
                var element = document.getElementById(menuKeys[ctr])
                console.log(element)
                element.classList.add("menu-open")
            }
            ctr++
        })
    });

    let currentRoute = getRoute()
    // console.log(currentRoute, 'currentRoute')
    // toggleOpen(currentRoute)

</script>