<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Payroll') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadPayroll" class="btn btn-success"><i class='fa fa-edit'></i> Add Payroll</button>
            <a class="btn btn-success"href="{{route('print')}}">Export</a>
            <x-table head="">
                <thead class = "bg-info">
                    <th>Name</th>
                    <th>Company</th>
                    <th>Position</th>
                    <th>Datein</th>
                    <th>Dateout</th>
                    <th>Basic Pay</th>
                    <th>Total Hours</th>
                    <th>Overtime</th>
                    <th>Late Deduction</th>
                    <th>SSS</th>
                    <th>PAG-IBIG</th>
                    <th>PHIL HEALTH</th>
                    <th>Salary</th>
                </thead>
                <tbody>
                    @forelse ($pays as $pay)
                          <tr>  
                            <td>{{$pay->name}}</td>
                            <td>{{$pay->company}}</td>
                            <td>{{$pay->position}}</td>
                            <td>{{$pay->datein}}</td>
                            <td>{{$pay->dateout}}</td>
                            <td>{{$pay->payhour}}</td>
                            <td>{{$pay->totalhours}}</td>
                            <td>{{$pay->overtime}}</td>
                            <td>{{$pay->latededuction}}</td>
                            <td>{{$pay->sss}}</td>
                            <td>{{$pay->pagibig}}</td>
                            <td>{{$pay->phil}}</td>
                            <td>{{$pay->salary}}</td>
                          </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center">No Record Found</td>
                            </tr>
                        @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="aggreement" maxWidth="lg">
        <x-slot name="title"><h2><strong>
            {{ __('Payroll') }}</strong></h2>
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Full Name</label>
                <input wire:model="name"class="form-control" type="text">
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Company Name</label>
                <input wire:model="company"class="form-control" type="text">
                @error('company') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Position</label>
                <input wire:model="position"class="form-control" type="text">
                @error('position') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Payroll Date Start</label>
                <input type = "date" wire:model="datein"class="form-control" type="text">
                @error('datein') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Payroll Date End</label>
                <input type = "date" wire:model="dateout"class="form-control" type="text">
                @error('dateout') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Basic Pay</label>
                <input wire:model="payhour"class="form-control" type="text">
                @error('payhour') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Total Hours</label>
                <input wire:model="totalhours"class="form-control" type="text">
                @error('totalhours') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Over Time</label>
                <input wire:model="overtime"class="form-control" type="text">
                @error('overtime') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Late Deduction</label>
                <input wire:model="latededuction"class="form-control" type="text">
                @error('latededuction') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Social Security System</label>
                <input wire:model="sss"class="form-control" type="text">
                @error('sss') <span class="text-danger">{{$message}}</span> @enderror
                <label for="">Pag - Ibig</label>
                <input wire:model="pagibig"class="form-control" type="text">
                @error('pagibig') <span class="text-danger">{{$message}}</span> @enderror
                <label for="">Phil Health</label>
                <input wire:model="phil"class="form-control" type="text">
                @error('phil') <span class="text-danger">{{$message}}</span> @enderror
                
                <br>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('aggreement')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="paySave" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="printModal" maxWidth="lg">
        <x-slot name="title">
            Print Payroll
        </x-slot>
        <x-slot name="content">
            <x-jet-button class="ms-2" wire:click="download" wire:loading.attr="disabled"><i class='fa fa-download'></i>
                {{ __('Print') }}
            </x-jet-button>
            <x-jet-secondary-button wire:click="$toggle('printModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
        <x-slot name="footer">
        </x-slot>
    </x-jet-dialog-modal>
</div>
