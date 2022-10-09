<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Projects List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-dark btn-sm">+ Create new project</button>
            <button class="btn btn-success btn-sm">+ Create budget proposal</button>
            <x-table head="Projects">
                <thead>
                    <th>No</th>
                    <th>Project Title</th>
                    <th>Contractor</th>
                    <th>Start Date</th>
                    <th>Target Completion Date</th>
                    <th>Action</th>
                </thead>
            </x-table>
        </div>
    </div>
</div>
