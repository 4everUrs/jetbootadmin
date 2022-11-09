<div>
   <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Budget Proposal') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-dark btn-sm">Create Budget Proposal</button>
           <x-table head="Budget Proposals">
                <thead class="bg-info">
                    <th>No.</th>
                    <th>Proposal Name.</th>
                    <th>Description</th>
                    <th>Requestor.</th>
                    <th>Proposed Amount.</th>
                    <th>Approved Amount.</th>
                    <th>Status.</th>
                    <th>Remarks.</th>
                    <th>Action.</th>
                </thead>
                <tbody>
                   <tr>
                        <td colspan="9" class="text-center">No Record Found</td>
                    </tr>
                </tbody>
           </x-table>
        </div>
    </div>
</div>
