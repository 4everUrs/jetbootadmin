<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Invoices') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('createInvoice')" class="btn btn-dark btn-sm">+Create Invoice</button>
            <button wire:click="$toggle('sendInvoice')" class="btn btn-warning btn-sm">Send Invoice</button>
            <x-table head="Invoice">
                <thead class="bg-info">
                    <th class="text-center align-middle">Invoice ID</th>
                    <th class="text-center align-middle">Created By</th>
                    <th class="text-center align-middle">Date Created</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td class="text-center align-middle">{{$invoice->id}}</td>
                            <td class="text-center align-middle">{{$invoice->creator}}</td>
                            <td class="text-center align-middle">@date($invoice->created_at)</td>
                            <td class="text-center align-middle">
                                <button wire:click="loadModal({{$invoice->buyer_id}},{{$invoice->id}})" class="btn btn-dark btn-sm">View</button>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="createInvoice">
        <x-slot name="title">
            {{ __('Create Invoice') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Order</label>
                <select wire:model="order_id"  class="form-control">
                    <option value="">Select Order</option>
                    @foreach ($orders as $order)
                        <option value="{{$order->id}}">{{$order->order_id}} : {{$order->Order->OrderItem[0]->item_name}}</option>
                    @endforeach
                </select>
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('createInvoice')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="create" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="invoiceModal" maxWidth="lg">
        <x-slot name="title">
            {{ __('Create Invoice') }}
        </x-slot>
        <x-slot name="content">
            @livewire('logistics.assetmgmt.invoice-view')
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('invoiceModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="download" wire:loading.attr="disabled">
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="sendInvoice">
        <x-slot name="title">
            {{ __('Create Invoice') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Invoice File</label>
                <input wire:model="invoice_file" type="file" class="form-control">
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('sendInvoice')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="sendInvoice" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

</div>
