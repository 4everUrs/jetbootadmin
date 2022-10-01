<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Journal Entry') }}
        </h2>
    </x-slot>

    <div class="card">
        <div class="card-body">

            <a wire:click="loadingJournal" class="btn btn-success">Add Journal Entry</a>

            <x-table head="History of Liabilities">
                <thead>
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

                        <td class="text-center">

                            <button wire:click="updateLiabilities({{$journal_entry->id}})" class="btn btn-primary"> Edit
                            </button>
                            <button wire:click="delete({{$journal_entry->id}})" class="btn btn-danger"> Delete </button>

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
        </div>
    </div>

    {{--add liability--}}
    <x-jet-dialog-modal wire:model="addLiability" maxWidth="xl">
        <x-slot name="title">
            {{ __('Liabilities') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
                <div class="row mb-4">
                    <div class="col">
                        <label>Category</label>
                        <select class="form-control">
                            <option>Operating budget</option>
                            <option>Financial budget </option>
                            <option>Cash Budget </option>
                            <option>Labor Budget</option>
                            <option>Strategic Plan</option>
                        </select>
                        <label>Description</label>
                        <textarea wire:model="jdescription" class="form-control"></textarea>
                    </div>
                    <div class="col">
                        <label>Debit</label>
                        <input wire:model="jdebit" class="form-control" type="number">
                        <label>Credit</label>
                        <input wire:model="jcredit" class="form-control" type="number">
                    </div>
                </div>
                <table class="table table-hovered">
                    <thead>
                        <th>No.</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addLiability')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            {{--wire:click function dito sa button hindi match sa function sa class--}}
            <x-jet-button class="ms-2" wire:click="addLiabilities" wire:loading.attr="disabled">
                {{ __('Add Records') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{--add liability--}}


    {{--update liability--}}
    <x-jet-dialog-modal wire:model="updateLiability" maxWidth="xl">
        <x-slot name="title">
            {{ __('Update Liability Record') }}
        </x-slot>
        <x-slot name="content">
            <div class="row form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
                <div class="col">
                    <label>Account</label>
                    <select class="form-control" wire:model="jdescription">

                        <option>Select Option</option>
                        <option>CASH</option>
                        <option>ACCOUNT RECEIVABLE </option>
                        <option>INVENTORY</option>
                        <option>VEHICLES</option>
                    </select>
                    @error('jdescription') <span class="alert text-danger">{{ $message }}<br /></span> @enderror

                    <label>Amount</label><br>

                    <label>Debit</label>
                    <input type="number" class="form-control" wire:model="jdebit"><br>


                    <label>Credit</label>
                    <input type="number" class="form-control" wire:model="jcredit"><br>


                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('updateLiability')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            {{--wire:click function dito sa button hindi match sa function sa class--}}
            <x-jet-button class="ms-2" wire:click="updateLiabilities" wire:loading.attr="disabled">
                {{ __('Update Records') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    {{--update liability--}}

    {{--delete liability--}}
    <x-jet-dialog-modal wire:model="deleteLiability">
        <x-slot name="title">
            {{ __('Delete ') }}
        </x-slot>
        <x-slot name="content">
            <h4>Are you sure to Delete this RECORD?</h4>
        </x-slot>

        <x-slot name="footer">
            {{--wrong function calling --}}
            <x-jet-button class="ms-2" wire:click="deleteLiabilities" wire:loading.attr="disabled">
                {{ __('Delete Record') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    {{--delete liability--}}


</div>