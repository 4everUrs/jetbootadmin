<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Budget Proposal">
                <thead class="bg-info">
                    <th class="text-center">No.</th>
                    <th class="text-center">Proposed Name</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Requestor</th>
                    <th class="text-center">Proposed Amount</th>
                    <th class="text-center">Approved Amount</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Remarks</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    {{-- @forelse ($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->name}}</td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
                        <td class="text-center">{{$payroll->status}}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <button wire:click="disbursement" class="btn btn-sm btn-primary">Trans. Collection</button>
                        </td>
                        
                    </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse --}}
                </tbody>
            </x-table>
        </div>
    </div>
</div>
