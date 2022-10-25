<div>
<x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('MRO Inventory') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('requestItem')" class="btn btn-dark btn-sm">Request Item</button>
           <ul class="nav nav-tabs mt-2" id="myTab" role="tablist">
            <li class="nav-item mr-2" role="presentation">
                <button class="nav-link active" id="inventory-tab" data-bs-toggle="tab" data-bs-target="#inventory" type="button"
                    role="tab" aria-controls="inventory" aria-selected="true">Inventory</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="request-tab" data-bs-toggle="tab" data-bs-target="#request" type="button"
                    role="tab" aria-controls="request" aria-selected="false">Requests</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="inventory" role="tabpanel" aria-labelledby="inventory-tab">
                <div class="card">
                    <div class="card-body">
                       <x-table head="Inventory List">
                            <thead class="bg-info">
                                <th class="text-center align-middle">Item ID</th>
                                <th class="text-center align-middle">Item Name</th>
                                <th class="text-center align-middle">Description</th>
                                <th class="text-center align-middle">Quantity</th>
                                <th class="text-center align-middle">Unit Price</th>
                                <th class="text-center align-middle">Inventory Value</th>
                                <th class="text-center align-middle">Action</th>
                            </thead>
                            <tbody>
                                @forelse ($inventories as $inventory)
                                    <tr>
                                        <td class="text-center">{{$inventory->id}}</td>
                                        <td class="text-center align-middle">{{$inventory->item_name}}</td>
                                        <td class="text-center align-middle">{{$inventory->description}}</td>
                                        <td class="text-center align-middle">{{$inventory->quantity}}</td>
                                        <td class="text-center align-middle">@money($inventory->unit_price)</td>
                                        <td class="text-center align-middle">@money($inventory->inventory_value)</td>
                                        <td class="text-center">
                                            <button class="btn btn-dark btn-sm">Restock</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">No Record Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </x-table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="request" role="tabpanel" aria-labelledby="request-tab">
                <div class="card">
                    <div class="card-body">
                        <x-table head="Request List Table">
                            <thead class="bg-info">
                                <th class="text-center align-middle">No.</th>
                                <th class="text-center align-middle">Destination</th>
                                <th class="text-center align-middle">Content</th>
                                <th class="text-center align-middle">Date</th>
                                <th class="text-center align-middle">Status</th>
                               
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                <tr>
                                    <td class="text-center">{{$request->id}}</td>
                                    <td class="text-center align-middle">Warehouse</td>
                                    <td class="text-center align-middle">{{$request->content}}</td>
                                    <td class="text-center">{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                                    <td class="text-center">{{$request->status}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="5">No Record Found!</td>
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
    <x-jet-dialog-modal wire:model="requestItem">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>
    
        <x-slot name="content">
           <label>Content</label>
           <textarea wire:model="content" class="form-control" rows="4"></textarea>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('requestItem')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendRequest" wire:loading.attr="disabled">
                {{ __('Send Request') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
</div>
