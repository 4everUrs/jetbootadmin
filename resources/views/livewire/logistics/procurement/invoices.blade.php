<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Invoices') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Invoice List">
                <thead class="bg-info">
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Supplier Name</th>
                    <th class="text-center align-middle">Invoice File</th>
                    <th class="text-center align-middle">Date Recieved</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td class="text-center align-middle">{{$invoice->invoice_id}}</td>
                            <td class="text-center align-middle">{{$invoice->company_name}}</td>
                            <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$invoice->file_name}}" target="__blank">{{$invoice->file_name}}</a></td>
                            <td class="text-center align-middle">@date($invoice->created_at)</td>
                            <td class="text-center align-middle">
                               @if ($invoice->status != 'Sent')
                                   <button wire:click="sendInvoice({{$invoice->id}})" class="btn btn-primary btn-sm">Send</button>
                               @else
                                   <button wire:click="sendInvoice({{$invoice->id}})" class="btn btn-secondary btn-sm" disabled>Sent</button>
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
