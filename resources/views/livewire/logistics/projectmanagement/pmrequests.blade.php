<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Requets List">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Origin</th>
                    <th class="text-center align-middle">Requestor</th>
                    <th class="text-center align-middle">Date</th>
                    <th class="text-center align-middle">Content</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
            </x-table>
        </div>
    </div>
</div>
