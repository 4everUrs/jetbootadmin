<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Collection') }}
        </h2>
    </x-slot>
<div class="card">
    <div class="card-body">
        <a wire:click="tableReceivable" class="btn btn-secondary btn-sm">Add Records</a>
        <x-table head="History of Company Income">

            <thead class="bg-secondary table-sm">
                <th>ID</th>
                <th>Date</th>
                <th>Received From</th>
                <th>Address</th>
                <th>Amount Received</th>
                <th>Receipt no.</th>
                <th>Payment Type</th>
                <th>Remarks</th>
           </thead>

           <tbody>
                @forelse($collects as $collect)
                    <tr>
                        <td>{{$collect->id}}</td>
                        <td>{{$collect->created_at}}</td>
                        <td>{{$collect->rfrom}}</td>
                        <td>{{$collect->caddress}}</td>
                        <td>{{$collect->cramount}}</td>
                        <td>{{$collect->receiptno}}</td>
                        <td>{{$collect->paytype}}</td>
                        <td>{{$collect->cremarks}}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="8">"Unlisted Collection"</td>
                    </tr>
                @endforelse
           </tbody>
        </x-table><br><br><br>

        <button wire:click="sumCollect" class="btn btn-outline-warning btn-sm ">Sum</button>&nbsp;
        <label>Sum of Collected Income : </label>
        <label>{{$grandcollection}}</label><br>

    </div>
</div>



{{-------------------------------------------- COLLECTION MODAL------------------------------------------------------------------------}} 
    <x-jet-dialog-modal wire:model="addCollection" maxWidth="xl">
            <x-slot name="title">
                {{ __('Add Collection ') }}
            </x-slot>

        <x-slot name="content">
            <div class="form-group"> 
                <div class="row">
                    <div class="col">
                        <label>Received From</label>
                        <input wire:model="rfrom" class="form-control" type="text">

                        <label>Address</label>
                        <input wire:model="caddress" class="form-control" type="text">

                        <label>Remarks</label>
                        <textarea wire:model="cremarks" placeholder="??? ???????????????????? ????????????????????..." class="form-control"></textarea>
                    </div>

                    <div class="col">

                        <label>Amount Received</label>
                        <input wire:model="cramount" class="form-control" type="number">

                        <label>Receipt no.</label>
                        <input wire:model="receiptno" class="form-control" type="number">
                                    
                        <label>Payment Type</label>
                        <select wire:model="paytype" class="form-control">
                            <option>Select Option</option>
                            <option>Cash</option>
                            <option>Bank</option>
                            <option>Cheque</option>
                        </select>
                    </div>      
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addCollection')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            
            <x-jet-button class="ms-2" wire:click="addCollections" wire:loading.attr="disabled">
                {{ __('Add Collection') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
{{--------------------------------------------END COLLECTION MODAL ------------------------------------------------------------------------}} 


</div>
