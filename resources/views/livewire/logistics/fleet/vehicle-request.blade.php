<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle Request List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('reserveVehicle')" class="btn btn-dark btn-sm">Request Vehicle</button>
           <x-table head="Vehicle Request List">
                <thead class="bg-info">
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Destination</th>
                    <th class="text-center align-middle">Request Date</th>
                    <th class="text-center align-middle">Reserve Vehicle</th>
                    <th class="text-center align-middle">Plate No.</th>
                    <th class="text-center align-middle">Assigned Driver</th>
                    <th class="text-center align-middle">Status</th>
                </thead>
                <tbody>
                    @forelse ($reservations as $reserve)
                        <td class="text-center align-middle">{{$reserve->id}}</td>
                        <td class="text-center align-middle">
                            @foreach ($reserve->Order->OrderItem as $item)
                                <li>{{$item->item_name}}</li>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            @foreach ($reserve->Order->OrderItem as $item)
                            <li>{{$item->qty}}</li>
                            @endforeach
                        </td>
                        <td class="text-center align-middle">{{$reserve->Buyer->address}}</td>
                        <td class="text-center align-middle">@date($reserve->created_at)</td>
                        <td class="text-center align-middle">{{$reserve->id}}</td>
                        <td class="text-center align-middle">{{$reserve->id}}</td>
                        <td class="text-center align-middle">{{$reserve->id}}</td>
                    @empty
                        
                    @endforelse
                </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="reserveVehicle">

            <x-slot name="title">
                {{ __('Send a Request') }}
            </x-slot>

            <x-slot name="content">
                <div class="form-group">
                    <label>Select Order</label>
                    <select wire:model="selected_id" class="form-control">
                        <option value="">Choose...</option>
                        @foreach ($orders as $order)
                            <option value="{{$order->id}}">{{$order->order_id}}: {{$order->Order->OrderItem[0]->item_name}}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot>
        
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('reserveVehicle')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        
                <x-jet-button class="ms-2" wire:click="requestVehicle" wire:loading.attr="disabled">
                    {{ __('Submit') }}
                </x-jet-button>
            </x-slot>
        
        </x-jet-dialog-modal>
</div>
