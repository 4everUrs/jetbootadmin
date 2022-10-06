<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Recieved Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Disposal">
                <thead>
                    <th>No.</th>
                    <th>Origin</th>
                    <th>Item Name</th>
                    <th>Condition</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Price</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->origin}}</td>
                            <td>{{$item->item_name}}</td>
                            <td>{{$item->condition}}</td>
                            <td style="width: 30%">{{$item->description}}</td>
                            <td>{{$item->status}}</td>
                            <td>{{$item->amount}}</td>
                            <td>
                                <button wire:click="post({{$item->id}})" class="btn btn-primary">Post to Shop</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="8">No Record Found Nigga!</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="postModal">
        <x-slot name="title">
            {{__('Post to Shop')}}
        </x-slot>
        <x-slot name="content">
            {{__('Are you sure?')}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('postModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" id="createButton" wire:click="listPost" wire:loading.attr="disabled">
                {{ __('Send') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
