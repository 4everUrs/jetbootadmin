<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Records & Reports') }}
        </h2>
    </x-slot>

    
      {{--Journal Entry--}}
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Accounts Payable</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Accounts Receivable</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Journal Entry</button>
        </li>
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link" id="trial-tab" data-bs-toggle="tab" data-bs-target="#trial" type="button" role="tab" aria-controls="trial" aria-selected="false">Trial Balance</button>
        </li>
      </ul>
      
      <div class="tab-content" id="myTabContent">
        
      
{{-------------------------------------------Accounts Payable---------------------------------------------------------}}        
        
            <div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> 

                <div class="card">
                    <div class="card-body">
                        <a wire:click="tablePayables" class="btn btn-info btn-sm">Add Accounts Payable</a>

                        <x-table head="Lists of Account Payables">

                            <thead>
                                <th>Invoice Created</th>
                                <th>Invoice No.</th>
                                <th>Invoice Date</th>
                                <th>Name</th>
                                <th>Invoice Amount</th>
                                <th>Payments Made</th>
                                <th>Amount</th>
                                <th>Due Date</th>
                                <th>Remarks</th>
                            </thead>

                            <tbody>
                                @forelse($unpaids as $unpaid)
                                <tr>
                                    <td>{{($unpaid->created_at)->toFormattedDateString()}}</td>
                                    <td>{{$unpaid->invoice}}</td>
                                    <td>{{$unpaid->idate}}</td>
                                    <td>{{$unpaid->pname}}</td>
                                    <td>{{$unpaid->invoiceamount}}</td>
                                    <td>{{$unpaid->paymade}}</td>
                                    <td>{{$unpaid->pamount}}</td>
                                    <td>{{$unpaid->pduedate}}</td>
                                    <td>{{$unpaid->premarks}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="8">"Unlisted Records"</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-table><br><br>
                        
                    </div>
                </div>
            </div>   
{{-------------------------------------------End Accounts Payable----------------------------------------------------------------}} 


{{------------------------------------------- ADD MODAL ACCOUNTS PAYABLE---------------------------------------------------------}} 
                    


{{------------------------------------------- END ADD MODAL ACCOUNTS PAYABLE---------------------------------------------------------}} 

{{-------------------------------------------Accounts Receivable---------------------------------------------------------}} 
            <div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
{{-------------------------------------------End Accounts Receivable---------------------------------------------------------}} 


    {{-------------------------------------------JOURNAL ENTRY---------------------------------------------------------}}    
            <div wire:ignore.self class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> 
                
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
                                {{--<th>Status</th>--}}
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
                                    {{--<td>{{$entry->jstatus}}</td>--}}

                                
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
{{-------------------------------------------END JOURNAL ENTRY------------------------------------------------------------------------------------}} 

 {{---------------------------------------- JOURNAL ENTRY MODAL------------------------------------------------------------------------------------}}       
            {{--add liability--}}
 
{{----------------------------------------JOURNAL ENTRY MODAL------------------------------------------------------------------------------------}}

{{-----------------------------------------TRIAL BALANCE TABLE-----------------------------------------------------------------------------------}}      
            <div wire:ignore.self class="tab-pane fade" id="trial" role="tabpanel" aria-labelledby="trial-tab">
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

        

{{----------------------------END---(CASH)---ADD MODAL TRIAL BALANCE-------------------------------------------------------------------------------}}
       
    </div>
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
                <x-jet-dialog-modal wire:model="addPayables" maxWidth="xl">
                    <x-slot name="title">
                        {{ __('Add Payables') }}
                </x-slot>

                    <x-slot name="content">
                        <div class="form-group"> {{--sobra kalang ng divs pwede naman pagsamahin ung dalawa sa isang div--}}
                            <div class="row mb-4">
                                <div class="col">
                                    <label>Invoice #</label>
                                    <input wire:model="invoice" class="form-control" type="number">

                                    <label for ="start">Invoice Date</label>
                                        <input type="date"  id="start" name="trip-start"
                                            value="2022-10-22" min="2022-01-22" max="2022-12-31"
                                                class="form-control" wire:model= "idate">
                                    
                                    <label>Name</label>
                                    <input wire:model="pname"class="form-control"  type=text>
                                </div>
                                <div class="col">
                                    <label>Invoice Amount</label>
                                    <input wire:model="invoiceamount" class="form-control" type="number">
                                    <label>Payments Made</label>
                                    <input wire:model="paymade" class="form-control" type="number">
                                    <label>Amount</label>
                                    <input wire:model="pamount" class="form-control" type="number">

                                    <label for ="start">Due Date</label>
                                        <input type="date"  id="start" name="trip-start"
                                            value="2022-10-22" min="2022-01-22" max="2022-12-31"
                                                class="form-control" wire:model= "pduedate">
                                                
                                    <label>Remarks</label>
                                    <textarea class="form-control" wire:model="premarks"></textarea>

                                </div>
                            </div>
                        </div>
                </x-slot>
                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('addPayables')" wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>
                        {{--wire:click function dito sa button hindi match sa function sa class--}}
                        <x-jet-button class="ms-2" wire:click="addPay" wire:loading.attr="disabled">
                            {{ __('Add Payables') }}
                        </x-jet-button>
                </x-slot>

                </x-jet-dialog-modal>
</div>