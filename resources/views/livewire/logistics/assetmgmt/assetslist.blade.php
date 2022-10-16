<div>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Assets List') }}
            </h2>
        </x-slot>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link active" id="workforce-tab" data-toggle="tab" data-target="#workforce" type="button" role="tab"
                            aria-controls="workforce" aria-selected="true">Work Force</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation ">
                        <button class="nav-link" id="buildings-tab" data-toggle="tab" data-target="#buildings" type="button" role="tab"
                            aria-controls="buildings" aria-selected="false">Buildings</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link" id="vehicle-tab" data-toggle="tab" data-target="#vehicle" type="button" role="tab"
                            aria-controls="vehicle" aria-selected="false">Vechicle</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link" id="equipments-tab" data-toggle="tab" data-target="#equipments" type="button" role="tab"
                            aria-controls="equipments" aria-selected="false">Equipments</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link" id="contractor-tab" data-toggle="tab" data-target="#contractor" type="button" role="tab"
                            aria-controls="contractor" aria-selected="false">Contractor</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="supplier-tab" data-toggle="tab" data-target="#supplier" type="button" role="tab"
                            aria-controls="supplier" aria-selected="false">Supplier</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="workforce" role="tabpanel" aria-labelledby="workforce-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Employee" class="rounded">
                                    <thead class="bg-info">
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Department</th>
                                        <th>Position</th>
                                        <th>Type</th>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->currentTeam->name}}</td>
                                                @if ($user->role_id == '0')
                                                <td>Admin</td>
                                                @elseif ($user->role_id == '1')
                                                <td>Manager</td>
                                                @elseif ($user->role_id == '2')
                                                <td>Staff</td>
                                                @elseif ($user->role_id == '3')
                                                <td>Client</td>
                                                @endif
                                                <td>{{$user->type}}</td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="buildings" role="tabpanel" aria-labelledby="buildings-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Buildings">
                                    <thead class="bg-info">
                                        <th>Building Name</th>
                                        <th>Building Location</th>
                                        <th>Building Specs</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($buildings as $building)
                                            <tr>
                                                <td>{{$building->name}}</td>
                                                <td>{{$building->location}}</td>
                                                <td>{{$building->specs}}</td>
                                                <td>{{$building->status}}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm">Details</button>
                                                </td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="vehicle" role="tabpanel" aria-labelledby="vehicle-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Vehicle">
                                    <thead class="bg-info">
                                        <th>No</th>
                                        <th>Vehicle Type</th>
                                        <th>Vechicle Brand</th>
                                        <th>Vechile Model</th>
                                        <th>Vechicle Plate No.</th>
                                        <th>Vechicle Condition.</th>
                                        <th>Status.</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($vehicles as $vehicle)
                                            <tr>
                                                <td>{{$vehicle->id}}</td>
                                                <td>{{$vehicle->type}}</td>
                                                <td>{{$vehicle->brand}}</td>
                                                <td>{{$vehicle->model}}</td>
                                                <td>{{$vehicle->plate}}</td>
                                                <td>{{$vehicle->condition}}</td>
                                                <td>{{$vehicle->status}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No Record Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="equipments" role="tabpanel" aria-labelledby="equipments-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Equipments">
                                    <thead class="bg-info">
                                        <th>No.</th>
                                        <th>Type.</th>
                                        <th>Name.</th>
                                        <th style="width: 20%">Description.</th>
                                        <th>Quantity.</th>
                                        <th>Purchase Date.</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($equipments as $equipment)
                                            <tr>
                                                <td>{{$equipment->id}}</td>
                                                <td>{{$equipment->type}}</td>
                                                <td>{{$equipment->name}}</td>
                                                <td>{{$equipment->description}}</td>
                                                <td>{{$equipment->quantity}}</td>
                                                <td>{{Carbon\Carbon::parse($equipment->create_at)->toFormattedDateString()}}</td>
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    </tbody>
                                </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contractor" role="tabpanel" aria-labelledby="contractor-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Suppliers Lists">
                                    <thead class="bg-info">
                                        <th>Company Name</th>
                                        <th>Company Address</th>
                                        <th>Company Phone</th>
                                        <th>Company Email</th>
                                        <th>Status</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($contractors as $contractor)
                                        <tr>
                                            <td>{{$contractor->name}}</td>
                                            <td>{{$contractor->address}}</td>
                                            <td>{{$contractor->phone}}</td>
                                            <td>{{$contractor->email}}</td>
                                            <td>{{$contractor->status}}</td>
                                
                                        </tr>
                                        @empty
                                
                                        @endforelse
                                    </tbody>
                                </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
                       <div class="card">
                        <div class="card-body">
                            <x-table head="Suppliers Lists">
                                <thead class="bg-info">
                                    <th>Company Name</th>
                                    <th>Company Address</th>
                                    <th>Company Phone</th>
                                    <th>Company Email</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td>{{$supplier->name}}</td>
                                        <td>{{$supplier->address}}</td>
                                        <td>{{$supplier->phone}}</td>
                                        <td>{{$supplier->email}}</td>
                                        <td>{{$supplier->status}}</td>
                    
                                    </tr>
                                    @empty
                    
                                    @endforelse
                                </tbody>
                            </x-table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
</div>
