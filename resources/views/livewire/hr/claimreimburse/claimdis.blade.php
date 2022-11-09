<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Claim And Reimbursement') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Claim And Reimbursement">
                <thead class = "bg-info">
                    <th>No.</th>
                    <th>Item</th>
                    <th>Purchase Date</th>
                    <th>Purchase By</th>
                    <th>Amount</th>
                    <th>Paid By</th>
                    <th>Status</th>
                    <th>View</th>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->item}}</td>
                            <td>{{$data->purchasedate}}</td>
                            <td>{{$data->purchaseby}}</td>
                            <td>{{$data->amount}}</td>
                            <td>{{$data->paidby}}</td>
                            <td>{{$data->status}}</td>
                            <td>
                                <button wire:click="delete({{$data->id}})" class="btn btn-secondary">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{$datas->links()}}
     </div>
</div>
</div>