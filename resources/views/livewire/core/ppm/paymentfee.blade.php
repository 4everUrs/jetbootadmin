<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Payroll</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-1">
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="">YEAR</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="">MONTH</option>
                                    <option value="january">JANUARY</option>
                                    <option value="february">FEBRUARY</option>
                                    <option value="march">MARCH</option>
                                    <option value="april">APRIL</option>
                                    <option value="may">MAY</option>
                                    <option value="june">JUNE</option>
                                    <option value="july">JULY</option>
                                    <option value="august">AUGUST</option>
                                    <option value="september">SEPTEMBER</option>
                                    <option value="october">OCTOBER</option>
                                    <option value="november">NOVEMBER</option>
                                    <option value="december">DECEMBER</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-4">
                                    <select class="form-control">
                                        <option value="">15th</option>
                                        <option value="">30th</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <button wire:click="$toggle('newPayroll')" class="btn btn-dark">+ Start New Payroll</button>
                               </div>
                               <div class="col">
                                    <button wire:click="$toggle('showPayroll')" class="btn btn-primary">+Add Record</button>
                               </div>
                            </div>
                           
                            
                        </div>
                        <div class="col-3">
                           
                        </div>
                    </div>
                    <x-table head="List of Payroll">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">Daily Attendance</th>
                            <th class="text-center">Minimum Wage</th>
                            <th class="text-center">Gross Salary</th>
                            <th class="text-center">SSS</th>
                            <th class="text-center">Philhealth</th>
                            <th class="text-center">Pagibig</th>
                            <th class="text-center">Net Salary</th>
                        </thead>
                        <tbody>
                            @forelse ($payslip as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->id}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->name}}</td>
                                <td class="text-center">{{$payroll->attendance}}</td>
                                <td class="text-center">@money($payroll->LocalEmployee->CreateJob->daily_salary)</td>
                                <td class="text-center">@money($payroll->gross_salary)</td>

                                <td class="text-center">@money($payroll->sss)</td>
                                <td class="text-center">@money($payroll->philhealth)</td>
                                <td class="text-center">@money($payroll->pagibig)</td>
                                <td class="text-center">@money($payroll->net_salary)</td>
                                
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
        </div>
    </div>
    
    <x-jet-dialog-modal wire:model="showPayroll">
        <x-slot name="title">
            {{ __('Create Payroll') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label>Employee Name</label>
                        <select wire:model="employee_id"class="form-control" type="text">
                            <option value="">Select Employee</option>
                            @foreach ($employees as $employee)
                            <option value="{{$employee->id}}">{{$employee->name}}</option>
                            @endforeach
                        </select>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="col">
                        <label>Employee ID</label>
                        <input wire:model="searchID" type="text" class="form-control">
                    </div>
                </div>
                <label>Payroll</label>
                <select wire:model="payroll_id" class="form-control">
                    <option value="">Select Payroll</option>
                    @foreach($payrolls as $payroll)
                        <option value="{{$payroll->id}}">{{$payroll->name}}</option>
                    @endforeach
                </select>
                <label>Daily Attendance</label>
                <input wire:model="attendance"class="form-control" type="number">
                @error('attendance') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label>Contribution</label>
                <div class="form-check">
                    <input wire:model="sss" class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                       SSS
                    </label>
                </div>
                <div class="form-check">
                    <input wire:model="philhealth" class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Philhealth
                    </label>
                </div>
                <div class="form-check">
                    <input wire:model="pagibig" class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Pag-Ibig
                    </label>
                </div>
             
            
                
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

    <x-jet-dialog-modal wire:model="newPayroll">
        <x-slot name="title">
            {{ __('Create new Payroll') }}
            
        </x-slot>
        <x-slot name="content">
           <div class="form-group">
                <label>Payroll Name</label>
                <input wire:model="payroll_name" type="text" class="form-control">
                <label>Payroll Term</label>
                <select wire:model="salary_term" class="form-control">
                    <option value="">Select Term</option>
                    <option value="15th">15th</option>
                    <option value="30th">30th</option>
                </select>
                <div class="row">
                    <div class="col">
                        <label>Start Date</label>
                        <input wire:model="start" type="date" class="form-control">
                    </div>
                    <div class="col">
                        <label>End Date</label>
                        <input wire:model="end" type="date" class="form-control">
                    </div>
                </div>
           </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('newPayroll')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="createPayroll" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
