<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Employee') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
          
            <x-table head="">
                <tr class="bg-info alig-middle">
                    <th class="text-center">No.</th>
                    <th class="text-center">Employee Name</th>
                    <th class="text-center">Contact No.</th>
                    <th class="text-center">Email.</th>
                    {{--<th class="text-center">Daily Salary.</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Company Location</th>--}}
                    <th class="text-center">SSS No.</th>
                    <th class="text-center">Philhealth No.</th>
                    <th class="text-center">Pag-Ibig No.</th>
                    <th class="text-center">Payout Method</th>
                    <th class="text-center">Bank Name.</th>
                    <th class="text-center">Bank Account.</th>
                    <th class="text-center">Action</th>
                </tr>
                <tbody>
                    @forelse ($onboards as $onboard)
                          <tr>
                            <td class="text-center">{{$onboard->id}}</td>
                            <td class="text-center">{{$onboard->name}}</td>
                            <td class="text-center">{{$onboard->phone}}</td>
                            <td class="text-center">{{$onboard->email}}</td>
                            {{--<td class="text-center">@money($onboard->CreateJob->daily_salary)</td>
                            <td class="text-center">{{$onboard->CreateJob->position}}</td>
                            <td class="text-center">{{$onboard->CreateJob->name}}</td>
                            <td class="text-center">{{$onboard->CreateJob->location}}</td>--}}
                            <td class="text-center">{{$onboard->sss}}</td>
                            <td class="text-center">{{$onboard->philhealth}}</td>
                            <td class="text-center">{{$onboard->pagibig}}</td>
                            <td class="text-center">{{$onboard->method}}</td>
                            <td class="text-center">{{$onboard->bank_name}}</td>
                            <td class="text-center">{{$onboard->bank_account}}</td>
     
                            <td class="text-center">
                                <button wire:click="employee({{$onboard->id}})" class="btn btn-sm btn-primary"><i class='fa fa-edit'></i> Edit</button>
                            </td>
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

    <x-jet-dialog-modal wire:model="Employee">
        <x-slot name="title">
            {{ __('Create Payroll') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                
                <label for="">Payout Method</label>
                <select wire:model="method"class="form-control" type="text">
                    <option value="">Select Method</option>
                    <option value="cash">Cash</option>
                    <option value="bank">Bank</option>
                </select>
                   @error('method') <span class="text-danger">{{$message}}</span> @enderror
                <div class="d-none" id="payout">
                    <br>
                    <label for="">Bank Name.</label>
                    <input wire:model="bank_name"class="form-control" type="text">
                    @error('bank_name') <span class="text-danger">{{$message}}</span> @enderror
                    <label for="">Bank Account.</label>
                    <input wire:model="bank_account"class="form-control" type="number">
                    @error('bank_account') <span class="text-danger">{{$message}}</span> @enderror
                </div>
             
                <br>
                <label for="">SSS No.</label>
                <input wire:model="sss_no"class="form-control" type="number">
                @error('sss_no') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Philhealth No.</label>
                <input wire:model="philhealth_no"class="form-control" type="number">
                @error('philhealth_no') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Pag-Ibig No.</label>
                <input wire:model="pagibig_no"class="form-control" type="number">
                @error('pagibig_no') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('Employee')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveEmployee" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')
        <script>
            window.addEventListener('show-bank', event => {
                var x = document.getElementById('payout');
                x.classList.remove('d-none');
            })
        </script>
    @endpush
</div>
