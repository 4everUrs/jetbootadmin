<div>
        <x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Assets List') }}
            </h2>
        </x-slot>
        <div class="card">
            <div class="card-body">
                <button wire:click="exportAsset" class="btn btn-dark btn-sm">EXPORT</button>
                <button wire:click="$toggle('assetAudit')" class="btn btn-secondary btn-sm">SEND AUDIT</button>
                <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
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
                                    <thead class="bg-info ">
                                        <th class="text-center align-middle">No.</th>
                                        <th class="text-center align-middle">Name</th>
                                        <th class="text-center align-middle">Department</th>
                                        <th class="text-center align-middle">Position</th>
                                        <th class="text-center align-middle">Type</th>
                                    </thead>
                                    <tbody class="bg-white">
                                        @forelse ($users as $key => $user)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center align-middle">{{$user->name}}</td>
                                                <td class="text-center align-middle">{{$user->currentTeam->name}}</td>
                                                @if ($user->role_id == '0')
                                                <td class="text-center align-middle">Admin</td>
                                                @elseif ($user->role_id == '1')
                                                <td class="text-center align-middle">Manager</td>
                                                @elseif ($user->role_id == '2')
                                                <td class="text-center align-middle">Staff</td>
                                                @elseif ($user->role_id == '3')
                                                <td class="text-center align-middle">Client</td>
                                                @endif
                                                <td class="text-center align-middle">{{$user->type}}</td>
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
                                        <th class="text-center align-middle">Building Name</th>
                                        <th class="text-center align-middle">Building Location</th>
                                        <th class="text-center align-middle">Building Specs</th>
                                        <th class="text-center align-middle">Status</th>
                                        <th class="text-center align-middle">Action</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($buildings as $building)
                                            <tr>
                                                <td class="text-center align-middle">{{$building->name}}</td>
                                                <td class="text-center align-middle">{{$building->location}}</td>
                                                <td class="text-center align-middle">{{$building->specs}}</td>
                                                <td class="text-center align-middle">{{$building->status}}</td>
                                                <td class="text-center">
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
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Vehicle Type</th>
                                        <th class="text-center align-middle">Vechicle Brand</th>
                                        <th class="text-center align-middle">Vechile Model</th>
                                        <th class="text-center align-middle">Vechicle Plate No</th>
                                        <th class="text-center align-middle">Vechicle Condition</th>
                                        <th class="text-center align-middle">Status</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($vehicles as $key => $vehicle)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center align-middle">{{$vehicle->type}}</td>
                                                <td class="text-center align-middle">{{$vehicle->brand}}</td>
                                                <td class="text-center align-middle">{{$vehicle->model}}</td>
                                                <td class="text-center align-middle">{{$vehicle->plate}}</td>
                                                <td class="text-center align-middle">{{$vehicle->condition}}</td>
                                                <td class="text-center">{{$vehicle->status}}</td>
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
                                        <th class="text-center align-middle">No.</th>
                                        <th class="text-center align-middle">Type</th>
                                        <th class="text-center align-middle">Name</th>
                                        <th class="text-center align-middle" style="width: 20%">Description</th>
                                        <th class="text-center align-middle">Quantity</th>
                                        <th class="text-center align-middle">Purchase Date</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($equipments as $key => $equipment)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center align-middle">{{$equipment->type}}</td>
                                                <td class="text-center align-middle">{{$equipment->name}}</td>
                                                <td class="text-center align-middle">{{$equipment->description}}</td>
                                                <td class="text-center align-middle">{{$equipment->quantity}}</td>
                                                <td class="text-center align-middle">{{Carbon\Carbon::parse($equipment->create_at)->toFormattedDateString()}}</td>
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
                                        <th class="text-center align-middle">Company Name</th>
                                        <th class="text-center align-middle">Company Address</th>
                                        <th class="text-center align-middle">Company Phone</th>
                                        <th class="text-center align-middle">Company Email</th>
                                        <th class="text-center align-middle">Status</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($contractors as $contractor)
                                        <tr>
                                            <td class="text-center align-middle">{{$contractor->name}}</td>
                                            <td class="text-center align-middle">{{$contractor->address}}</td>
                                            <td class="text-center align-middle">{{$contractor->phone}}</td>
                                            <td class="text-center align-middle">{{$contractor->email}}</td>
                                            <td class="text-center">{{$contractor->status}}</td>
                                
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
                                    <th class="text-center align-middle">Company Name</th>
                                    <th class="text-center align-middle">Company Address</th>
                                    <th class="text-center align-middle">Company Phone</th>
                                    <th class="text-center align-middle">Company Email</th>
                                    <th class="text-center align-middle">Status</th>
                                </thead>
                                <tbody>
                                    @forelse ($suppliers as $supplier)
                                    <tr>
                                        <td class="text-center align-middle">{{$supplier->name}}</td>
                                        <td class="text-center align-middle">{{$supplier->address}}</td>
                                        <td class="text-center align-middle">{{$supplier->phone}}</td>
                                        <td class="text-center align-middle">{{$supplier->email}}</td>
                                        <td class="text-center">{{$supplier->status}}</td>
                    
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
        <x-jet-dialog-modal wire:model="assetAudit">
            <x-slot name="title">
                {{__('Disposal Request')}}
            </x-slot>
            <x-slot name="content">
                <div class="form-group">
                    <label for="">Audit File</label>
                    <input wire:model="audit_file" type="file" class="form-control">
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('assetAudit')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        
                <x-jet-button class="ms-2" id="sendAudit" wire:click="sendAudit" wire:loading.attr="disabled">
        
                    {{ __('Send') }}
                </x-jet-button>
        
        
            </x-slot>
        </x-jet-dialog-modal>
</div>
