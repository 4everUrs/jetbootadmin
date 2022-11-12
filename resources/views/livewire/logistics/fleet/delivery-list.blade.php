<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Delivery Request') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('requestItem')" class="btn btn-dark btn-sm">+Create Request</button>
            <x-table head="Requests">
                <thead class="bg-info">
                    <th class="text-center align-middle">Order ID</th>
                    <th class="text-center align-middle">Items</th>
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Reciepient</th>
                    <th class="text-center align-middle">Address</th>
                    <th class="text-center align-middle">Invoice</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($requests as $req)
                    <tr>
                        <td class="text-center align-middle">{{$req->order_id}}</td>
                            <td class="text-center align-middle">
                                @foreach ($req->Order->OrderItem as $item)
                                    <li>{{$item->item_name}}</li>
                                @endforeach
                            </td>
                        <td class="text-center align-middle">
                            @foreach ($req->Order->OrderItem as $item)
                                <li>{{$item->qty}}</li>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">{{$req->buyer->recipient}}</td>
                        <td class="text-center align-middle">{{$req->buyer->address}}</td>
                        <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$req->invoice_file}}" target="__blank">{{$req->invoice_file}}</a></td>
                        <td class="text-center align-middle">{{$req->status}}</td>
                        <td class="text-center align-middle">
                           @if ($req->status == 'Approved')
                               <button wire:click="approve({{$req->id}})" class="btn btn-secondary btn-sm" disabled>Approve</button>
                           @else
                               <button wire:click="approve({{$req->id}})" class="btn btn-primary btn-sm" >Approve</button>
                           @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">No record found</td>
                    </tr>
                    @endforelse
                </tbody>
            </x-table>
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
