<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h2 style="float:left;"><strong>List of Payment </strong></h2>
            <button wire:click="loadPayment" type="create" class="btn btn-success" style="float:right;"> Send Payment</button><br><br>
            <x-table head="">
                <thead class="bg-info">
                    <th class="text-center">No.</th>
                    <th class="text-center">Payroll Name</th>
                    <th class="text-center">Month</th>
                    <th class="text-center">Year</th>
                    <th class="text-center">Start Date</th>
                    <th class="text-center">End Date</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($payments as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->Payroll->name}}</td>
                        <td class="text-center">{{$payroll->Payroll->month}}</td>
                        <td class="text-center">{{$payroll->Payroll->year}}</td>
                        <td class="text-center">{{$payroll->Payroll->start_date}}</td>
                        <td class="text-center">{{$payroll->Payroll->end_date}}</td>
                        <td class="text-center">{{$payroll->status}}</td>
                        <td class="text-center">
                            <button wire:click="viewPayment({{$payroll->id}})" class="btn btn-sm btn-primary">View</button>
                    </td>
                        
                    </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="paymentModal" maxWidth="xl">
        <x-slot name="title">
            {{ __('Payment Record') }}
        </x-slot>

        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-gray">
                            <th class="text-center align-middle">Employee ID</th>
                            <th class="text-center align-middle">Employee Name</th>
                            <th class="text-center align-middle">Bank Name</th>
                            <th class="text-center align-middle">Bank Account</th>
                            <th class="text-center align-middle">Salary</th>
                        </thead>
                        <tbody>
                          @if (!empty($employees))
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="text-center align-middle">{{$employee->LocalEmployee->id}}</td>
                                        <td class="text-center align-middle">{{$employee->LocalEmployee->name}}</td>
                                        <td class="text-center align-middle">{{$employee->LocalEmployee->bank_name}}</td>
                                        <td class="text-center align-middle">{{$employee->LocalEmployee->bank_account}}</td>
                                        <td class="text-center align-middle">{{$employee->net_salary}}</td>
                                        
                                    </tr>
                                  
                                @endforeach()
                                <tr>
                                    <td class="align-middle text-right" colspan="4">Total:</td>
                                        <td class="text-center align-middle">{{$total}}</td>
                                </tr>
                          @endif

                           
                        </tbody>
                    </table>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('paymentModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-button class="ms-2" wire:click="export" wire:loading.attr="disabled">
                {{ __('Export') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="showPayment">
        <x-slot name="title">
            {{ __('Send Payment') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Upload Payment</label>
                <input wire:model="upload" class="form-control" type="file">
                @error('upload') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showPayment')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendPayment" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
