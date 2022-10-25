<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Inventory') }}
        </h2>
    </x-slot>
    <div  class="card ">
        <div class="card-body">
            {{--show modal--}}
            <a wire:click="loadModal" class="btn btn-dark btn-sm">Add new item
            </a>
            
            <x-table head="Inventory" >
                <tr class="bg-info">
                    <th class="text-center align-middle">Item No</th>
                    <th class="text-center align-middle">Name</th>
                    <th class="text-center align-middle">Supplier</th>
                    <th class="text-center align-middle" style="width: 20%">Description</th>
                    <th class="text-center align-middle">Cost per item</th>
                    <th class="text-center align-middle">Stock<br>Quantity</th>
                    <th class="text-center align-middle">Inventory<br>Value</th>
                    <th class="text-center align-middle">Reorder<br>Level</th>
                    <th class="text-center align-middle">Reorder<br>Quantity</th>
                    <th class="text-center align-middle">Days per<br>Reorder</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Discontinued?</th>
                    <th class="text-center align-middle">Action</th>
                </tr>
                <tbody>
                    @forelse ($items as $item)
                        @if ($item->status == 'OK')
                            <tr>
                                <td class="text-center align-middle">IN{{$item->id}}</td>
                                <td class="align-middle">{{$item->name}}</td>
                                <td class="align-middle">{{$item->supplier->name}}</td>
                                <td class="align-middle">{{$item->description}}</td>
                                <td class="text-center align-middle">@money($item->cost_per_item)</td>
                                <td class="text-center align-middle">{{$item->stock_quantity}}</td>
                                <td class="text-center align-middle">@money($item->stock_value)</td>
                                <td class="text-center align-middle">{{$item->reorder_level}}</td>
                                <td class="text-center align-middle">{{$item->reorder_quantity}}</td>
                                <td class="text-center align-middle">{{$item->reorder_days}} Days</td>
                                <td class="text-center align-middle">{{$item->status}}</td>
                                <td class="text-center align-middle">{{$item->remarks}}</td>
                                <td class="text-center align-middle">
                                    <button wire:click="update({{$item->id}})" class="btn btn-primary btn-sm">Update</button>
                                </td>
                            </tr>
                        @elseif ($item->status == 'LOW')
                            <tr class="bg-danger">
                                <td class="text-center align-middle">IN{{$item->id}}</td>
                             <td class="align-middle">{{$item->name}}</td>
                                <td class="align-middle">{{$item->supplier->name}}</td>
                                <td class="align-middle">{{$item->description}}</td>
                                <td class="text-center align-middle">@money($item->cost_per_item)</td>
                                <td class="text-center align-middle">{{$item->stock_quantity}}</td>
                                <td class="text-center align-middle">@money($item->stock_value)</td>
                                <td class="text-center align-middle">{{$item->reorder_level}}</td>
                                <td class="text-center align-middle">{{$item->reorder_quantity}}</td>
                                <td class="text-center align-middle">{{$item->reorder_days}} Days</td>
                                <td class="text-center align-middle">{{$item->status}}</td>
                                <td class="text-center align-middle">{{$item->remarks}}</td>
                                <td class="text-center align-middle">
                                    <button wire:click="update({{$item->id}})" class="btn btn-primary btn-sm">Update</button>
                                </td>
                            </tr>    
                        @endif
                    @empty
                        <tr>
                            <td class="text-center" colspan="13">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            <div class="mt-3 float-right">
                {{$items->links()}}
            </div>
        </div>
    </div>
    {{--Create Modal--}}
    <x-jet-dialog-modal wire:model="addItem" maxWidth="md">
    
        <x-slot name="title">
            {{ __('Add new item') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group">
                <label>Manufacturer</label>
                <select wire:model="manufacturer" class="form-control">
                    <option value="">Select Option</option>
                    @forelse ($suppliers as $supplier)
                    <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                    @empty
                    <option value="">No Supplier found</option>
                    @endforelse
                </select>
                @error('manufacturer') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Item Name</label>
                <input wire:model="name" type="text" class="form-control">
                @error('name') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
    
                <label>Description</label>
                <textarea wire:model="description" class="form-control" rows="3"></textarea>
                @error('description') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Cost per item</label>
                <input wire:model="cost_per_item" type="text" class="form-control">
                @error('cost_per_item') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Quantity</label>
                <input wire:model="stock_quantity" type="number" class="form-control">
                @error('stock_quantity') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Reorder Level</label>
                <input wire:model="reorder_level" type="number" class="form-control">
                @error('reorder_level') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Reorder Quantity</label>
                <input wire:model="reorder_quantity" type="number" class="form-control">
                @error('reorder_quantity') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <label>Days per Reorder</label>
                <input wire:model="reorder_days" type="number" class="form-control">
                @error('reorder_days') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addItem')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveItem" wire:loading.attr="disabled">
                {{ __('add new Item') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    
    {{--Update Modal--}}
    <x-jet-dialog-modal wire:model="updateModal">
        <x-slot name="title">
            {{ __('Add new item') }}
        </x-slot>
        <x-slot name="content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link active" id="add-tab" data-bs-toggle="tab" data-bs-target="#add" type="button"
                        role="tab" aria-controls="add" aria-selected="true">Add Quantity</button>
                </li>
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link" id="subtract-tab" data-bs-toggle="tab" data-bs-target="#subtract" type="button"
                        role="tab" aria-controls="subtract" aria-selected="false">Subtract</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div wire:ignore.self class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
                    <div class="card">
                        <div class="card-body">
                           <label>Add Quantity</label>
                            <input type="number" class="form-control" wire:model="add">
                            @error('qty') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                        </div>
                    </div>
                </div>
                <div wire:ignore.self class="tab-pane fade" id="subtract" role="tabpanel" aria-labelledby="subtract-tab">
                    <div class="card">
                        <div class="card-body">
                            <label>Subtract Quantity</label>
                            <input type="number" class="form-control" wire:model="sub">
                            @error('qty') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                        </div>
                    </div>
                </div>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('updateModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="updateItem" wire:loading.attr="disabled">
                {{ __('Update Item') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
