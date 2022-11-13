<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Delivery Request') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
        <button wire:click="$toggle('requestForm')" class="btn btn-dark btn-sm">Request Delivery</button>
            <x-table head="Delivery">
                <thead class="bg-info">
                    <th class="text-center align-middle">Order ID</th>
                    <th class="text-center align-middle">Items</th>
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Reciepient</th>
                    <th class="text-center align-middle">Address</th>
                    <th class="text-center align-middle">Status</th>
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
                            <td class="text-center align-middle">{{$req->status}}</td>
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
    <x-jet-dialog-modal wire:model="requestForm" maxWidth="md">
        <x-slot name="title">
            {{ __('Delivery Request Form') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group">
                <label>Order</label>
                <select wire:model="order_id" class="form-control">
                    <option value="">Select Order</option>
                    @foreach ($orders as $order)
                        <option value="{{$order->id}}">{{$order->order_id}} : {{$order->Order->OrderItem[0]->item_name}}</option>
                    @endforeach
                </select>
                <label>Invoice ID</label>
                <input wire:model="invoice_id" type="number" class="form-control" placeholder="INV">
                <label>Attach Invoice</label>
                <input wire:model="invoice_file" type="file" class="form-control">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('requestForm')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendRequest" wire:loading.attr="disabled">
                {{ __('Send Request') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
</div>
