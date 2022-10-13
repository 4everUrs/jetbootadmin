<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle Reservation') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success" wire:click="#">Create Reservation</button>
                <x-table head="Vehicle Reservation List">
                <thead>
                    <th>No.</th>
                    <th>Plate Number.</th>
                    <th>Status</th>
                </thead>
                </x-table>
        </div>
    </div>

</div>
</div>