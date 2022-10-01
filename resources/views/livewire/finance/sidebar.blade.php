<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('finance')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                     {{--Budget Management --}}
                    <i class="fas fa-calculator"></i>
                    <p>Budget Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('transaction')}}" class="nav-link"><i class="fas fa-rotate"></i>Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlist')}}" class="nav-link">Request lists</a>
                    </li>
                </ul>
            </li> 
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{--DISBURSEMENT --}}
                    <i class="fas fa-calculator"></i>
                    <p>Disubursement</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link"></i>Disbursement</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    {{--AP & AR  --}}
                    <i class="fas fa-calculator"></i>
                    <p>AP & AR</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('journal')}}" class="nav-link">Journal Entry</a>
                    </li>
                </ul>
            </li>
           
           
            
               
                    
                    
                </ul>
            </li> 
        </ul>
    </nav>
</div>