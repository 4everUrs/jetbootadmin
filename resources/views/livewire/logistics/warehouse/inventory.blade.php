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
                <thead class="bg-info">
                    <th class="text-center align-middle">Item No</th>
                    <th class="text-center align-middle">Name</th>
                    <th class="text-center align-middle">Supplier</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Cost per item</th>
                    <th class="text-center align-middle">Stock<br>Quantity</th>
                    <th class="text-center align-middle">Inventory<br>Value</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Discontinued?</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td class="text-center align-middle">{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->supplier->name}}</td>
                        <td>{{$item->description}}</td>
                        <td class="text-center align-middle">@money($item->cost_per_item)</td>
                        <td class="text-center align-middle">{{$item->stock_quantity}}</td>
                        <td class="text-center align-middle">@money($item->stock_value)</td>
                        <td class="text-center align-middle">{{$item->status}}</td>
                        <td class="text-center align-middle">{{$item->remarks}}</td>
                        <td class="text-center align-middle">
                            <button wire:click="update({{$item->id}})" class="btn btn-primary btn-sm">Update</button>
                            <button wire:click="delete({{$item->id}})" class="btn btn-danger btn-sm">Delete</button>
                            <button wire:click="restock({{$item->id}})" class="btn btn-info btn-sm">Restock</button>
                        </td>
                       
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="10">No record found</td>
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
                <div class="form-group">
                    <label>Code</label>
                    <input type="text" class="form-control" wire:model="code">
                    @error('code') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                    <label>Description</label>
                    <input type="text" class="form-control" wire:model="description">
                    @error('description') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                    <label>Quantity</label>
                    <input type="number" class="form-control" wire:model="quantity">
                    @error('quantity') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('update')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ms-2" wire:click="updateItem" wire:loading.attr="disabled">
                    {{ __('Update Item') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

    {{--Delete Modal--}}
    <x-jet-dialog-modal wire:model="deleteModal">
            <x-slot name="title">
                {{ __('Delete item') }}
            </x-slot>
            <x-slot name="content">
                <h4>Are you sure to Delete this item?</h4>
            </x-slot>
            
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('deleteModal')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
            
                <x-jet-button class="ms-2" wire:click="deleteModal" wire:loading.attr="disabled">
                    {{ __('Yes') }}
                </x-jet-button>
            </x-slot>
    </x-jet-dialog-modal>
</div>
