<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Journal Entry') }}
        </h2>
    </x-slot>
</div>

<div class="card">
    <div class="card-body">
        <a wire:click="loadModalJournal" class="btn btn-success">Add Requests</a>
        
        <x-table head="History of Budget Requests">
            <thead >
                <th>No.</th>
                <th>Date</th>
                <th>Description</th>
                <th>Debit</th>
                <th>Credit</th>
                <th>Encoded By</th>
                <th class="text-center">Action</th>
            </thead>

            <tbody>
                @forelse($journal_entries as $journal_entry)
                <tr>
                    <td>{{$journal_entry->id}}</td>
                    <td>{{$journal_entry->created_at}}</td>
                    <td>{{$journal_entry->jdescription}}</td>
                    <td>{{$journal_entry->jdebit}}</td>
                    <td>{{$journal_entry->jcredit}}</td>
                    <td>{{$journal_entry->jencoded}}</td>
                   
                    <td class="text-center" >
                       
                        <button wire:click="updateJournals({{$journal_entry->id}})"  class="btn btn-primary"> Edit </button>
                        <button wire:click="delete({{$journal_entry->id}})"  class="btn btn-danger"> Delete </button>
                    
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="7">"Unlisted Records"</td>
                </tr>
                @endforelse
            </tbody>
        </x-table>

        <div class="mt-3 float-right">
            {{$journal_entries->links()}}
        </div>


<!--add modal-->

<x-jet-dialog-modal wire:model="addJournal">
    <x-slot name="title">
        {{ __('Add Journal Entry') }}
    </x-slot>
    
    <x-slot name="content">
        <div class="row form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
            <div class="col">
                <label>Account</label>
                <select class="form-control" wire:model="jdescription">
                    <option>CASH</option>
                    <option>ACCOUNT </option>
                    <option>CARD</option>
                </select>
                @error('originated') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            
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
<!--add modal-->
        



 

