<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Collection') }}
        </h2>
    </x-slot>
<div class="card">
    <div class="card-body">
        <a wire:click="tableReceivable" class="btn btn-secondary btn-sm">Add Account Receivable</a>
        <x-table head="History of Company Income">

            <thead class="bg-secondary table-sm">
                <th>ID</th>
                <th>Date</th>
                <th>Received From</th>
                <th>Address</th>
                <th>Ammount Received</th>
                <th>Receipt no.</th>
                <th>Payment Type</th>
                <th>Remarks</th>
           </thead>

           <tbody>
                @forelse($collects as $collect)
                    <tr>
                        <td>{{$collect->id}}</td>
                        <td>{{$collect->created_at}}</td>
                        <td>{{$collect->rfrom}}</td>
                        <td>{{$collect->address}}</td>
                        <td>{{$collect->cramount}}</td>
                        <td>{{$collect->receiptno}}</td>
                        <td>{{$collect->paytype}}</td>
                        <td>{{$collect->cremarks}}</td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="8">"Unlisted Collection"</td>
                    </tr>
                @endforelse
           </tbody>

        </x-table>

    </div>
</div>




</div>
