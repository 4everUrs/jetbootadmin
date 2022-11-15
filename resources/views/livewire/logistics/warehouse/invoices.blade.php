<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Invoice List">
                <thead class="bg-info">
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Supplier Name</th>
                    <th class="text-center align-middle">Purchase Order No</th>
                    <th class="text-center align-middle">Invoice No</th>
                    <th class="text-center align-middle">Invoice File</th>
                    <th class="text-center align-middle">Date Recieved</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td class="text-center align-middle">{{$invoice->id}}</td>
                            <td class="text-center align-middle">{{$invoice->Supplier->name}}</td>
                            <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$invoice->file_name}}" target="_blank" rel="noopener noreferrer">{{$invoice->po_id}}</a></td>
                            <td class="text-center align-middle">{{$invoice->invoice_no}}</td>
                            <td class="text-center align-middle">
                                @if (empty($invoice->invoice_file))
                                    <button wire:click="uploadInvoice({{$invoice->id}})" class="btn btn-dark btn">Upload</button>
                                @else
                                    <a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$invoice->invoice_file}}" target="_blank"
                                        rel="noopener noreferrer">{{$invoice->invoice_file}}</a>
                                @endif
                            </td>
                            <td class="text-center align-middle">@date($invoice->created_at)</td>
                            <td class="text-center align-middle">
                               @if ($invoice->status != 'Done')
                                   <button wire:click="download({{$invoice->id}}) " class="btn btn-primary btn-sm">Send</button>
                                    <div wire:loading wire:target="download" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>
                               @else
                                     <button wire:click="download({{$invoice->id}}) " class="btn btn-secondary btn-sm" disabled>Sent</button>
                                    <div wire:loading wire:target="download" class="spinner-border spinner-border-sm" role="status">
                                        <span class="sr-only">Loading...</span>   
                               @endif
                            </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="invoiceModal">
        <x-slot name="title">
            {{__('Send Purchase Order')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Invoice No</label>
                <input wire:model="invoice_no" type="text" class="form-control">
                <label>Invoice File</label>
                <input wire:model="invoice_file" type="file" class="form-control">
                @error('invoice_file') <span class="error">{{ $message }}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('invoiceModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="upload" class="ms-2" id="createButton" wire:loading.attr="disabled">
                {{ __('Upload') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
