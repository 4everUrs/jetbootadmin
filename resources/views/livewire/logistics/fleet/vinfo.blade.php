<div>
        <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle Information') }}
        </h2>
        </x-slot>
<!-- table start -->
    <div class="card">
    <div class="card-body">
        <button class="btn btn-success" wire:click="vehicularModal">Create New Info</button>
                <x-table head="Vehicle Information">
                <thead>
                    <th>No.</th>
                    <th>Plate Number.</th>
                    <th>Vehicle Model.</th>
                    <th>Driver Name.</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse($Vehicleinforms as $Vehicleinforms)
                        <tr>
                            <td>{{$Vehicleinforms->id}}</td>
                            <td>{{$Vehicleinforms->origin}}</td>
                            <td>{{$Vehicleinforms->content}}</td>
                            <td>{{$Vehicleinforms->status}}</td>
                            <td class="text-center">
                                <button wire:click="approve({{$Vehicleinform->id}})"  class="btn btn-primary">Approve</button>
                            </td>
                        </tr>                        
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
                 </x-table>
    </div>
    </div>
    </div>
    <x-jet-dialog-modal wire:model="vehicleModal">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
        <x-slot name="content">
        <label>Plate Number</label>
        <input class="form-control" type="text" placeholder="Enter Plate Number">
        <label>Vehicle Brand</label>
        <input class="form-control" type="text" placeholder="Enter Vehicle Brand">
        <label>Vehicle Model</label>
        <input class="form-control" type="text" placeholder="Enter Vehicle Model">
        <label>Driver Name</label>
        <input class="form-control" type="text" placeholder="Enter Driver Name">

        
                    
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('vehicularModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" wire:click="saveInfo" wire:loading.attr="disabled">
                {{ __('Save Info') }}
            </x-jet-button>
        </x-slot>
        
    </x-jet-dialog-modal>
    </div>