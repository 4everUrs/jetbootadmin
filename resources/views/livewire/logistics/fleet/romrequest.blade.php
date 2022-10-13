<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Repair and Maintenance request') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
        <button class="btn btn-success" wire:click="repairModal">Add new Request</button>
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
</div>
    <x-jet-dialog-modal wire:model="repairModal">
        <x-slot name="title">
            {{ __('Send a Request') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Type</label>
                <select wire:model="test" class="form-control">
                    <option>Select type</option>
                    <option>Repair</option>
                    <option>Maintenance</option>
                    <option>Overhaul</option>
</select>
                    <label>Plate Number</label>
                    <input class="form-control" type="text" placeholder="Enter Plate Number">
                    <label>Vehicle Brand</label>
                    <input class="form-control" type="text" placeholder="Enter Vehicle Brand">
                    <label>Vehicle Model</label>
                    <input class="form-control" type="text" placeholder="Enter Vehicle Model">
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
    </div>
    </div>