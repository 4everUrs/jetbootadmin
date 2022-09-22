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
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Budget Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('transaction')}}" class="nav-link">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlists1')}}" class="nav-link">Request lists</a>
                    </li>
                                        
                    
                        
                    
                    
                </ul>
            </li> 
        </ul>
    </nav>
</div>