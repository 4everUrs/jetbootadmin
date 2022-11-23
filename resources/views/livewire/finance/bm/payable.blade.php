<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Payable') }}
        </h2>
    </x-slot>
    
    <div class="card">
        <div class="card-body">
            <a wire:click="payableexpensetable"  class="btn btn-secondary btn-sm">Add Expenses</a>
                
            <x-table head="">
                <thead class="bg-secondary table-sm">
                    <th>Date</th>
                    <th>Requestor</th>
                    <th>Description</th>    
                    <th>Payment Type</th>
                    <th>Payment Date</th>
                    <th>Amount</th>
                    
                </thead>
                <tbody>
                    @forelse($pexpenses as $pexpense)
                    <tr>
                        <td>{{($pexpense->created_at)->toFormattedDateString()}}</td>
                        <td>{{$pexpense->eprequestor}}</td>
                        <td>{{$pexpense->epdescription}}</td>
                        <td>{{$pexpense->epaymenttype}}</td>
                        <td>@date($pexpense->epaymentdate)</td>
                        <td>@money($pexpense->epamount)</td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="7">"Unlisted Receivable"</td>
                    </tr>
                    @endforelse
                </tbody>  
           </x-table>
           <p class="text-right">&nbsp;&nbsp;Total:&nbsp;&nbsp;<label>@money($grandpayablexpense)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> </p>


           {{-----------------------------------Payable Expense Modal------------------------------------------}}
           <x-jet-dialog-modal wire:model="addPayableExpense" maxWidth="xl" >
            <x-slot name="title">
                {{ __('Add Expenses') }}
            </x-slot>
            
            <x-slot name="content">
                <div class="row form-group">
                    <div class="col">
                        <label>Requestor</label>
                        <input type="text" class="form-control" wire:model="eprequestor">

                        <label>Description</label>
                        <textarea class="form-control" wire:model="epdescription"> </textarea>

                        <label>Payment Type</label>
                        <select wire:model="epaymenttype" class="form-control">
                            <option>Select Option</option>
                            <option >Cash</option>
                            <option >Bank </option>
                            <option >Cheque</option>
                        </select>

                        <label for ="start">Payment Date</label>
                        <input type="date"  id="start" name="trip-start"
                        value="2022-10-22" min="2022-01-22" max="2022-12-31"
                        class="form-control" wire:model= "epaymentdate">

                        <label>Amount</label>
                        <input class="form-control" type="text" placeholder="₱ 0.00" wire:model="epamount">

                    </div>
                </div>
            </x-slot>
            
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('addPayableExpense')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button class="ms-2" wire:click="addPayableExpenses" wire:loading.attr="disabled">
                    {{ __('Add Cash Record') }}
                </x-jet-button>
            </x-slot>

        </x-jet-dialog-modal>
        {{-----------------------------------Payable Expense Modal------------------------------------------}}




</div>
