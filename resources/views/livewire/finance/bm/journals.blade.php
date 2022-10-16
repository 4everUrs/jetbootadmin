<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Records & Reports') }}
        </h2>
    </x-slot>

    
      {{--Journal Entry--}}
      <nav>
        <div class="nav nav-tabs " id="nav-tab" role="tablist">
          <button class="nav-link active mb-3" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Account Payable</button>
          <button class="nav-link mb-3" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Account Receivable</button>
          <button class="nav-link mb-3" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Journal Entry</button>
          <button class="nav-link mb-3" id="nav-trial-tab" data-bs-toggle="tab" data-bs-target="#nav-trial" type="button" role="tab" aria-controls="nav-trial" aria-selected="false">Trial Balance</button>
        </div>
      </nav>
      
      <div class="tab-content" id="nav-tabContent">
{{-------------------------------------------Accounts Payable---------------------------------------------------------}}        
        
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <div class="card">
            <div class="card-body">
                <a class="btn btn-success">Add Accounts Payable</a>

                <x-table head="Lists of Account Payables">

                    <thead >
                        <th>Code No</th>
                        <th>From</th>
                        <th>Description</th>
                        <th>Attachment file</th>
                        <th>Date</th>
                        <th>Action/th>
                    </thead>

                </x-table>
            </div>
        </div>
</div>
{{-------------------------------------------End Accounts Payable---------------------------------------------------------}} 
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success">Add Account Receivable</a>
    
                    <x-table head="Lists of Account Receivable">
    
                        <thead >
                            <th>Code No</th>
                            <th>From</th>
                            <th>Description</th>
                            <th>Attachment file</th>
                            <th>Date</th>
                            <th>Action/th>
                        </thead>
    
                    </x-table>
                </div>
            </div>
            
        </div>
        

            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
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
                            <th>Status</th>
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
                                <td>{{$entry->jstatus}}</td>

                               
                                <td>
                                    <button wire:click="viewModal({{$entry->id}})" class="btn btn-primary btn-sm">View</button>
                                    <button wire:click="updateLiability({{$entry->id}})" class="btn btn-success btn-sm">Edit</button>
                                    <button wire:click="deleteliabilities({{$entry->id}})" class="btn btn-warning btn-sm">Delete</button>
                                    {{--<button wire:click="recordliabilities({{$entry->id}})" class="btn btn-danger btn-sm">Record</button>--}}
                                </td>
                            </tr>
                              
                          @endforeach
                        </tbody>
                    </x-table>
                    
                </div>
            </div>
        </div> 

 {{----------------------------------------JOURNAL ENTRY MODAL------------------------------------------------------------------------------------}}       
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
                                    <option value="Accounts Receivable">Accounts Receivable </option>
                                    <option value="Accounts Payable">Accounts Payable </option>
                                    <option value="Cash Dividends Payable">Cash Dividends Payable</option>
                                    <option value="Salary & Wages">Salary & Wages</option>
                                    <option value="Commission Fee">Commission Fee</option>
                                    <option value="Collection">Collection</option>

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
                                    <option value="Accounts Receivable">Accounts Receivable </option>
                                    <option value="Accounts Payable">Accounts Payable </option>
                                    <option value="Cash Dividends Payable">Cash Dividends Payable</option>
                                    <option value="Salary & Wages">Salary & Wages</option>
                                    <option value="Commission Fee">Commission Fee</option>
                                    <option value="Collection">Collection</option>
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
                        <button wire:click="saveSub" class="btn btn-dark mb-2">SAVE</button>
                        <table class="table table-hovered">
                            <thead>
                            
                                <th>Description</th>
                                <th>Sub-Description</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th class="text-center">Action</th>
                            </thead>
                            <tbody>
                             @if (!empty($subjournalData))
                                @foreach ($subjournalData as $data)
                                    <tr>
                                        <td>{{$data->jdescription}}</td>
                                        <td>{{$data->jsubdescription}}</td>
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
                    {{ __('View Journal Entry Record') }}
                </x-slot>
                <x-slot name="content">
                    <table class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Description</th>
                            <th>Sub-Description</th>
                            <th>Credit</th>
                            <th>Debit</th>
                            
                        </thead>
                        <tbody>
                            @if (!empty($subjournalData))
                            @foreach ($subjournalData as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->jdescription}}</td>
                                <td>{{$data->jsubdescription}}</td>
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
        {{--End of Journal Entry--}}  
{{----------------------------------------JOURNAL ENTRY MODAL------------------------------------------------------------------------------------}}

{{-----------------------------------------TRIAL BALANCE TABLE-----------------------------------------------------------------------------------}}      
<div class="tab-pane fade" id="nav-trial" role="tabpanel" aria-labelledby="nav-trial-tab">
    <div class="card">
        <div class="card-body">    
            <a wire:click="loadModalCash" class="btn btn-success">Add Cash Record</a>

                <x-table head="Cash">
                    <thead>
                        <th>Id</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Status</th>   
                    </thead>

                <tbody>
                    @forelse($gen_leds as $gen_led)
                    <tr>
                        <td>{{$gen_led->id}}</td>
                        <td>{{$gen_led->ldate}}</td>
                        <td>{{$gen_led->ldescription}}</td>
                        <td>{{$gen_led->ldebit}}</td>
                        <td>{{$gen_led->lcredit}}</td>
                        <td>{{$gen_led->lstatus}}</td>
                        
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
{{-----------------------------------------TRIAL BALANCE TABLE-----------------------------------------------------------------------------------}}

{{--------------------------------(CASH)---ADD MODAL TRIAL BALANCE-------------------------------------------------------------------------------}}

        <x-jet-dialog-modal wire:model="addGenled" maxWidth="xl" >
            <x-slot name="title">
                {{ __('Add Record for CASH') }}
            </x-slot>
            
            <x-slot name="content">
                <div class="row form-group">
                    <div class="col">
                        <label for ="start">Date</label>
                        <input type="date"  id="start" name="trip-start"
                        value="2022-10-22" min="2022-01-22" max="2022-12-31"
                        class="form-control" wire:model= "ldate">

                        <label>Description</label>
                        <textarea class="form-control" wire:model="ldescription"> </textarea>

                        <label>Credit</label>
                        <input type="number" class="form-control" wire:model="ldebit">

                        <label>Debit</label>
                        <input type="number" class="form-control" wire:model="lcredit">       
                    </div>
                </div>
            </x-slot>
            
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('addGenled')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button class="ms-2" wire:click="addGenleds" wire:loading.attr="disabled">
                    {{ __('Add Cash Record') }}
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>

{{----------------------------END---(CASH)---ADD MODAL TRIAL BALANCE-------------------------------------------------------------------------------}}
    </div>

</div>