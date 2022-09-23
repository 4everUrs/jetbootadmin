<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('List of Job Vacancy') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead>
                <th>No.</th>
                <th>Name</th>
                <th>Job Details</th>
                <th>Action</th>

               
            </thead>
           </x-table>
        </div>
    </div>
</div>
