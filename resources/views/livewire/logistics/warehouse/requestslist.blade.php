<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Requests Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('requestModal')" class="btn btn-primary btn-sm">Request for Item</button>
            <button wire:click="$toggle('disposeModal')" class="btn btn-dark btn-sm">Dispose Item</button>
            <button wire:click="$toggle('requestModal')" class="btn btn-warning btn-sm">Request for Delivery</button>
           <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item mr-2" role="presentation">
                <button class="nav-link active" id="recieved-tab" data-bs-toggle="tab" data-bs-target="#recieved" type="button"
                    role="tab" aria-controls="recieved" aria-selected="false">Recieved</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent" type="button"
                    role="tab" aria-controls="sent" aria-selected="false">Sent</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="recieved" role="tabpanel" aria-labelledby="recieved-tab">
                <x-table head="Request List Table">
                    <thead class="bg-info">
                        <th>No.</th>
                        <th>Origin</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @forelse ($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->origin}}</td>
                            <td>{{$request->content}}</td>
                            <td>{{$request->create_at}}</td>
                            <td>{{$request->status}}</td>
                
                        </tr>
                        @empty
                        <tr>
                            <td class="text-center" colspan="6">No Record Found Nigga!</td>
                        </tr>
                
                        @endforelse
                    </tbody>
                </x-table>
            </div>
            <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab">...</div>
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
                    <label>Additional Photo </label><button wire:click="addRow" class="btn btn-sm btn-success ml-2">Add Image</button>
                    @foreach ($fileCounter as $index => $count)
                    <div class="input-group mb-2">
                        <input wire:model="images.[{{$index}}]" type="file" class="form-control">
                        <div wire:loading wire:target="photo">Uploading...</div>
                        <button wire:click="removeRow({{$index}})" class="btn btn-sm btn-danger ml-2">Remove</button>
                        @error('images') <span class="text-danger">{{ $message }}</span><br> @enderror
                    </div>
                        
                    @endforeach

                </div>
                <div class="form-group" id="content">
                    
                    <label>Content</label>
                    <textarea wire:model="content" class="form-control"></textarea>
                    @error('content') <span class="text-danger">{{ $message }}</span><br> @enderror
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

   <x-jet-dialog-modal wire:model="requestModal">
    <x-slot name="title">
        {{__('Send Request')}}
    </x-slot>
    <x-slot name="content">
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Category</label>
                    <select wire:model="category" class="form-control">
                        <option value="New">New</option>
                        <option value="Re-Purchase">Re-Purchase</option>
                    </select>
                </div>
                <div class="col d-none" id="supplier">
                    <label>Category</label>
                    <select class="form-control">
                        <option value="New">New</option>
                        <option value="Re-Purchase">Re-Purchase</option>
                    </select>
                </div>
            </div>
            <label>Request Content</label>
            <textarea wire:model="content" class="form-control" rows="5"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span><br> @enderror
        </div>
    </x-slot>
    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('requestModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ms-2" id="createButton" wire:click="saveRequest" wire:loading.attr="disabled">

            {{ __('Send') }}
        </x-jet-button>


    </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')
        <script>
            window.addEventListener('show-supplier', event => {
            var vendor = document.getElementById('supplier');
            vendor.classList.remove('d-none');
            })
        </script>
    @endpush
</div>
