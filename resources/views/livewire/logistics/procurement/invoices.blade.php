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
                    <th class="text-center align-middle">Invoice Number</th>
                    <th class="text-center align-middle">Date Recieved</th>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td class="text-center align-middle">{{$invoice->id}}</td>
                            <td class="text-center align-middle">{{$invoice->Supplier->name}}</td>
                            <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$invoice->invoice_no}}" target="_blank" rel="noopener noreferrer">{{$invoice->invoice_no}}</a></td>
                            <td class="text-center align-middle">@date($invoice->created_at)</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>
