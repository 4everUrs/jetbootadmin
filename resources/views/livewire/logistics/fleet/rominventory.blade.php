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
                                <th>Item ID</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Inventory Value</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse ($inventories as $inventory)
                                    <tr>
                                        <td>{{$inventory->id}}</td>
                                        <td>{{$inventory->item_name}}</td>
                                        <td>{{$inventory->description}}</td>
                                        <td>{{$inventory->quantity}}</td>
                                        <td>@money($inventory->unit_price)</td>
                                        <td>@money($inventory->inventory_value)</td>
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
                                <th>No.</th>
                                <th>Destination</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Status</th>
                               
                            </thead>
                            <tbody>
                                @forelse ($requests as $request)
                                <tr>
                                    <td>{{$request->id}}</td>
                                    <td>Warehouse</td>
                                    <td>{{$request->content}}</td>
                                    <td>{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                                    <td>{{$request->status}}</td>
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
