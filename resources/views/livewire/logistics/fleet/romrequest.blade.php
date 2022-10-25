<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Repair and Maintenance request') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success btn-sm" wire:click="$toggle('repairModal')">Add new Request</button>
            <button class="btn btn-dark btn-sm" wire:click="$toggle('autoWork')">Add new Autowork Partner</button>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link active" id="vehicles-tab" data-bs-toggle="tab" data-bs-target="#vehicles"
                            type="button" role="tab" aria-controls="vehicles" aria-selected="true">Vehicle</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link" id="buildings-tab" data-bs-toggle="tab" data-bs-target="#buildings"
                            type="button" role="tab" aria-controls="buildings" aria-selected="false">Building</button>
                    </li>
                    <li class="nav-item mr-2" role="presentation">
                        <button class="nav-link" id="equipments-tab" data-bs-toggle="tab" data-bs-target="#equipments"
                            type="button" role="tab" aria-controls="equipments" aria-selected="false">Equipments</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="vehicles" role="tabpanel" aria-labelledby="vehicles-tab">
                        <div class="card">
                            <div class="card-body">
                                <x-table head="Vehicle Maintenance Status">
                                    <thead class="bg-info">
                                        <th class="text-center align-middle">No</th>
                                        <th class="text-center align-middle">Vehicle</th>
                                        <th class="text-center align-middle">Plate No</th>
                                        <th class="text-center align-middle">Workshop</th>
                                        <th class="text-center align-middle">Status</th>
                                    </thead>
                                    <tbody>
                                        @forelse ($repairVehicles as $repair)
                                        <tr>
                                            <td class="text-cente">{{$repair->id}}</td>
                                            <td class="text-center align-middle">{{$repair->name}}</td>
                                            <td class="text-center align-middle">{{$repair->plate}}</td>
                                            <td class="text-center align-middle">{{$repair->workshop}}</td>
                                            <td class="text-center">{{$repair->status}}</td>
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
                               <x-table head="Building Repair">
                                    <thead class="bg-info">
                                        <th></th>
                                    </thead>
                               </x-table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="equipments" role="tabpanel" aria-labelledby="equipments-tab">...</div>
                </div>
            </div>
        </div>
    </div>


    <x-jet-dialog-modal wire:model="autoWork">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
            <label for="location">Location</label>
            <input wire:model="location" type="text" class="form-control">
            <label for="name">Request Content</label>
            <textarea wire:model="content" class="form-control" rows="5"></textarea>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('autoWork')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendRequest" wire:loading.attr="disabled">
                {{ __('Send Request') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="repairModal">
        <x-slot name="title">
            {{ __('Send a Request') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Type</label>
                <select wire:model="type" class="form-control">
                    <option value="">Select type</option>
                    <option value="building">Building</option>
                    <option value="equipment">Equipment</option>
                    <option value="vehicle">Vehicle</option>
                </select>
                <label>Category</label>
                <select wire:model="category" class="form-control">
                    <option value="">Select category</option>
                    <option value="repair">Repair</option>
                    <option value="maintenance">Maintenance</option>
                    <option value="overhaul">Overhaul</option>
                </select>
                <div class="d-none" id="building">
                    <label>Building</label>
                    <select wire:model="buildingName" class="form-control">
                        <option value="">Select Building</option>
                        @foreach ($buildings as $building)
                        <option value="">{{$building->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-none" id="vehicle">
                    <label>Vehicle</label>
                    <select wire:model="vehicleName" class="form-control">
                        <option value="">Select Vehicle</option>
                        @foreach ($vehicles as $vehicle)
                        <option value="{{$vehicle->id}}">{{$vehicle->brand}} {{$vehicle->model}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-none" id="workshop">
                    <label>Workshop</label>
                    <select wire:model="workshopName" class="form-control">
                        <option value="">Select Workshop</option>
                        @foreach ($workshops as $workshop)
                        <option>{{$workshop->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-none" id="equipment">
                    <label>Equipment</label>
                    <select wire:model="equipmentName" class="form-control">
                        <option value="">Select Equipment</option>
                        @foreach ($equipments as $equipment)
                        <option>{{$equipment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="description">Description</label>
                <textarea wire:model="description" class="form-control" rows="4"></textarea>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('repairModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRecord" wire:loading.attr="disabled">
                {{ __('Submit') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
    @push('scripts')
    <script>
        window.addEventListener('show-building', event => {
                    var x = document.getElementById('building');
                    x.classList.remove('d-none');
                })
                window.addEventListener('show-vehicle', event => {
                    var x = document.getElementById('vehicle');
                    x.classList.remove('d-none');
                    var y = document.getElementById('workshop');
                    y.classList.remove('d-none');
                })
                window.addEventListener('show-equipment', event => {
                    var x = document.getElementById('equipment');
                    x.classList.remove('d-none');
                })
    </script>
    @endpush
</div>
