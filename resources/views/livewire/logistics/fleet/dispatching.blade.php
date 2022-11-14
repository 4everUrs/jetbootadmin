<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dispatching') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Orders">
                <thead class="bg-info">
                    <th class="text-center align-middle">Order ID</th>
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Destination</th>
                    <th class="text-center align-middle">Vehicle</th>
                    <th class="text-center align-middle">Plate</th>
                    <th class="text-center align-middle">Driver</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td class="text-center align-middle">{{$order->order_id}}</td>
                            <td class="text-center align-middle">
                                @foreach ($order->Order->OrderItem as $item)
                                    {{$item->item_name}}
                                @endforeach
                            </td>
                            <td class="text-center align-middle">
                                @foreach ($order->Order->OrderItem as $item)
                                    {{$item->qty}}
                                @endforeach
                            </td>
                            <td class="text-center align-middle">{{$order->address}}</td>
                            <td class="text-center align-middle">{{$order->ReservedVehicle->vehicle->brand}} {{$order->ReservedVehicle->vehicle->model}}</td>
                            <td class="text-center align-middle">{{$order->ReservedVehicle->vehicle->plate}}</td>
                            <td class="text-center align-middle">{{$order->ReservedVehicle->vehicle->driver_name}}</td>
                            <td class="text-center align-middle">{{$order->status}}</td>
                            <td class="text-center align-middle">
                                
                                @if ($order->status == 'transit')
                                    <button wire:click="deliver({{$order->id}})" class="btn btn-primary btn-sm">Delivered</button>
                                @elseif ($order->status == 'preparing')
                                    <button wire:click="dispatch({{$order->id}})" class="btn btn-success btn-sm">Dispatch</button>
                                @else
                                    <button wire:click="dispatch({{$order->id}})" class="btn btn-secondary btn-sm" disabled>Delivered</button>
                                @endif
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>