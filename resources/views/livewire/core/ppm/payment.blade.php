<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="List of Payment">
                <thead class="bg-info">
                    <th class="text-center">No.</th>
                    <th class="text-center">Employee Name</th>
                    <th class="text-center">Daily Attendance</th>
                    <th class="text-center">Minimum Wage</th>
                    <th class="text-center">Contribution</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Total Salary</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    {{-- @forelse ($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->name}}</td>
                        <td class="text-center">{{$payroll->attendance}}</td>
                        <td class="text-center">{{$payroll->salary}}</td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                            <button wire:click="payout" class="btn btn-sm btn-primary">Payout</button>
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
