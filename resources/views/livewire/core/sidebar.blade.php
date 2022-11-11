<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar child-indent navbar-compact flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('core')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('emailbox')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Mail Box</p>
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
                        <a href="{{route('applicantname')}}" class="nav-link"><i class='fa fa-list-ol'></i> List of Applicant</a>
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
                        <a href="{{route('jobcandidate')}}" class="nav-link"><i class='fa fa-list'></i> Applicant Scheduling</a>
                        <a href="{{route('initial')}}" class="nav-link"><i class='fa fa-list'></i> Initial Interview</a>
                        <a href="{{route('candidate')}}" class="nav-link"><i class='fa fa-list'></i> List of Job Candidates</a>
                        <a href="{{route('deniedapplicant')}}" class="nav-link"><i class='fa fa-list-ul'></i> List of Denied Applicants</a>
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
                        <a href="{{route('onboarding')}}" class="nav-link"><i class='fa fa-table'></i> Onboarding</a>
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
                        <a href="{{route('employeedata')}}" class="nav-link"><i class='fa fa-table'></i> Employee Data</a>
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
                        <a href="{{route('applicantreport')}}" class="nav-link"><i class='fa fa-file'></i> Analytics & Report</a>
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
                        <a href="{{route('jobvacancy')}}" class="nav-link"><i class='fa fa-table'></i> Job Vacancy</a>
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
                        <a href="{{route('paymentfee')}}" class="nav-link"><i class='fa fa-credit-card'></i> Payroll</a>
                        <a href="{{route('payment')}}" class="nav-link"><i class='fa fa-credit-card'></i> Payment</a>
                        <a href="{{route('budgetproposal')}}" class="nav-link"><i class='fa fa-credit-card'></i> Budget Proposal</a>
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
                        <a href="{{route('placementfee')}}" class="nav-link"><i class='fa fa-car'></i> Deployment</a>
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
                        <a href="{{route('clientdata')}}" class="nav-link"><i class='fa fa-table'></i> Client List</a>
                        <a href="{{route('joblist')}}" class="nav-link"><i class='fa fa-plus'></i> Create Job</a>
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
                        <a href="{{route('agreement')}}" class="nav-link"><i class='fa fa-table'></i> Clients Agreement List</a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>