<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Journal Entry') }}
        </h2>
    </x-slot>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item mr-2" role="presentation">
          <button class="nav-link active" id="journalentry-tab" data-bs-toggle="tab" data-bs-target="#journalentry" type="button" role="tab" aria-controls="journalentry" aria-selected="true">Journal Entry</button>
        </li>
        <li class="nav-item mr-2" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Trial Balance</button>
        </li>
        <li class="nav-item mr-2 " role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">General Ledger</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="journalentry" role="tabpanel" aria-labelledby="Journal Entry">
           
            <div class="card">
                <div class="card-body">
        
                    <a wire:click="loadingJournal" class="btn btn-success">Add Journal Entry</a>
                   
                    <x-table head="History of Journal Entries">
                    
                        <thead>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Sub-Description</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Encoded By</th>
                            <th class="text-center">Action</th>
                        </thead>
        
                        <tbody>
                          @foreach ($journal_entries as $entry)
                            <tr>
                                <td>{{$entry->id}}</td>
                                <td>{{Carbon\Carbon::parse($entry->created_at)->toFormattedDateString()}}</td>
                                <td>
                                   <table class="table">
                                        @foreach ($entry->subjournal as $subjournal)
                                            <tr>
                                                <td>{{$subjournal->jdescription}}</td>
                                            </tr>
                                        @endforeach
                                   </table>
                                </td>
                                <td>
                                   <table class="table">
                                        @foreach ($entry->subjournal as $subjournal)
                                            <tr>
                                                <td>{{$subjournal->jsubdescription}}</td>
                                            </tr>
                                        @endforeach
                                   </table>
                                </td>
                               
                                <td>
                                   <table class="table">
                                        @foreach ($entry->subjournal as $subjournal)
                                            <tr>
                                                <td>{{$subjournal->jdebit}}</td>
                                            </tr>
                                        @endforeach
                                   </table>
                                </td>
                                <td>
                                   <table class="table">
                                        @foreach ($entry->subjournal as $subjournal)
                                            <tr>
                                                <td>{{$subjournal->jcredit}}</td>
                                            </tr>
                                        @endforeach
                                   </table>
                                </td>
                                <td>{{$entry->jencoded}}</td>
                               
                                <td>
                                    <button wire:click="viewModal({{$entry->id}})" class="btn btn-primary btn-sm">View</button>
                                    <button wire:click="updateLiability({{$entry->id}})" class="btn btn-success btn-sm">Edit</button>
                                    <button wire:click="deleteliabilities({{$entry->id}})" class="btn btn-warning btn-sm">Delete</button>
                                </td>
                            </tr>
                              
                          @endforeach
                        </tbody>
                    </x-table>
        
                    <div class="mt-3 float-right">
                        {{-- {{$journal_entries->links()}} --}}
                    </div>
                </div>
            </div>
        
            {{--add liability--}}
            <x-jet-dialog-modal wire:model="addLiability" maxWidth="xl">
                <x-slot name="title">
                    {{ __('Journal Entries') }}
                </x-slot>
            
                <x-slot name="content">
                    <div class="form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
                        <div class="row mb-4">
                            <div class="col">
                                <label>Category</label>
                                <select wire:model="jdescription" class="form-control">
                                    <option>Select Option</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Accounts Payable">Accounts Payable </option>
                                    <option value="Salary">Payment of Salary </option>
                                    <option value="Inventory">Inventory</option>
                                    <option value="Unearned Payable">Unearned Payable</option>
                                </select>
                                <label>Sub-Category</label>
                                <textarea class="form-control" wire:model="jsubdescription"> </textarea>
                            </div>
                            <div class="col">
                                <label>Debit</label>
                                <input wire:model="jdebit" class="form-control" type="number">
                                <label>Credit</label>
                                <input wire:model="jcredit" class="form-control" type="number">
                            </div>
                        </div>
                        <button wire:click="saveRecord" class="btn btn-dark mb-2">ADD</button>
                        <table class="table table-hovered">
                            <thead>
                            
                                <th>Description</th>
                                <th>Sub-Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($preview as $index => $prev)
                                    <tr>
                                        <td>{{$prev['jdescription']}}</td>
                                        <td>{{$prev['jsubdescription']}}</td>
                                        <td>{{$prev['jdebit']}}</td>
                                        <td>{{$prev['jcredit']}}</td>
        
                                        <td class="text-center">
                                            <button wireclick: class="btn btn-danger btn-sm">Remove</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total:</td>
                                    <td >{{$grandtotal}}</td>
                                </tr>
                            </tfoot>
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
                    <div class="form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
                        <div class="row mb-4">
                            <div class="col">
                                <label>Category</label>
                                <select wire:model="jdescription" class="form-control">
                                    <option>Select Option</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Accounts Payable">Accounts Payable </option>
                                    <option value="Salary">Payment of Salary </option>
                                    <option value="Inventory">Inventory</option>
                                    <option value="Unearned Payable">Unearned Payable</option>
                                </select>
                               
                            </div>
                            <div class="col">
                                <label>Debit</label>
                                <input wire:model="jdebit" class="form-control" type="number">
                                <label>Credit</label>
                                <input wire:model="jcredit" class="form-control" type="number">
                            </div>
                        </div>
                        <button wire:click="saveSub" class="btn btn-dark mb-2">SAVE</button>
                        <table class="table table-hovered">
                            <thead>
                            
                                <th>Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                             @if (!empty($subjournalData))
                                @foreach ($subjournalData as $data)
                                    <tr>
                                        <td>{{$data->jdescription}}</td>
                                        <td>{{$data->jdebit}}</td>
                                        <td>{{$data->jcredit}}</td>
                                        <td class="text-center">
                                            <button wire:click="editSub({{$data->id}})" class="btn btn-primary">Edit</button>
                                        </td>
                                    </tr>
                                @endforeach
                             @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Total:</td>
                                    <td >{{$grandtotal}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </x-slot>
        
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('updateLiability')" wire:loading.attr="disabled">
                        {{ __('Close') }}
                    </x-jet-secondary-button>
                    {{--wire:click function dito sa button hindi match sa function sa class--}}
                    
                </x-slot>
            </x-jet-dialog-modal>
            {{--update liability--}}
        
            {{--delete liability--}}
            <x-jet-dialog-modal wire:model="deleteliability">
                <x-slot name="title">
                    {{ __('Delete Records ') }}
                </x-slot>
                <x-slot name="content">
                    <h4>Are you sure to Delete this RECORD?</h4>
                </x-slot>
        
                <x-slot name="footer">
                    {{--wrong function calling --}}
                    <x-jet-button class="ms-2" wire:click="deleteliabilities" wire:loading.attr="disabled">
                        {{ __('Delete Record') }}
                    </x-jet-button>
                </x-slot>
        
            </x-jet-dialog-modal>
            {{--delete liability--}}
        
            <x-jet-dialog-modal wire:model="viewRecord" maxWidth="xl">
                <x-slot name="title">
                    {{ __('Update Liability Record') }}
                </x-slot>
                <x-slot name="content">
                    <table class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Description</th>
                            <th>Credit</th>
                            <th>Debit</th>
                        </thead>
                        <tbody>
                            @if (!empty($subjournalData))
                            @foreach ($subjournalData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->jdescription}}</td>
                                <td>{{$data->jcredit}}</td>
                                <td>{{$data->jdebit}}</td>
                            </tr>
                        @endforeach
                            @endif
                           
                        </tbody>
                    </table>
                </x-slot>
        
                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="$toggle('viewRecord')" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-jet-secondary-button>
                    {{--wire:click function dito sa button hindi match sa function sa class--}}
                    <x-jet-button class="ms-2" wire:click="updateLiabilities" wire:loading.attr="disabled">
                        {{ __('Update Records') }}
                    </x-jet-button>
                </x-slot>
            </x-jet-dialog-modal>
        
        
        
        </div>

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="Trial Balance">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="General Ledger">...</div>
      </div>
    



</div>