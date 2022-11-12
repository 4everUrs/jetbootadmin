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
                        <a href="{{route('transaction')}}" class="nav-link"><i class="fas fa-share"></i>&nbsp;Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlist')}}" class="nav-link"><i class="fas fa-bell"></i>&nbsp;Request lists</a>
                        
                    </li>
                    <li class="nav-item">
                        <a href="{{route('allocatebudget')}}" class="nav-link"><i class="fas fa-piggy-bank"></i>&nbsp;Budget Allocation</a>
                    </li>
                </ul>
            </li> 
            <li class="nav-item">
                <a href="#disbursement" class="nav-link">
                    {{--DISBURSEMENT --}}
                    <i class="fas fa-money-bill"></i>
                    <p>Disbursement</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('moneyTransaction')}}"class="nav-link"><i class="fas fa-chart-pie"></i>&nbsp;Budget Transaction</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#ap&ar" class="nav-link">
                    {{--AP & AR  --}}
                    <i class="fas fa-folder-open"></i>
                    <p>AP & AR</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('journal')}}" class="nav-link"><i class="fas fa-file-import"></i>&nbsp;Records and Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('listspayables')}}" class="nav-link"><i class="fas fa-receipt"></i>&nbsp;Lists of Payables</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('listsreceivable')}}" class="nav-link"><i class="fas fa-arrow-down"></i>Lists of Receivable</a>
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
            </li>
           
           
            
               
                    
                    
                </ul>
            </li> 
        </ul>
    </nav>
</div>