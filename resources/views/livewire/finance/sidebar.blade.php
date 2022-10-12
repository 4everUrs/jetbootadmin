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
                <a href="#budgetmanagement" class="nav-link">
                     {{--Budget Management --}}
                    <i class="fas fa-calculator"></i>
                    <p>Budget Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('transaction')}}" class="nav-link"></i>Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlist')}}" class="nav-link">Request lists</a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="{{route('allocatebudget')}}" class="nav-link">Budget Allocation</a>
                    </li>
                </ul>
            </li> 
            <li class="nav-item">
                <a href="#disbursement" class="nav-link">
                    {{--DISBURSEMENT --}}
                    <i class="fas fa-calculator"></i>
                    <p>Disbursement</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('moneyTransaction')}}" class="nav-link"></i>Budget Transaction</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#ap&ar" class="nav-link">
                    {{--AP & AR  --}}
                    <i class="fas fa-calculator"></i>
                    <p>AP & AR</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('journal')}}" class="nav-link">Journal Entry</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('generalledge')}}"class="nav-link">General Ledger</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('bsheets')}}"class="nav-link">Balance Sheets</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#collection" class="nav-link">
                <i class="fas fa-calculator"></i>
                    <p>Collection</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('collects')}}" class="nav-link">Earnings</a>
                    </li>
                    
                </ul>
            </li>
           
           
            
               
                    
                    
                </ul>
            </li> 
        </ul>
    </nav>
</div>