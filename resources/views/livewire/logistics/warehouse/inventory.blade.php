<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Inventory') }}
        </h2>
    </x-slot>
    <div  class="card ">
        <div class="card-body">
            {{--show modal--}}
            <a wire:click="loadModal" class="btn btn-success">Add new item
                <i class="fas fa-box nav-icon"></i>
            </a>

            <x-table head="Inventory">
                <thead>
                    <th>No</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->status}}</td>
                        <td class="text-center">
                            <button wire:click="update({{$item->id}})" class="btn btn-primary">Edit</button>
                            <button wire:click="delete({{$item->id}})" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No record found</td>
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
    <x-jet-dialog-modal wire:model="addItem">

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
