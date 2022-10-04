<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Requests Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <a  wire:click="showModal"class="btn btn-primary">Send Request</a>
            
            <img src="" alt="">
            <x-table head="Request List Table">
                <thead>
                    <th>No.</th>
                    <th>From</th>
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
    </div>

    

   <x-jet-dialog-modal wire:model="requestModal">
        <x-slot name="title">
            {{__('Send Request')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Send to:</label>
                <select wire:model="destination" class="form-control">
                    <option>Select Destination</option>
                    <option value="1">Procurement</option>
                    <option value="2">Fleet Management</option>
                    <option value="3">Vendor Portal</option>
                </select>
                <div class="form-group d-none" id="vendor">
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
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('requestModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        
            <x-jet-button class="ms-2" id="createButton" wire:click="saveItem" wire:loading.attr="disabled">

                {{ __('Send') }}
            </x-jet-button>
            
        
        </x-slot>
   </x-jet-dialog-modal>
</div>
