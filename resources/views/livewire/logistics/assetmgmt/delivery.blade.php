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
                <select class="form-control">
                    <option value="">Select Order</option>
                    @foreach ($orders as $order)
                        <option value="{{$order->id}}">{{$order->order_id}} : {{$order->Order->OrderItem[0]->item_name}}</option>
                    @endforeach
                </select>
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
