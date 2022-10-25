<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Buyers') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Buyers List">
                <thead class="bg-info">
                    <th class="text-center align-middle">Recipient</th>
                    <th class="text-center align-middle">Email</th>
                    <th class="text-center align-middle">Phone</th>
                    <th class="text-center align-middle">Address</th>
                    <th class="text-center align-middle">Payment Method</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($buyers as $buyer)
                        <tr>
                            <td class="text-center align-middle">{{$buyer->recipient}}</td>
                            <td class="text-center align-middle">{{$buyer->email}}</td>
                            <td class="text-center align-middle">{{$buyer->phone}}</td>
                            <td class="text-center align-middle">{{$buyer->address}}</td>
                            <td class="text-center align-middle">{{$buyer->payment_method}}</td>
                            <td class="text-center">{{$buyer->status}}</td>
                            <td>
                                <button wire:click='loadModal({{$buyer->order_id}},{{$buyer->id}})' class="btn btn-dark btn-sm">View</button>
                            </td>
                        </tr>
                        
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">No Record</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="viewOrder" maxWidth="lg">
        <x-slot name="title">
            {{ __('Order Detail') }}
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    @if (!empty($buyerDetail))
                    <label>Shipping Information</label>
                    <table class="table">
                        <tr>
                            <td>
                                {{__('Recipient')}}
                            </td>
                            <td>
                                {{$buyerDetail->recipient}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{__('Address')}}
                            </td>
                            <td>
                                {{$buyerDetail->address}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{__('Email')}}
                            </td>
                            <td>
                                {{$buyerDetail->email}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{__('Phone')}}
                            </td>
                            <td>
                                {{$buyerDetail->phone}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{__('Status')}}
                            </td>
                            <td>
                                {{$buyerDetail->status}}
                            </td>
                        </tr>
                    </table>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>{{__('Change Status')}}</td>
                        <td>
                           <div class="input-group">
                            <div class="col">
                                <div class="form-check">
                                    <input value="confirmed" wire:model="status" class="form-check-input" type="radio">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Confirmed
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input value="preparing" wire:model="status" class="form-check-input" type="radio">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Preparing
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input value="shipping" wire:model="status" class="form-check-input" type="radio">
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        To Ship
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input value="transit" wire:model="status" class="form-check-input" type="radio">
                                    <label class="form-check-label" for="flexRadioDefault4">
                                        In Transit
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-check">
                                    <input value="delivered" wire:model="status" class="form-check-input" type="radio">
                                    <label class="form-check-label" for="flexRadioDefault5">
                                        Delivered
                                    </label>
                                </div>
                            </div>
                        </div>
                        </td>
                    </tr>
                </table>
                

            </div>
            <table class="table table-striped table-hovered">
                <thead>
                    <th>Qty</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Total Cost</th>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        @foreach ($order->OrderItem as $tmp)
                            <tr>
                                <td>{{$tmp->qty}}</td>
                                <td>{{$tmp->item_name}}</td>
                                <td>{{$tmp->amount}}</td>
                                <td>{{$tmp->amount * $tmp->qty}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('viewOrder')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="savePost" wire:loading.attr="disabled">
                {{ __('Save Post') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
