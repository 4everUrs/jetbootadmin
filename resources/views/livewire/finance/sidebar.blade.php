<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
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
                        <a href="{{route('transaction')}}" class="nav-link"><i class="fas fa-users"></i>&nbsp;Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlist')}}" class="nav-link"><i class="fas fa-bell"></i>&nbsp;Request lists</a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="{{route('allocatebudget')}}" class="nav-link"><i class="fas fa-piggy-bank"></i>&nbsp;Budget Allocation</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('budgetsreports')}}" class="nav-link"><i class="fas fa-folder-open"></i>&nbsp;Reports</a>
                    </li>
                </ul>
            </li> 
            <li class="nav-item">
                <a href="#disbursement" class="nav-link">
                    {{--DISBURSEMENT --}}
                    <i class="fas fa-stamp"></i>
                    <p>Disbursement</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('moneyTransaction')}}"class="nav-link"><i class="fas fa-chart-pie"></i>&nbsp;Disbursement Transaction</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#ap&ar" class="nav-link">
                    {{--Account Payable--}}
                    <i class="fas fa-wallet"></i>
                    <p>Account Payable</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('listspayables')}}" class="nav-link"><i class="fas fa-list"></i>&nbsp;Lists of Payables</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('payables')}}" class="nav-link"><i class="fas fa-list"></i>&nbsp;Payable</a>
                    </li>
                    
                    
                </ul>
            </li>
            <li class="nav-item">
                <a href="#ap&ar" class="nav-link">
                    {{--Account Receivable--}}
                    <i class="fas fa-receipt"></i>
                    <p>Account Receivable</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('listsreceivable')}}" class="nav-link"><i class="fas fa-list"></i>&nbsp;Lists of Receivable</a>
                    </li>
                    
                </ul>
            </li>

            <li class="nav-item">
                <a href="#collection" class="nav-link">
                    <i class="fas fa-cash-register"></i>
                    <p>Collection</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('collects')}}" class="nav-link"><i class="fas fa-coins"></i>Earnings</a>
                    </li>   
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('creports')}}" class="nav-link"><i class="fas fa-coins"></i>Report</a>
                    </li>   
                </ul>
            </li>
            <li class="nav-item">
                <a href="#generalledger" class="nav-link">
                    <i class="fas fa-chart-line"></i>
                    <p>General Ledger</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('entryjournal')}}" class="nav-link"><i class="fas fa-coins"></i>Journal Entry</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('coa')}}" class="nav-link"><i class="fas fa-chalkboard"></i>Chart of Accounts</a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('incomestates')}}" class="nav-link"><i class="fas fa-chalkboard"></i>Income Statement</a>
                    </li>
                </ul>
            </li>
           
           
            
               
                    
                    
                </ul>
            </li> 
        </ul>
    </nav>
</div>