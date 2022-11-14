<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Vehicle Reservation') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Reservation Request">
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
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($reservations as $reserve)
                    <tr>
                        <td class="text-center align-middle">{{$reserve->id}}</td>
                        <td class="text-center align-middle">
                            @foreach ($reserve->Order->OrderItem as $item)
                            {{$item->item_name}}
                            @endforeach
                        </td>
                        <td class="text-center align-middle">
                            @foreach ($reserve->Order->OrderItem as $item)
                            {{$item->qty}}
                            @endforeach
                        </td>
                        <td class="text-center align-middle">{{$reserve->Buyer->address}}</td>
                        <td class="text-center align-middle">@date($reserve->created_at)</td>
                        @if(!empty($reserve->vehicle->brand))
                        
                        <td class="text-center align-middle">{{$reserve->vehicle->brand}} {{$reserve->vehicle->model}}</td>
                        <td class="text-center align-middle">{{$reserve->vehicle->plate}}</td>
                        <td class="text-center align-middle">{{$reserve->vehicle->driver_name}}</td>
                        @else
                        <td></td>
                        <td></td>
                        <td></td>
                        @endif
                        <td class="text-center align-middle">{{$reserve->status}}</td>
                        <td class="text-center align-middle">
                            <button wire:click="loadModal({{$reserve->id}})" class="btn btn-primary btn-sm">Approve</button>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="assignModal">
        <x-slot name="title">
            {{ __('Create new vehicle information') }}
        </x-slot>

        <x-slot name="content">
            <label>Vehicle</label>
            <select wire:model="selected_vehicle" class="form-control">
                <option value="">Choose..</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->brand}} {{$vehicle->model}}</option>
                @endforeach
            </select>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('assignModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" wire:click="assignVehicle" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
</div>