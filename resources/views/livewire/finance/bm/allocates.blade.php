<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Allocating Budget') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Annual Budget</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Logistics</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Finance</button>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <a wire:click="loadAnnualBudget" class="btn btn-info btn-sm">Add Annual Budget</a>
                            <x-table head="Annual Budget" class="text-center">
            
                                <thead>
                                    <th>Year</th>
                                    <th>Budget</th>
                                    <th>Logistics 20 %</th>
                                    <th>Core 30%</th>
                                    <th>HR 30%</th>
                                    <th>Finance20%</th>
                                </thead>
                                <tbody>
                                    @forelse($bannuals as $bannual)
                                    <tr>
                                        <td>{{$bannual->year}}</td>
                                        <td>@money($bannual->budgetannual)</td>
                                        <td>@money($bannual->blogistics)</td>
                                        <td>@money($bannual->bcore)</td>
                                        <td>@money($bannual->bhr)</td>
                                        <td>@money($bannual->bfinance)</td>
                                    </tr>
                                    @empty
                                <tr>
                                    <td class="text-center" colspan="6">Unlisted Records</td>
                                </tr>
                                    @endforelse
                            </tbody>
                            </x-table>
            
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
      {{--table of LOGISTICS--}}
        
        <div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <a wire:click="loadLogisticBudget" class="btn btn-info btn-sm">Add Annual Budget</a>
                            <x-table head="Logistics">
                                <thead>
                                    <th>Year</th>
                                    <th>Department Amount Budget</th>
                                    <th>Operating Budget 30 %</th>
                                    <th>Financial Budget 15 %</th>
                                    <th>Cash Budget 10%</th>
                                    <th>Labor Budget 15%</th>
                                    <th>Strategic Plan Budget 30%</th>
                                </thead>
                                <tbody>
                                    @forelse($lannuals as $lannual)
                                    <tr>
                                        <td>@money($lannual->lyear)</td>
                                        <td>@money($lannual->ldeptbudget)</td>
                                        <td>@money($lannual->lobudget)</td> 
                                        <td>@money($lannual->lfbudget)</td>
                                        <td>@money($lannual->lcbudget)</td>
                                        <td>@money($lannual->llbudget)</td>   
                                        <td>@money($lannual->lsbudget)</td>   
                                    </tr>
                                    @empty
                                <tr>
                                    <td class="text-center" colspan="7">Unlisted Records</td>
                                </tr>
                                    @endforelse
                                </tbody> 
                            </x-table>
            
                         </div>
                    </div>
                </div>
            </div>
        </div>
        {{--END table of LOGISTICS--}}

        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.......</div>
      </div>



    {{--ADD MODAL ANNUAL BUDGET--}}
    <x-jet-dialog-modal wire:model="addAnnualBudget" maxWidth="xl">
        <x-slot name="title">
            {{ __('Annually Budget') }}
        </x-slot>

        <x-slot name="content">
           <label>Year</label>
                <select wire:model="year" class="form-control">
                    <option>Select Option</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>

            <label>Annual Budget</label>
            <input wire:model="budgetannual" class="form-control" type="number">

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addAnnualBudget')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            {{--wire:click function dito sa button hindi match sa function sa class--}}
            <x-jet-button class="ms-2" wire:click="addAnnualBudgets" wire:loading.attr="disabled">
                {{ __('Add Logistics Budget') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    {{--end ADD   MODAL ANNUAL BUDGET--}}
          
       
    {{--ADD MODAL ANNUAL BUDGET LOGISTICS--}}
    <x-jet-dialog-modal wire:model="addLogisticsBudget" maxWidth="xl">
        <x-slot name="title">
            {{ __('Logistics: Annual Budget Allocation') }}
        </x-slot>

        <x-slot name="content">
           <label>Year</label>
                <select wire:model="lyear" class="form-control">
                    <option>Select Option</option>
                    <option>2022</option>
                    <option>2023</option>
                    <option>2024</option>
                    <option>2025</option>
                    <option>2026</option>
                </select>
            <label>Annual Budget for Logistics Department</label>
            <input wire:model="ldeptbudget" class="form-control" type="number">

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addLogisticsBudget')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            {{--wire:click function dito sa button hindi match sa function sa class--}}
            <x-jet-button class="ms-2" wire:click="addLogisticsBudgets" wire:loading.attr="disabled">
                {{ __('Add Budget') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    {{--end ADD MODAL ANNUAL BUDGET LOGISTICS--}}
          




        
            
        

    
</div>