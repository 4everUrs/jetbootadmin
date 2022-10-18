<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="Reorder List">
                <thead class="bg-info">
                    <th>No</th>
                    <th>Supplier</th>
                    <th>Item Name</th>
                    <th>Description</th>
                    <th>Reorder Quantity</th>
                    <th>Price</th>
                    <th>Total Cost</th>
                    <th>Request Date</th>
                    <th>Completion Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @forelse ($reorders as $reorder)
                <tr>
                    <td>{{$reorder->id}}</td>
                    <td>{{$reorder->Supplier->name}}</td>
                    <td>{{$reorder->Stock->name}}</td>
                    <td>{{$reorder->Stock->description}}</td>
                    <td>{{$reorder->quantity}}</td>
                    <td>@money($reorder->price)</td>
                    <td>@money($reorder->price * $reorder->quantity)</td>
                    <td>{{Carbon\Carbon::parse($reorder->created_at)->toFormattedDateString()}}</td>
                    <td>{{$reorder->completion_date}}</td>
                    <td>{{$reorder->status}}</td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="11">No Record Found</td>
                </tr>
                @endforelse
                </tbody>
           </x-table>
        </div>
    </div>
</div>
