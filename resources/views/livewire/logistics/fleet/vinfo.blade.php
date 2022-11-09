<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle Information') }}
        </h2>
    </x-slot>
    <!-- table start -->
    <div class="card">
        <div class="card-body">
            <x-table head="Vehicle Informartion">
                <thead class="bg-info">
                    <th>Assigned Driver</th>
                    <th>Vehicle Type</th>
                    <th>Vechicle Brand</th>
                    <th>Vechile Model</th>
                    <th>Vechicle Plate No.</th>
                    <th>Status.</th>
                    <th>Action.</th>
                </thead>
                <tbody>
                    @forelse ($vehicles as $vehicle)
                    <tr>
                        <td>{{$vehicle->driver_name}}</td>
                        <td>{{$vehicle->type}}</td>
                        <td>{{$vehicle->brand}}</td>
                        <td>{{$vehicle->model}}</td>
                        <td>{{$vehicle->plate}}</td>
                        <td>{{$vehicle->status}}</td>
                        <td>
                            <button wire:click="loadModal({{$vehicle->id}})" class="btn btn-success btn-sm">Assign
                                Driver</button>
                            <button wire:click="repairModal({{$vehicle->id}})" class="btn btn-danger btn-sm">Repair</button> 
                        </td>
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
    <x-jet-dialog-modal wire:model="repair">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
            <label>Category</label>
            <select wire:model="category" class="form-control">
                <option value="">Select category</option>
                <option value="repair">Repair</option>
                <option value="maintenance">Maintenance</option>
                <option value="overhaul">Overhaul</option>
            </select>
            <label>Description</label>
            <textarea wire:model="description" class="form-control" rows="3"></textarea>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('repair')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendRepair" wire:loading.attr="disabled">
                {{ __('Save Info') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="modalRepair">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
            <label>Driver Name</label>
            <input wire:model="driver_name" type="text" class="form-control">
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalRepair')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveInfo" wire:loading.attr="disabled">
                {{ __('Save Info') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
</div>


