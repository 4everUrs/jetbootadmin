<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Collection') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <a wire:click="tableCollection" class="btn btn-info btn-sm">Add Collection</a>
            <x-table head="History of Company Income">

                <thead class="bg-secondary table-sm">
                    <th>Name</th>
                    <th>Account No.</th>
                    <th>Description</th>
                    <th>Particular</th>
                    <th>Reference #</th>
                    <th>Date Receive</th>
                    <th>Mode of Payment</th>
                    <th>Amount</th>
            </thead>

            <tbody>
                    @forelse($collects as $collect)
                        <tr>
                            <td>{{$collect->cname}}</td>
                            <td>{{$collect->caccountno}}</td>
                            <td>{{$collect->cdescription}}</td>
                            <td>{{$collect->cparticular}}</td>
                            <td>{{$collect->creference}}</td>
                            <td>{{$collect->cdatereceive}}</td>
                            <td>{{$collect->cmodeofpayment}}</td>
                            <td>{{$collect->camount}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="8">"Unlisted Collection"</td>
                        </tr>
                    @endforelse
            </tbody>
            </x-table><br><br><br>

            

        </div>
    </div>



{{-------------------------------------------- COLLECTION MODAL------------------------------------------------------------------------}} 
    <x-jet-dialog-modal wire:model="addCollection" maxWidth="lg">
            <x-slot name="title">
                {{ __('Add Collection ') }}
            </x-slot>

        <x-slot name="content">
            <div class="form-group"> 
                <div class="row">
                    <div class="col">
                        <label>Name</label>
                        <input wire:model="cname" class="form-control" type="text">

                        <label>Account Number</label>
                        <input wire:model="caccountno" class="form-control" type="text">

                        <label>Description</label>
                        <textarea wire:model="cdescription" placeholder="✎ 𝓘𝓷𝓹𝓾𝓽 𝓝𝓸𝓽𝓮𝓼..." class="form-control"></textarea>
                    </div>

                    <div class="col">

                        <label>Particular</label>
                        <input wire:model="cparticular" class="form-control" type="text">

                        <label>Reference</label>
                        <input wire:model="creference" class="form-control" type="text">

                        <form action="/action_page.php">
                            <label for="datemin">Date Receive</label>
                            <input type="date" class="form-control" id="datemin" name="datemin" min="2022-01-02" max="2030-12-31" wire:model="cdatereceive">
                          </form>
         
                        <label>Mode of Payment</label>
                        <select wire:model="cmodeofpayment" class="form-control">
                            <option>Select Option</option>
                            <option>Cash</option>
                            <option>Bank</option>
                            <option>Cheque</option>
                        </select>

                        <label>Amount</label>
                        <input class="form-control" type="text" placeholder="₱ 0.00" wire:model="camount">
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
