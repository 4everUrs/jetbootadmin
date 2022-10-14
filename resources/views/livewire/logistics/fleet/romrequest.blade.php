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
            <x-table head="Vehicle Repair Status">
                <thead>
                    <th>No.</th>
                    <th>Plate Number</th>
                    <th>Status</th>
                </thead>
                <tr>
                    <td colspan="7" class="text-center">No Record Found</td>
                </tr>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="autoWork">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
            <label for="name">Request Content</label>
            <textarea wire:model="content" class="form-control" rows="5"></textarea>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('vehicularModal')" wire:loading.attr="disabled">
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
                <select  class="form-control">
                    <option value="">Select category</option>
                    <option value="repair">Repair</option>  
                    <option value="maintenance">Maintenance</option>
                    <option value="overhaul">Overhaul</option>
                </select>
                <div class="d-none" id="building">
                    <label>Building</label>
                    <select class="form-control">
                        <option value="">Select Building</option>
                        @foreach ($buildings as $building)
                            <option value="">{{$building->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-none" id="vehicle">
                    <label>Vehicle</label>
                    <select class="form-control">
                        <option value="">Select Building</option>
                        @foreach ($vehicles as $vehicle)
                            <option value="">{{$vehicle->brand}} {{$vehicle->model}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-none" id="equipment">
                    <label>Equipment</label>
                    <select class="form-control">
                        <option value="">Select Building</option>
                        @foreach ($equipments as $equipment)
                            <option>{{$equipment->name}}</option>
                        @endforeach
                    </select>
                </div>
                <label for="description">Description</label>
                <textarea class="form-control" rows="4"></textarea>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('repairModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="insertRep" wire:loading.attr="disabled">
                {{ __('Submit Request') }}
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
            })
            window.addEventListener('show-equipment', event => {
                var x = document.getElementById('equipment');
                x.classList.remove('d-none');
            })
        </script>
    @endpush
</div>
