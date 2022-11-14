<div>
    <div>
        <x-slot name="header">
                    <h2 class="h4 font-weight-bold">
                        {{ __('Disbursement') }}
                    </h2>
                </x-slot>
    </div>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Approved Budget Lists</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Disburse Budget</button>
        </li>
    </ul>
      
    <div class="tab-content" id="myTabContent">

        <div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 
            <div class="card">
                <div class="card-body">
                    
                    <x-table head="History of Disbursements">
                        <thead class="bg-secondary table-sm">
                            <th>No.</th>
                            <th>Origin</th>
                            <th>Requestor</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                            <th>Process Date</th>
                            <th>Status</th> 
                           
                        </thead>
                       <tbody>
                            @forelse($disburses as $disbursed)
                            <tr>
                                <td>{{$disbursed->id}}</td>
                                <td>{{$disbursed->dorigin}}</td>
                                <td>{{$disbursed->drequestor}}</td>
                                <td>{{$disbursed->damount}}</td>
                                <td>{{$disbursed->dremarks}}</td>
                                <td>{{($disbursed->created_at)->toFormattedDateString()}}</td>
                                <td>{{$disbursed->dstatus}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="7">"Unlisted Records"</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>

        {{--Disbursed Budget--}}

        <div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <a wire:click="tableApprovedBudget" class="btn btn-secondary btn-sm">Add Disburse</a>
                    
                    <x-table head="History of Disbursements">
                        <thead class="bg-secondary table-sm">
                            <th>No.</th>
                            <th>Origin</th>
                            <th>Category</th>
                            <th>Amount</th>
                            <th>Account</th>
                            <th>Date Release</th>
                            <th>Status</th> 
                            <th class="text-center">Action</th> 
                           
                        </thead>
                       <tbody>
                            @forelse($disburses as $disbursed)
                            <tr>
                                <td>{{$disbursed->id}}</td>
                                <td>{{$disbursed->rorigin}}</td>
                                <td>{{$disbursed->rcategory}}</td>
                                <td>{{$disbursed->ramount}}</td>
                                <td>{{$disbursed->raccount}}</td>
                                <td>{{$disbursed->rrelease}}</td>
                                <td>{{$disbursed->rstatus}}</td>
                                <td class="text-center" >
                                    <button wire:click="#"  class="btn btn-secondary btn-sm">Release</button> 
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="8">"Unlisted Records"</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
         {{--end Disbursed Budget--}}


         {{--Release Budget Modal--}}
         <x-jet-dialog-modal wire:model="addRelease" maxWidth="xl" >
    <x-slot name="title">
        {{ __('Disbursed Budget') }}
    </x-slot>
    
    <x-slot name="content">
        <div class="row form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
            <div class="col">
                    
             {{--<label>Select Originated Dept.</label>
                <select class="form-control" wire:model="originated">
                    <option value="">Select Option</option>
                  @forelse ($requestsLists as $request)
                      <option value="{{$request->id}}">{{$request->proposalname}}</option>
                  @empty
                      <option value="">No Request Available</option>
                  @endforelse
                </select>
                @error('originated') <span class="alert text-danger">{{ $message }}<br /></span> @enderror--}}
                <label>Origin</label>
                <select class="form-control" wire:model="rorigin">
                    <option>Select Origin</option>
                    <option>Finance </option>
                    <option>Core</option>
                    <option>Hr</option>
                    <option>Logistics</option>
                </select>
                @error('rcategory') <span class="alert text-danger">{{ $message }}<br /></span> @enderror

                <label>Category</label>
                <select class="form-control" wire:model="rcategory">
                    <option>Select Category</option>
                    <option>Operating budget</option>
                    <option>Financial budget </option>
                    <option>Cash Budget </option>
                    <option>Labor Budget</option>
                    <option>Strategic Plan</option>
                </select>
                @error('rcategory') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
            <div class="col">
                <label>Amount</label>
                <input type="number" class="form-control" wire:model="ramount">
                @error('ramount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            
                <label>Account</label>
                <select class="form-control" wire:model="raccount">
                    <option>CASH</option>
                    <option>ACCOUNT </option>
                    <option>CARD</option>
                </select>
                @error('raccount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
        </div>
        
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('addRelease')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        {{--wire:click function dito sa button hindi match sa function sa class--}}
        <x-jet-button class="ms-2" wire:click="addReleases" wire:loading.attr="disabled">
            {{ __('Add Disbursed') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
         {{--end Release Budget Modal--}}


    
</div>





</div>
