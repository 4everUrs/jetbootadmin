<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Allocating Budget') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Annual Budget</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Logistics</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Finance</button>
        </li>

      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <a wire:click="loadAnnualBudget" class="btn btn-success">Add Cash Record</a>
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
                                        <td>{{$bannual->budgetannual}}</td>
                                        <td>{{$bannual->blogistics}}</td>
                                        <td>{{$bannual->bcore}}</td>
                                        <td>{{$bannual->bhr}}</td>
                                        <td>{{$bannual->bfinance}}</td>
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
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
            
                            <x-table head="Logistics">
                                <thead>
                                    <th>Department Amount Budget</th>
                                    <th>Operating Budget 30 %</th>
                                    <th>Financial Budget 15 %</th>
                                    <th>Cash Budget 10%</th>
                                    <th>Labor Budget 15%</th>
                                    <th>Strategic Plan Budget 30%</th>
                                </thead>
                                <tbody>
                                    <td>2,040,000</td>
                                    <td>612,000</td>
                                    <td>306,000</td>
                                    <td>204,000</td>
                                    <td>306,000</td>
                                    <td>612,000</td>
                                </tbody>
                            </x-table>
            
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
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
                {{ __('Add Annul Budget') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    {{--end ADD MODAL ANNUAL BUDGET--}}
          
       




        
            
        

    
</div>