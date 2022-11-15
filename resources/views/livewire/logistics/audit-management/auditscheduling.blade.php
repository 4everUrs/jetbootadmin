<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Scheduling') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-dark btn-sm">Create Schedule</button>
            <x-table head="Schedule Lists">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Department</th>
                    <th class="text-center align-middle">Auditing Officer</th>
                    <th class="text-center align-middle">Auditing Date </th>
                    <th class="text-center align-middle">Status</th>
                </thead>    
            </x-table>
    </div>    
</div>
