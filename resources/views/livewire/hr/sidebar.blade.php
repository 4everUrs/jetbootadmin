<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('hr')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{route('employee')}}" class="nav-link">
                    <i class="nav-icon fas fa-clock"></i>
                    <p>Employee List</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-clock"></i>
                    <p>Time And Attendance</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('time')}}" class="nav-link">Daily Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('oneweekly')}}" class="nav-link">Weekly Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('onemonthly')}}" class="nav-link">Monthly Attendance</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('shift')}}" class="nav-link">
                    <i class="nav-icon fas fa-calendar"></i>
                    <p>Shift And Schedule</p>  
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Leave Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('leave')}}" class="nav-link">Request List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('approval')}}" class="nav-link">Approve</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('disapproval')}}" class="nav-link">Disapprove</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('timesheet')}}" class="nav-link">
                    <i class="nav-icon fas fa-clock"></i>
                    <p>Timesheet Management</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                    <p>Claim And Reimbursement</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('claim')}}" class="nav-link">Request List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('claimapprove')}}" class="nav-link">Approve</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('claimdis')}}" class="nav-link">Disapprove</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('pay')}}" class="nav-link">
                    <i class="nav-icon fas fa-dollar-sign"></i>
                    <p>Payroll</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('corehuman')}}" class="nav-link">
                    <i class="nav-icon fas fa-horse"></i>
                    <p>Core Human Capital</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Compensation Planning</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('compensation')}}" class="nav-link">Claimable</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('claiming')}}" class="nav-link">Claimed</a>
                    </li>
                   
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('analytics')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>HR Analytics</p>
                </a>
            
            </li>
        </ul>
    </nav>
</div>