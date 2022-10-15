<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('logistics')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#procurement" class="nav-link">
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
                        <a href="{{route('recievedrequests')}}" class="nav-link">Requests</a>
                        <a href="{{route('supplierposting')}}" class="nav-link">Posting</a>
                        <a href="{{route('disposal')}}" class="nav-link">Disposal</a>
                        <a href="{{route('bidders')}}" class="nav-link">Bidders</a>
                        <a href="{{route('buyers')}}" class="nav-link">Orders</a>
                        <a href="{{route('workshop')}}" class="nav-link">Workshops</a>
                        <a href="{{route('supplierlist')}}" class="nav-link">Supplier List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Asset Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('assets')}}" class="nav-link">Assets List</a>
                        <a href="{{route('newasset')}}" class="nav-link">Add New Asset</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Project Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('projects')}}" class="nav-link">List of Project</a>
                        <a href="{{route('newproject')}}" class="nav-link">Creat new project</a>
                        <a href="{{route('proposal')}}" class="nav-link">Project Proposal</a>
                    </li>
                </ul>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-car"></i>
                    <p>Fleet Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('mappers')}}" class="nav-link">Maps</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('vehicleinformation')}}" class="nav-link">Vehicles</a>
                    </li>
                    <a href="#" class="nav-link">Reports</a>
            </li>
            </li>
            </li>

        </ul>
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>Vehicle Reservation</p>
                <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('reserve')}}" class="nav-link">Reservations</a>
                </li>
            </ul>
        <li class="nav-item ">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>MRO</p>
                <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('repairs')}}" class="nav-link">Repairs</a>
                </li>
            </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('romlist')}}" class="nav-link">MRO Request List</a>
                    </li>
                </ul>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('rominventory')}}" class="nav-link">Inventory</a>
                    </li>
                    </ul>
                
    </nav>
</div>