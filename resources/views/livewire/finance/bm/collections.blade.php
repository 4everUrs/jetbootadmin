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
                <th>Ammount Received</th>
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
        </x-table>

    </div>
</div>



{{-------------------------------------------- COLLECTION MODAL------------------------------------------------------------------------}} 
<x-jet-dialog-modal wire:model="addCollection" maxWidth="xl">
    <x-slot name="title">
        {{ __('Add Collection ') }}
    </x-slot>

    <x-slot name="content">
        <div class="form-group"> 
            <div class="row mb-4">
                <div class="col">
                    <label>Received From</label>
                    <input wire:model="rfrom" class="form-control" type="text">

                     <label>Address</label>
                     <input wire:model="address" class="form-control" type="text">
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
                        <option>Cheque</option><br>

                </div><br>

                <br><label>Remarks</label>
                <textarea wire:model="cremarks" placeholder=" ✎ 𝓘𝓷𝓹𝓾𝓽 𝓝𝓸𝓽𝓮𝓼..." class="form-control"></textarea>
                
            </div>
        </div>
</x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('addCollection')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        {{--wire:click function dito sa button hindi match sa function sa class--}}
        <x-jet-button class="ms-2" wire:click="addCollections" wire:loading.attr="disabled">
            {{ __('Add Collection') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
{{--------------------------------------------END COLLECTION MODAL ------------------------------------------------------------------------}} 

</div>
</div>
