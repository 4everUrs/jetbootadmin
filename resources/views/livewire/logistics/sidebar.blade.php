<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('logistics')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Procurement</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('requests')}}" class="nav-link">Request List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('suppliers')}}" class="nav-link">Suppliers List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('po')}}" class="nav-link">Purchase Order</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-box"></i>
                    <p>Warehouse</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('inventory')}}" class="nav-link">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlists')}}" class="nav-link">Request List</a>
                    </li>

                </ul>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Vendor</p>
                        <i class="right fas fa-angle-left"></i>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('recievedrequests')}}" class="nav-link">Recieved Requests</a>
                            <a href="{{route('supplierposting')}}" class="nav-link">Supplier Posting</a>
                        </li>
                    </ul>
                </li>
            </li>s
        </ul>
    </nav>
</div>
