<div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('logistics')}}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('users-lists')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Users List</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="#procurement" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
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
                    <li class="nav-item">
                        <a href="{{route('bmproposal')}}" class="nav-link">Budget Proposal</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('invoice')}}" class="nav-link">Invoice</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-warehouse"></i>
                    <p>Warehouse </p>
                    <i class="right fas fa-angle-left" ></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('inventory')}}" class="nav-link">Inventory</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('requestlists')}}" class="nav-link">Request List</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('warehousePO')}}" class="nav-link">Purchase Order</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('warehouseInvoice')}}" class="nav-link">Receiving</a>
                    </li>

                </ul>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-store"></i>
                    <p>Vendor Portal</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('recievedrequests')}}" class="nav-link">Requests</a>
                        <a href="{{route('supplierposting')}}" class="nav-link">Posting</a>
                        <a href="{{route('disposal')}}" class="nav-link">Disposal</a>
                        <a href="{{route('bidders')}}" class="nav-link">Bidders</a>
                        <a href="{{route('buyers')}}" class="nav-link">Buyers</a>
                        <a href="{{route('workshop')}}" class="nav-link">Workshops</a>
                        <a href="{{route('supplierlist')}}" class="nav-link">Supplier List</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-building"></i>
                    <p>Asset Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('assets')}}" class="nav-link">Assets List</a>
                        <a href="{{route('newasset')}}" class="nav-link">Add New Asset</a>
                        <a href="{{route('evaluations')}}" class="nav-link">Asset Evaluation</a>
                        <a href="{{route('assetreport')}}" class="nav-link">Reports</a>
                        <a href="{{route('assetmaintenance')}}" class="nav-link">Maintenance Request</a>
                        <a href="{{route('assetinvoice')}}" class="nav-link">Invoices</a>
                        <a href="{{route('assetorders')}}" class="nav-link">Orders</a>
                        <a href="{{route('delivery-request')}}" class="nav-link">Delivery Request</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                    <p>Audit Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('auditsdashboard')}}" class="nav-link">Audit Dashboard</a>
                        <a href="{{route('auditReports')}}" class="nav-link">Audit Reports</a>
                        <a href="{{route('auditRecords')}}" class="nav-link">Audit Records</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Project Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pmrequests')}}" class="nav-link">Requests List</a>
                        <a href="{{route('projects')}}" class="nav-link">List of Project</a>
                        <a href="{{route('newproject')}}" class="nav-link">Creat new project</a>
                        <a href="{{route('proposal')}}" class="nav-link">Project Proposal</a>
                        <a href="{{route('pmreports')}}" class="nav-link">Send Reports</a>
                    </li>
                </ul>
            </li>
           <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-truck"></i>
                    <p>Fleet Management</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        {{-- <a href="{{route('mappers')}}" class="nav-link">Maps</a> --}}
                        <a href="{{route('vehicleinformation')}}" class="nav-link">Vehicle List</a>
                        <a href="#" class="nav-link">Reports</a>
                        <a href="{{route('deliverylist')}}" class="nav-link">Delivery Request</a>
                        <a href="{{route('vehiclerequest')}}" class="nav-link">Vehicle Request</a>
                        <a href="{{route('dispatching')}}" class="nav-link">Dispatching</a>
                    </li>
                </ul>
            </li>
          <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-parking"></i>
                    <p>Vehicle Reservation</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('reserve')}}" class="nav-link">Reservations</a>
                        <a href="{{route('vlists')}}" class="nav-link">Vehicle List</a>
                    </li>
                </ul>
            </li>
           <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-wrench"></i>
                    <p>M.R.O</p>
                    <i class="right fas fa-angle-left"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('repairs')}}" class="nav-link">Repairs</a>
                        <a href="{{route('romlist')}}" class="nav-link">Request List</a>
                        <a href="{{route('rominventory')}}" class="nav-link">Inventory</a>
                    </li>
                </ul>
            </li>
            
         </ul>
    </nav>
</div>