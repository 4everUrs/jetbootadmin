<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Inventory') }}
        </h2>
    </x-slot>
    
    <div class="card">
        <div class="card-body">
            <a data-toggle="modal" data-target="#create" class="btn btn-success">Add new item
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
                            <button wire:click="update({{$item->id}})" data-toggle="modal" data-target="#update" class="btn btn-primary">Edit</button>
                            <button wire:click="delete({{$item->id}})" data-toggle="modal" data-target="#delete" class="btn btn-danger">Delete</button>
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
    <x-modal id="create" title="Add new Item" function="saveItem">
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
    </x-modal>

    <x-modal id="update" title="Update record" function="updateItem">
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
    </x-modal>

    <x-modal id="delete" title="Delete item" function="deleteItem">
        <h4>Are you sure to Delete this item?</h4>
    </x-modal>
</div>
