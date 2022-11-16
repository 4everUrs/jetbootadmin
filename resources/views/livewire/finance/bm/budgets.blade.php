<div>
<x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Transaction') }}
            </h2>
        </x-slot>

<div class="card">
<div class="card-body">    
    <x-table head="History of Budget Requests">
        <thead class="bg-secondary table-sm">
            <th>No.</th>
            <th>Origin</th>
            <th>Proposal Name</th>
            <th>Requestor</th>
            <th>Requested Date</th>
            <th>Proposed Amount</th>
            <th>Process Date</th>
            <th>Attachment</th>
            <th>Status</th>
            <th>Remarks</th>  
            <th class="text-center">Action</th>   
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
            <tr>
                <td>{{$transaction->ListRequested->id}}</td>
                <td>{{$transaction->ListRequested->origin}}</td>
                <td>{{$transaction->ListRequested->proposalname}}</td>
                <td>{{$transaction->ListRequested->requestor}}</td>
                <td>{{($transaction->ListRequested->created_at)->toFormattedDateString()}}</td>
                <td>{{$transaction->ListRequested->proposedamount}}</td>
                <td>{{$transaction->ListRequested->approvedate}}</td>
                <td><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{($transaction->ListRequested->attachment)}}" target="_blank" rel="noopener noreferrer">{{($transaction->ListRequested->attachment)}}</a></td>
                <td>{{$transaction->ListRequested->rstatus}}</td>
                <td>{{$transaction->ListRequested->remarks}}</td>
                <td class="text-center">
                    <button class="btn btn-info btn-sm">Approved</button>
                    <button class="btn btn-danger btn-sm">Deny</button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="11">"Unlisted Proposals"</td>
            </tr>
            @endforelse

            
        </tbody>
    </x-table><br><br>
    
    <div class="mt-3 float-right">
        {{$transactions->links()}}
    </div>
    
</div>

</div>



<!--pop up form budget request-->

<x-jet-dialog-modal wire:model="addBudget" maxWidth="xl" >
    <x-slot name="title">
        {{ __('Add RequestBudget') }}
    </x-slot>
    
    <x-slot name="content">
        <div class="row form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
            <div class="col">
                    
                <label>Select Originated Dept.</label>
                <select class="form-control" wire:model="originated">
                    <option value="">Select Option</option>
                  @forelse ($requestsLists as $request)
                      <option value="{{$request->id}}">{{$request->proposalname}}</option>
                  @empty
                      <option value="">No Request Available</option>
                  @endforelse
                </select>
                @error('originated') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            
                <label>Category</label>
                <select class="form-control" wire:model="category">
                    <option>Operating budget</option>
                    <option>Financial budget </option>
                    <option>Cash Budget </option>
                    <option>Labor Budget</option>
                    <option>Strategic Plan</option>
                </select>
                @error('category') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
            <div class="col">
                <label>Amount</label>
                <input type="number" class="form-control" wire:model="amount">
                @error('ammount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            
                <label>Account</label>
                <select class="form-control" wire:model="account">
                    <option>CASH</option>
                    <option>ACCOUNT </option>
                    <option>CARD</option>
                </select>
                @error('account') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" wire:model="description"> </textarea>
            @error('description') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('addBudget')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        {{--wire:click function dito sa button hindi match sa function sa class--}}
        <x-jet-button class="ms-2" wire:click="addBudgets" wire:loading.attr="disabled">
            {{ __('Add Request Budget') }}
        </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>

<!--update modal-->
<x-jet-dialog-modal wire:model="updateItem">
    <x-slot name="title">
        {{ __('Update Request Record') }}
    </x-slot>

    <x-slot name="content">
        <div class="row form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
            <div class="col">
                <label>Select Originated Dept.</label>
                <select class="form-control" wire:model="originated">
                    <option>HR DEPT</option>
                    <option>LOGISTICS DEPT</option>
                    <option>CORE</option>
                    <option>FINANCE</option>
                </select>
                @error('originated') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
        
                <label>Category</label>
                <select class="form-control" wire:model="category">
                    <option>Operating budget</option>
                    <option>Financial budget </option>
                    <option>Cash Budget </option>
                    <option>Labor Budget</option>
                    <option>Strategic Plan</option>
                </select>
                @error('category') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
            <div class="col">
                <label>Amount</label>
                <input type="number" class="form-control" wire:model="amount">
                @error('ammount') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
        
                <label>Account</label>
                <select class="form-control" wire:model="account">
                    <option>CASH</option>
                    <option>ACCOUNT </option>
                    <option>CARD</option>
                </select>
                @error('account') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" wire:model="description"> </textarea>
            @error('description') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
        </div>
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('updateItem')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        {{--wala kang main function para makapag update ng database--}}
        <x-jet-button class="ms-2" wire:click="mainUpdateFunction" wire:loading.attr="disabled">
            {{ __('Update Request BUdget') }}
        </x-jet-button>

    </x-slot>
</x-jet-dialog-modal>
<!--update modal-->

<!--delete modal-->

<x-jet-dialog-modal wire:model="deleteRequest">
    <x-slot name="title">
        {{ __('Delete') }}
    </x-slot>
    <x-slot name="content">
    <h4>Are you sure to Delete this item?</h4>
    </x-slot>

    <x-slot name="footer">
        {{--wrong function calling --}}
    <x-jet-button class="ms-2" wire:click="deleteBudgetItem" wire:loading.attr="disabled">
            {{ __('Delete Request') }}
     </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
<!--update modal-->
{{-- @livewire("finance.bm.expensess") --}}

<livewire:finance.bm.expensess>
</div>
