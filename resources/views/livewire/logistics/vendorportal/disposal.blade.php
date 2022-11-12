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
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Sold</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td class="text-center align-middle">{{$item->id}}</td>
                            <td class="text-center align-middle">{{$item->origin}}</td>
                            <td class="text-center align-middle">{{$item->item_name}}</td>
                            <td class="text-center align-middle">{{$item->condition}}</td>
                            <td class="text-center align-middle" style="width: 30%">{{$item->description}}</td>
                            <td class="text-center align-middle">{{$item->status}}</td>
                            <td class="text-center align-middle">@money($item->amount)</td>
                            <td class="text-center align-middle">{{$item->quantity}}</td>
                            <td class="text-center align-middle">{{$item->sold}}</td>
                            <td class="text-center align-middle">
                                @if ($item->status != 'Posted')
                                    <button wire:click="post({{$item->id}})" class="btn btn-primary btn-sm">Post to Shop</button>
                                @else
                                    <button wire:click="remove({{$item->id}})" class="btn btn-danger btn-sm">Remove</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="10">No Record Found!</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="postModal" maxWidth="lg">
        <x-slot name="title">
            {{__('Post to Shop')}}
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    @if (!empty($preview))
                    <div class="row">
                        <div class="col">
                            <img src="https://mnlph.nyc3.digitaloceanspaces.com/{{$preview->thumbnail}}" alt="" width="250px">
                        </div>
                        <div class="col">
                            <table class="table table-bordered">
                                <tr>
                                    <td>Item Name:</td>
                                    <td>{{$preview->item_name}}</td>
                                </tr>
                                <tr>
                                    <td>Item Condition:</td>
                                    <td>{{$preview->condition}}</td>
                                </tr>
                                <tr>
                                    <td>Description:</td>
                                    <td>{{$preview->description}}</td>
                                </tr>
                                <tr>
                                    <td>Price:</td>
                                    <td>{{$preview->amount}}</td>
                                </tr>
                                <tr>
                                    <td>Quantity:</td>
                                    <td>{{$preview->quantity}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>    
                    @endif
                   
                </div>
            </div>
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
