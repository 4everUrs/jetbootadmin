<div>
<x-slot name="header">
            <h2 class="h4 font-weight-bold">
                {{ __('Transaction') }}
            </h2>
        </x-slot>

<div class="card">
<div class="card-body">
    <a wire:click="loadModalRequest" class="btn btn-success">Add Requests</a>
    
    <x-table head="History of Budget Requests">
        <thead >
            <th>No.</th>
            <th>Originated Dept</th>
            <th>Category</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Account</th>
            <th>Description</th>
            <th>Status</th> 
            <th class="text-center">Action</th>
        </thead>
        <tbody>
            @forelse($transactions as $transaction)
            <tr>
                <td>{{$transaction->id}}</td>
                <td>{{$transaction->originated}}</td>
                <td>{{$transaction->category}}</td>
                <td>{{$transaction->created_at}}</td>
                <td>{{$transaction->amount}}</td>
                <td>{{$transaction->account}}</td>
                <td>{{$transaction->description}}</td>
                <td>{{$transaction->status}}</td>
                <td class="text-center" >
                    {{--wala kang update function pero meron kang updateItems function sa class rename ko nalang --}}
                    <button wire:click="updateItems({{$transaction->id}})"  class="btn btn-primary"> Edit </button>
                    <button wire:click="delete({{$transaction->id}})"  class="btn btn-danger"> Delete </button>
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="9">"Unlisted Records"</td>
            </tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="mt-3 float-right">
        {{$transactions->links()}}
    </div>
</div>

</div>

@livewire("finance.bm.expensess")
<!--pop up form budget request-->

<x-jet-dialog-modal wire:model="addBudget">
    <x-slot name="title">
        {{ __('Add RequestBudget') }}
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
        <x-jet-secondary-button wire:click="$toggle('addBudget')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        {{--wire:click function dito sa button hindi match sa function sa class--}}
        <x-jet-button class="ms-2" wire:click="addBudgets" wire:loading.attr="disabled">
            {{ __('Update Request Budget') }}
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
    <x-jet-button class="ms-2" wire:click="deleteItem" wire:loading.attr="disabled">
            {{ __('Delete Request') }}
     </x-jet-button>
    </x-slot>

</x-jet-dialog-modal>
<!--update modal-->






</div>
