<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadInternPayroll" type="create" class="btn btn-success" style="float:right"> International Payroll</button>
            <br><br>
            <x-table head="List of International Payroll">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Daily Attendance</th>
                    <th>Minimum Wage</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
                    <th>Collection</th>
                    <th>Total Salary</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->name}}</td>
                        <td class="text-center">{{$payroll->attendance}}</td>
                        <td class="text-center">{{$payroll->salary}}</td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
                        <td class="text-center">{{$payroll->collection}}</td>
                        <td></td>
                        <td class="text-center">
                            <button wire:click="request" class="btn btn-sm btn-primary">Request</button>
                        </td>
                        
                    </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showInternPayroll">
        <x-slot name="title">
            {{ __('Create International Payroll') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Employee Name</label>
                <input wire:model="name"class="form-control" type="text">
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Daily Attendance</label>
                <input wire:model="attendance"class="form-control" type="text">
                @error('attendance') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Minimum Wage</label>
                <input wire:model="salary"class="form-control" type="number">
                @error('salary') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Contribution</label>
                <input wire:model="contribution"class="form-control" type="number">
                @error('contribution') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Placement Fee</label>
                <input wire:model="placement"class="form-control" type="number">
                @error('placement') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Collection</label>
                <input wire:model="collection"class="form-control" type="number">
                @error('collection') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showInternPayroll')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <br><br><br>
    
    <div class="card">
        <div class="card-body">
            <x-table head="List of International Payment">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Daily Attendance</th>
                    <th>Minimum Wage</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
                    <th>Collection</th>
                    <th>Status</th>
                    <th>Total Salary</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->name}}</td>
                        <td class="text-center">{{$payroll->attendance}}</td>
                        <td class="text-center">{{$payroll->salary}}</td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
                        <td class="text-center">{{$payroll->collection}}</td>
                        <td></td>
                        <td></td>
                        <td class="text-center">
                                <button wire:click="payout" class="btn btn-sm btn-primary">Payout</button>
                        </td>
                        
                    </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <br><br><br>
    <div class="card">
        <div class="card-body">
            <x-table head="International Collection">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
                    <th>Collection</th>
                    <th>Status</th>
                    <th>Total Collection</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->name}}</td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
                        <td class="text-center">{{$payroll->collection}}</td>
                        <td class="text-center">{{$payroll->status}}</td>
                        <td></td>
                        <td class="text-center">
                            <button wire:click="disbursement" class="btn btn-sm btn-primary">Trans. Collection</button>
                        </td>
                        
                    </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>
