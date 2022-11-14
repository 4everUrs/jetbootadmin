<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Contribution') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link active mr-2" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">SSS</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link mr-2" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">PhilHealth</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Pagibig</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <button wire:click="loadSSS" type="create" class="btn btn-success"> VIEW</button>
                    <x-table head="">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">SSS No.</th>
                            <th class="text-center">SSS Payment</th>
                        </thead>
                        <tbody>
                            @forelse ($payrolls as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->LocalEmployee->id}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->name}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->sss}}</td>
                                <td class="text-center">@money($payroll->sss)</td>
                                
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                    <x-jet-dialog-modal wire:model="showSSS" maxWidth="xl">
                        <x-slot name="title">
                            {{ __('Export SSS') }}
                            
                        </x-slot>
                        <x-slot name="content">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead class="bg-gray">
                                            <th class="text-center align-middle">Employee ID</th>
                                            <th class="text-center align-middle">Employee Name</th>
                                            <th class="text-center align-middle">SSS No.</th>
                                            <th class="text-center align-middle">SSS Payment</th>
                                        </thead>
                                        <tbody>
                                          @if (!empty($payrolls))
                                                @foreach ($payrolls as $payroll)
                                                    <tr>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->id}}</td>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->name}}</td>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->sss}}</td>
                                                        <td class="text-center align-middle">@money($payroll->sss)</td>
                                                        
                                                    </tr>
                                                  
                                                @endforeach()
                                                <tr>
                                                    <td class="align-middle text-right" colspan="3">Total:</td>
                                                        <td class="text-center align-middle">@money($total)</td>
                                                </tr>
                                          @endif
                
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('showSSS')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                                {{ __('Cancel') }}
                            </x-jet-secondary-button>
                    
                            <x-jet-button class="ms-2" wire:click="exportSSS" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                                {{ __('Export') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                </div>
            </div>
        </div>
        <div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <button wire:click="loadPhilhealth" type="create" class="btn btn-success"> VIEW</button>
                    <x-table head="">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">PhilHealth No.</th>
                            <th class="text-center">PhilHealth Payment</th>
                        </thead>
                        <tbody>
                            @forelse ($payrolls as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->LocalEmployee->id}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->name}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->philhealth}}</td>
                                <td class="text-center">@money($payroll->philhealth)</td>
                                
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                    <x-jet-dialog-modal wire:model="showPhilhealth" maxWidth="xl">
                        <x-slot name="title">
                            {{ __('Export Philhealth') }}
                            
                        </x-slot>
                        <x-slot name="content">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead class="bg-gray">
                                            <th class="text-center align-middle">Employee ID</th>
                                            <th class="text-center align-middle">Employee Name</th>
                                            <th class="text-center align-middle">Philhealth No.</th>
                                            <th class="text-center align-middle">Philhealth Payment</th>
                                        </thead>
                                        <tbody>
                                          @if (!empty($payrolls))
                                                @foreach ($payrolls as $payroll)
                                                    <tr>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->id}}</td>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->name}}</td>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->philhealth}}</td>
                                                        <td class="text-center align-middle">@money($payroll->philhealth)</td>
                                                        
                                                    </tr>
                                                  
                                                @endforeach()
                                                <tr>
                                                    <td class="align-middle text-right" colspan="3">Total:</td>
                                                        <td class="text-center align-middle">@money($total)</td>
                                                </tr>
                                          @endif
                
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('showPhilhealth')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                                {{ __('Cancel') }}
                            </x-jet-secondary-button>
                    
                            <x-jet-button class="ms-2" wire:click="exportPhilhealth" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                                {{ __('Export') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                </div>
            </div>
        </div>
        <div wire:ignore.self class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="card">
                <div class="card-body">
                    <button wire:click="loadPagibig" type="create" class="btn btn-success"> VIEW</button>
                    <x-table head="">
                        <thead class="bg-info">
                            <th class="text-center">No.</th>
                            <th class="text-center">Employee Name</th>
                            <th class="text-center">Pagibig No.</th>
                            <th class="text-center">Pagibig Payment</th>
                        </thead>
                        <tbody>
                            @forelse ($payrolls as $payroll)
                            <tr>
                                <td class="text-center">{{$payroll->LocalEmployee->id}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->name}}</td>
                                <td class="text-center">{{$payroll->LocalEmployee->pagibig}}</td>
                                <td class="text-center">@money($payroll->pagibig)</td>
                               
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                    <x-jet-dialog-modal wire:model="showPagibig" maxWidth="xl">
                        <x-slot name="title">
                            {{ __('Export Pagibig') }}
                            
                        </x-slot>
                        <x-slot name="content">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead class="bg-gray">
                                            <th class="text-center align-middle">Employee ID</th>
                                            <th class="text-center align-middle">Employee Name</th>
                                            <th class="text-center align-middle">Pagibig No.</th>
                                            <th class="text-center align-middle">Pagibig Payment</th>
                                        </thead>
                                        <tbody>
                                          @if (!empty($payrolls))
                                                @foreach ($payrolls as $payroll)
                                                    <tr>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->id}}</td>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->name}}</td>
                                                        <td class="text-center align-middle">{{$payroll->LocalEmployee->pagibig}}</td>
                                                        <td class="text-center align-middle">@money($payroll->pagibig)</td>
                                                        
                                                    </tr>
                                                  
                                                @endforeach()
                                                <tr>
                                                    <td class="align-middle text-right" colspan="3">Total:</td>
                                                        <td class="text-center align-middle">@money($total)</td>
                                                </tr>
                                          @endif
                
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <x-jet-secondary-button wire:click="$toggle('showPagibig')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                                {{ __('Cancel') }}
                            </x-jet-secondary-button>
                    
                            <x-jet-button class="ms-2" wire:click="exportPagibig" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                                {{ __('Export') }}
                            </x-jet-button>
                        </x-slot>
                    </x-jet-dialog-modal>
                </div>
            </div>
        </div>
      </div>
    
</div>
