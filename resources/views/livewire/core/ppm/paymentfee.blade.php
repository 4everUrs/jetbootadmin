<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadPayroll" type="create" class="btn btn-success" style="float:right"> Payroll</button>
            <br><br>
            <x-table head="List of Payroll">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Daily Attendance</th>
                    <th>Minimum Wage</th>
                    <th>Total</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
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
                        <td></td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
                        <td></td>
                        <td class="text-center">
                            <button wire:click="edit({{$payroll->id}})" class="btn btn-sm btn-info">Edit</button>
                            <button wire:click="request" class="btn btn-sm btn-primary">Request</button>
                        </td>
                        
                    </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showPayroll">
        <x-slot name="title">
            {{ __('Create Payroll') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                
                <label for="">Employee Name</label>
                <select wire:model="name"class="form-control" type="text">
                    <option value="">Select Name</option>
                    @foreach ($payrolls as$index=> $payroll)
                    <option value="{{$index+1}}">{{$payroll->name}}</option>
                    @endforeach
                </select>
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Daily Attendance</label>
                <input wire:model="attendance"class="form-control" type="number">
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
            
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showPayroll')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="savePayroll" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <br><br><br>
    
    <div class="card">
        <div class="card-body">
            <x-table head="List of Payment">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Daily Attendance</th>
                    <th>Minimum Wage</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
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
            <x-table head="Collection">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
                    <th>Status</th>
                    <th>Total Collection</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($payrolls as $payroll)
                    <tr>
                        <td class="text-center">{{$payroll->id}}</td>
                        <td class="text-center">{{$payroll->name}}</td>
                        <td class="text-center">{{$payroll->contribution}}</td>
                        <td class="text-center">{{$payroll->placement}}</td>
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
