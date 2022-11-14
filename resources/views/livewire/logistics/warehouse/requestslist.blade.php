<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Requests Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <div class="dropdown">
                <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Request
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                   <button wire:click="$toggle('requestModal')" class="dropdown-item">Request new item</button>
                <button wire:click="$toggle('reOrderModal')" class="dropdown-item">Request Re-Order</button>
                </div>
            </div>
            
           <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
            <li class="nav-item mr-2" role="presentation" wire:ignore>
                <button class="nav-link active" id="recieved-tab" data-bs-toggle="tab" data-bs-target="#recieved" type="button"
                    role="tab" aria-controls="recieved" aria-selected="false">Recieved</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent" type="button"
                    role="tab" aria-controls="sent" aria-selected="false">Sent</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="recieved" role="tabpanel" aria-labelledby="recieved-tab" wire:ignore.self>
                <div class="card">
                    <div class="card-body">
                        
                        <x-table head="Request List Table">
                            <thead class="bg-info">
                                <th class="text-center align-middle">No.</th>
                                <th class="text-center align-middle">Origin</th>
                                <th class="text-center align-middle">Content</th>
                                <th class="text-center align-middle">Date</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($requests as $key => $request)
                                <tr>
                                    <td class="text-center">{{$key+1}}</td>
                                    <td class="text-center align-middle">{{$request->origin}}</td>
                                    <td class="text-center align-middle">{{$request->content}}</td>
                                    <td class="text-center">{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                                    <td class="text-center">{{$request->status}}</td>
                                    <td class="text-center">
                                        @if ($request->status == 'Pending')
                                            <button wire:click="confirm({{$request->id}})" class="btn btn-primary btn-sm">Confirm</button>
                                        @else
                                            @if ($request->status == 'Dispatched')
                                                <button wire:click="dispatch({{$request->id}})" class="btn btn-secondary btn-sm" disabled>Dispatch</button>
                                            @else
                                                <button wire:click="dispatch({{$request->id}})" class="btn btn-success btn-sm">Dispatch</button>
                                            @endif
                                            
                                        @endif
                                        
                                        
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Record Found!</td>
                                </tr>
                        
                                @endforelse
                            </tbody>
                        </x-table>
                        <div class="mt-3 float-right">
                            {{$requests->links()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab" wire:ignore.self>
                <div class="card">
                    <div class="card-body">
                        <x-table head="Sent Request">
                            <thead class="bg-info">
                                <th class="text-center align-middle">No.</th>
                                <th class="text-center align-middle">Category</th>
                                <th class="text-center align-middle">Destination</th>
                                <th class="text-center align-middle">Description</th>
                                <th class="text-center align-middle">Date</th>
                                <th class="text-center align-middle">Status</th>
                            </thead>
                            <tbody>
                                @forelse ($sents as $key => $sent)
                                    <tr>
                                        <td class="text-center">{{$key+1}}</td>
                                        <td class="text-center align-middle">{{$sent->category}}</td>
                                        <td class="text-center align-middle">Procurement</td>
                                        <td class="text-center align-middle">{{$sent->content}}</td>
                                        <td class="text-center">{{Carbon\Carbon::parse($sent->created_at)->toFormattedDateString()}}</td>
                                        <td class="text-center">{{$sent->status}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">No Record Found!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                        <div class="mt-3 float-right">
                            {{$sents->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

   <x-jet-dialog-modal wire:model="requestModal">
    <x-slot name="title">
        {{__('Send Request')}}
    </x-slot>
    <x-slot name="content">
        <div class="form-group">
            <label>Item Name</label>
            <input wire:model="item_name" class="form-control" type="text">
            <label>Stock Quantity</label>
            <input wire:model="item_qty" class="form-control" type="number">
            <label>Description</label>
            <textarea wire:model="content" class="form-control" rows="3"></textarea>
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
    <x-jet-dialog-modal wire:model="reOrderModal">
        <x-slot name="title">
            {{__('Send Re-Order')}}
        </x-slot>
        <x-slot name="content">
            <label>Supplier</label>
            <select wire:model="supplier" class="form-control">
                <option value="">Select Supplier</option>
                @forelse ($suppliers as $supplier)
                <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                @empty
                <option value="">No Supplier Found</option>
                @endforelse
            </select>
            <div class="form-group">
                <label>Select Item</label>
                <select wire:model="item" class="form-control">
                    <option value="">Select Supplier</option>
                    @forelse ($items as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @empty
                        <option value="">No Re-Order </option>
                    @endforelse
                </select>
                <label>Quantity</label>
                <input wire:model="quantity" type="text" class="form-control">
                <label>Description (Optional)</label>
                <textarea wire:model="content" class="form-control" rows="3"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('reOrderModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" id="createButton" wire:click="saveReorder" wire:loading.attr="disabled">

                {{ __('Send') }}
            </x-jet-button>
        </x-slot>
        </x-jet-dialog-modal>
        {{--Dispatch Modal--}}
        <x-jet-dialog-modal wire:model="dispatchModal">
            <x-slot name="title">
                {{__('Send Request')}}
            </x-slot>
            <x-slot name="content">
                <div class="form-group">
                    <label>Inventory</label>
                   <select wire:model="stock_id" class="form-control">
                    <option value="">Select Item</option>
                    @forelse ($inventories as $inventory)
                        <option value="{{$inventory->id}}">{{$inventory->name}}</option>
                    @empty
                        <option value="">No Item</option>
                    @endforelse
                   </select>
                   <label>Quantity</label>
                   <input type="number" class="form-control" wire:model="qty">
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('dispatchModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        
                <x-jet-button class="ms-2" id="createButton" wire:click="sendDispatch" wire:loading.attr="disabled">
        
                    {{ __('Send') }}
                </x-jet-button>
        
        
            </x-slot>
        </x-jet-dialog-modal>

    @push('scripts')
        <script>
            window.addEventListener('show-supplier', event => {
            var vendor = document.getElementById('supplier');
            var x = document.getElementById('quantity');
            x.classList.remove('d-none');
            vendor.classList.remove('d-none');
            })
        </script>
    @endpush
</div>
 