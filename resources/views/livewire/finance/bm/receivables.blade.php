<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Receivables') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="History of Company Income">

                <thead class="bg-secondary table-sm">
                    <th>Name</th>
                    <th>Account No.</th>
                    <th>Description</th>
                    <th>Particular</th>
                    <th>Reference #</th>
                    <th>Date Receive</th>
                    <th>Mode of Payment</th>
                    <th>Amount</th>
            </thead>

            <tbody>
                    @forelse($collects as $collect)
                        <tr>
                            <td>{{$collect->cname}}</td>
                            <td>{{$collect->caccountno}}</td>
                            <td>{{$collect->cdescription}}</td>
                            <td>{{$collect->cparticular}}</td>
                            <td>{{$collect->creference}}</td>
                            <td>{{$collect->cdatereceive}}</td>
                            <td>{{$collect->cmodeofpayment}}</td>
                            <td>@money($collect->camount)</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="8">"Unlisted Collection"</td>
                        </tr>
                    @endforelse
            </tbody>
            </x-table><br>
            <p class="text-right">&nbsp;&nbsp;Total:&nbsp;&nbsp; <label>@money($grandcollection)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> </p>

        </div>
    </div>
</div>