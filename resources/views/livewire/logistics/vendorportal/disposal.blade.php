<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Recieved Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Disposal">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Origin</th>
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Condition</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Price</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td class="text-center">{{$item->id}}</td>
                            <td class="text-center align-middle">{{$item->origin}}</td>
                            <td class="text-center align-middle">{{$item->item_name}}</td>
                            <td class="text-center align-middle">{{$item->condition}}</td>
                            <td class="text-center align-middle" style="width: 30%">{{$item->description}}</td>
                            <td class="text-center">{{$item->status}}</td>
                            <td class="text-center align-middle">@money($item->amount)</td>
                            <td>
                                <button wire:click="post({{$item->id}})" class="btn btn-primary btn-sm">Post to Shop</button>
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
