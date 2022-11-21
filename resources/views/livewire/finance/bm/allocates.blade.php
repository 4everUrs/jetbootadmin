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
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Budget Allocation</button>
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
            
                                <thead class="bg-secondary table-sm">
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
                            <x-table head="Viewing Annual Budget" class="text-center">
            
                                <thead class="bg-secondary table-sm">
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

                    <div class="card">
                        <div class="card-body">
                            <a wire:click="loadBudget" class="btn btn-info btn-sm">Allocate Budget</a>
                            <x-table head="" class="text-center">
                
                                <thead class="bg-secondary table-sm">
                                    <th>Department</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Recurrence</th>
                                    <th>Amount</th>
                                </thead>
                                <tbody>
                                    @forelse($allocates as $allocate)
                                    <tr>
                                        <td>{{$allocate->department}}</td>
                                        <td>{{$allocate->startdate}}</td>
                                        <td>{{$allocate->enddate}}</td>
                                        <td>{{$allocate->recurrence}}</td>
                                        <td>@money($allocate->amounts)</td>
                                        
                                    </tr>
                                    @empty
                                <tr>
                                    <td class="text-center" colspan="5">Unlisted Records</td>
                                </tr>
                                    @endforelse
                            </tbody>
                            </x-table>
                        </div>
                    </div>
            </div>
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
                <input class="form-control" type="text" placeholder="₱ 0.00" wire:model="budgetannual">
 
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addAnnualBudget')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            {{--wire:click function dito sa button hindi match sa function sa class--}}
            <x-jet-button class="ms-2" wire:click="addAnnualBudgets" wire:loading.attr="disabled">
                {{ __('Add Annual Budget') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    {{--end ADD   MODAL ANNUAL BUDGET--}}

    {{--ADD MODAL ANNUAL BUDGET--}}
    <x-jet-dialog-modal wire:model="addAnnuallyBudget" maxWidth="xl">
        <x-slot name="title">
            {{ __('Annual Budget') }}
        </x-slot>

        <x-slot name="content">
           <label>Department</label>
                <select wire:model="department" class="form-control">
                    <option>Select Option</option>
                    <option>Finance</option>
                    <option>Logistics</option>
                    <option>Core</option>
                    <option>HR</option>
                </select>

                <form action="/action_page.php">
                    <label for="datemin">Start Date</label>
                    <input type="date" class="form-control" id="datemin" name="datemin" min="2022-01-02" max="2030-12-31" wire:model="startdate">
                  
                    <label for="datemax">End Date</label>
                    <input type="date" class="form-control" id="datemax" name="datemax" min="2022-01-02" max="2030-12-31"wire:model="enddate" >
                  </form>

                <label>Reccurrence</label>
                <select wire:model="recurrence" class="form-control">
                    <option>Select Option</option>
                    <option>Monthly </option>
                    <option>Yearly</option>
                </select>

                <label>Amount</label>
                <input class="form-control" type="text" placeholder="₱ 0.00" wire:model="amounts">
                
            

            

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addAnnuallyBudget')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            {{--wire:click function dito sa button hindi match sa function sa class--}}
            <x-jet-button class="ms-2" wire:click="addAnnuallyBudgets" wire:loading.attr="disabled">
                {{ __('Save Data') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    {{--end ADD   MODAL ANNUAL BUDGET--}}
          
       
    




        
            
        

    
</div>