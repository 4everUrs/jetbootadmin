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
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Invoice File</th>
                    <th class="text-center align-middle">Date Recieved</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td class="text-center align-middle">{{$invoice->id}}</td>
                            <td class="text-center align-middle">{{$invoice->Bidder->name}}</td>
                            <td class="text-center align-middle">{{$invoice->post->item_name}}</td>
                            <td class="text-center align-middle">{{$invoice->post->quantity}}</td>
                            <td class="text-center align-middle"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$invoice->file_name}}" target="__blank">{{$invoice->file_name}}</a></td>
                            <td class="text-center align-middle">@date($invoice->created_at)</td>
                            <td class="text-center align-middle">
                                <button wire:click="download({{$invoice->id}}) " class="btn btn-primary btn-sm">Download</button>
                               <div wire:loading wire:target="download" class="spinner-border spinner-border-sm" role="status">
                                <span class="sr-only">Loading...</span>
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
</div>
