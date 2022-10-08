<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <button wire:click="loadPayroll" type="create" class="btn btn-success"> Payroll</button>
    <br>
    <x-jet-dialog-modal wire:model="showPayroll">
        <x-slot name="title">
            {{ __('Create Payroll') }}
            
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
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showPayroll')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <div class="card">
        <div class="card-body">
            <x-table head="List of Payroll">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Daily Attendance</th>
                    <th>Minimum Wage</th>
                    <th>Contribution</th>
                    <th>Placement Fee</th>
                    <th>Total Salary</th>
                </thead>
                <tbody>
                    
                </tbody>
            </x-table>
        </div>
    </div>
    <br><br><br>
    
    <div class="card">
        <div class="card-body">
            <x-table head="List of Payment">
                <thead>
                    <th>No.</th>
                    <th>Employee Name</th>
                    <th>Daily Attendance</th>
                    <th>Minimum Wage</th>
                    <th>Placement Fee</th>
                    <th>Total Salary</th>
                </thead>
            </x-table>
        </div>
    </div>
</div>
