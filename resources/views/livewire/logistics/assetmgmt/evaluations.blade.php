<div>
   <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Asset Evaluations') }}
        </h2>
    </x-slot>   
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('disposeModal')" class="btn btn-primary btn-sm">Evaluate Asset</button>
            <button wire:click="$toggle('disposeModal')" class="btn btn-dark btn-sm">Dispose Item</button>
            <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                <li class="nav-item mr-2" role="presentation">
                    <button class="nav-link active" id="appreciating-tab" data-bs-toggle="tab" data-bs-target="#appreciating" type="button"
                        role="tab" aria-controls="appreciating" aria-selected="true">Appreciating</button>
                </li>
                <li class="nav-item mr-2" role="presentation">
                    <button class="nav-link" id="depreciating-tab" data-bs-toggle="tab" data-bs-target="#depreciating" type="button"
                        role="tab" aria-controls="depreciating" aria-selected="false">Depreciating</button>
                </li>
                <li class="nav-item mr-2" role="presentation">
                    <button class="nav-link" id="disposal-tab" data-bs-toggle="tab" data-bs-target="#disposal" type="button"
                        role="tab" aria-controls="disposal" aria-selected="false">Disposal</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appreciating" role="tabpanel" aria-labelledby="appreciating-tab">
                    <div class="card">
                        <div class="card-body">
                            <x-table head="Asset List">
                                <thead class="bg-info">
                                    <th class="text-center align-middle">No.</th>
                                    <th class="text-center align-middle">Type</th>
                                    <th class="text-center align-middle">Name</th>
                                    <th class="text-center align-middle">Initial Value</th>
                                    <th class="text-center align-middle">Current Value</th>
                                    <th class="text-center align-middle">Appreciation %</th>
                                </thead>
                            </x-table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="depreciating" role="tabpanel" aria-labelledby="depreciating-tab">
                    <div class="card">
                        <div class="card-body">
                            <x-table head="Asset List">
                                <thead class="bg-info">
                                    <th class="text-center align-middle">No.</th>
                                    <th class="text-center align-middle">Type</th>
                                    <th class="text-center align-middle">Name</th>
                                    <th class="text-center align-middle">Initial Value</th>
                                    <th class="text-center align-middle">Current Value</th>
                                    <th class="text-center align-middle">Depreciation %</th>
                                </thead>
                            </x-table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="disposal" role="tabpanel" aria-labelledby="disposal-tab">
                    <div class="card">
                        <div class="card-body">
                           <x-table head="Disposal">
                            <thead class="bg-info">
                                <th class="text-center align-middle">No.</th>
                                <th class="text-center align-middle">Origin</th>
                                <th class="text-center align-middle">Item Name</th>
                                <th class="text-center align-middle">Condition</th>
                                <th class="text-center align-middle">Description</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Price</th>
                            
                            </thead>
                            <tbody>
                                @forelse ($items as $key => $item)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td class="text-center align-middle">{{$item->origin}}</td>
                                    <td class="text-center align-middle">{{$item->item_name}}</td>
                                    <td class="text-center align-middle">{{$item->condition}}</td>
                                    <td class="text-center align-middle" style="width: 30%">{{$item->description}}</td>
                                    <td class="text-center">{{$item->status}}</td>
                                    <td class="text-center align-middle">@money($item->amount)</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="8">No Record Found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="disposeModal">
        <x-slot name="title">
            {{__('Send Request')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <div class="form-group" id="vendor">
                    <label>Item</label>
                    <input wire:model="item_name" type="text" class="form-control">
                    @error('item') <span class="text-danger">{{ $message }}</span><br> @enderror
                    <label>Condition</label>
                    <div class="input-group">
                        <div class="col">
                            <div class="form-check">
                                <input value="Brand New" wire:model="condition" class="form-check-input" type="radio">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Brand New
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input value="Used" wire:model="condition" class="form-check-input" type="radio">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Used
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-check">
                                <input value="Damaged" wire:model="condition" class="form-check-input" type="radio">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Damaged
                                </label>
                            </div>
                        </div>
                    </div>
    
    
                    @error('condition') <span class="text-danger">{{ $message }}</span><br> @enderror
                    <label>Description</label>
                    <textarea wire:model="description" class="form-control"></textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span><br> @enderror
                    <label>Amount</label>
                    <input wire:model="amount" type="number" class="form-control mb-3">
                    @error('amount') <span class="text-danger">{{ $message }}</span><br> @enderror
                    <label>Thumbnail Image</label>
                    <input wire:model="thumbnail" type="file" class="form-control mb-3">
                    <label>Additional Photo </label><button wire:click="addRow" class="btn btn-sm btn-success ml-2">Add
                        Image</button>
                    @foreach ($fileCounter as $index => $count)
                    <div class="input-group mb-2">
                        <input wire:model="images.[{{$index}}]" type="file" class="form-control">
                        <div wire:loading wire:target="photo">Uploading...</div>
                        <button wire:click="removeRow({{$index}})" class="btn btn-sm btn-danger ml-2">Remove</button>
                        @error('images') <span class="text-danger">{{ $message }}</span><br> @enderror
                    </div>
    
                    @endforeach
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('disposeModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" id="createButton" wire:click="saveDisposal" wire:loading.attr="disabled">
    
                {{ __('Send') }}
            </x-jet-button>
    
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
