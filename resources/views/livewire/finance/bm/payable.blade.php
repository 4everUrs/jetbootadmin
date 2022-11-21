<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Payable') }}
        </h2>
    </x-slot>
    
    <div class="card">
        <div class="card-body">
            <a class="btn btn-secondary btn-sm">Add Expenses</a>
                
            <x-table head="">
                <thead class="bg-secondary table-sm">
                    <th>Date</th>
                    <th>Requestor</th>
                    <th>Description</th>    
                    <th>Payment Type</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </thead>
                
           </x-table>




</div>
