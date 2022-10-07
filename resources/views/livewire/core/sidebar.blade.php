<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('core')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-location-arrow"></i>
                    <p>Recruitment</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('addclient')}}" class="nav-link"><i class='fa fa-plus'></i> Add Client</a>
                        <a href="{{route('applicantname')}}" class="nav-link"><i class='fa fa-list-ol'></i> List of Applicant</a>
                        <a href="{{route('denied')}}" class="nav-link"><i class='fa fa-trash'></i> List of Denied ??</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Applicant Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('jobcandidate')}}" class="nav-link">List of Applicant</a>
                        <a href="#" class="nav-link">Applicant Record</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>New Hire on Board</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('onboarding')}}" class="nav-link">Onboarding</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Employee Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('employeedata')}}" class="nav-link">Local</a>
                        <a href="#" class="nav-link">International</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Recruiting Analytics & Reporting</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('applicantreport')}}" class="nav-link">Applicant Report</a>
                        <a href="{{route('clientreport')}}" class="nav-link">Client Report</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Position/Job Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('jobvacancy')}}" class="nav-link">Job Vacancy</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>Payroll & Payment Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('paymentfee')}}" class="nav-link">Local Payroll</a>
                        <a href="#" class="nav-link">Local Payment</a>
                        <a href="#" class="nav-link">International Payroll</a>
                        <a href="#" class="nav-link">International Payment</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-plane"></i>
                    <p>Placement Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('placementfee')}}" class="nav-link">Local Deployment</a>
                        <a href="{{route('placementfee')}}" class="nav-link">International Deployment</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Client Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('clientdata')}}" class="nav-link">Client List</a>
                        <a href="{{route('joblist')}}" class="nav-link">Create Job</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Clients Agreement & Contract Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('contract')}}" class="nav-link"><i class='fa fa-pen'></i> Agency Contract Agreement <br> Form</a>
                        <a href="{{route('agreement')}}" class="nav-link">Clients Agreement List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>