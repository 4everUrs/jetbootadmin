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
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Supplier</th>
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Reorder Quantity</th>
                    <th class="text-center align-middle">Price</th>
                    <th class="text-center align-middle">Total Cost</th>
                    <th class="text-center align-middle">Request Date</th>
                    <th class="text-center align-middle">Completion Date</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                @forelse ($reorders as $key => $reorder)
                <tr>
                    <td class="text-center">{{$key+1}}</td>
                    <td class="text-center align-middle">{{$reorder->Supplier->name}}</td>
                    <td class="text-center align-middle">{{$reorder->Stock->name}}</td>
                    <td class="text-center align-middle">{{$reorder->Stock->description}}</td>
                    <td class="text-center align-middle">{{$reorder->quantity}}</td>
                    <td class="text-center align-middle">@money($reorder->price)</td>
                    <td class="text-center align-middle">@money($reorder->price * $reorder->quantity)</td>
                    <td class="text-center align-middle">{{Carbon\Carbon::parse($reorder->created_at)->toFormattedDateString()}}</td>
                    <td class="text-center">{{$reorder->completion_date}}</td>
                    <td class="text-center">{{$reorder->status}}</td>
                    <td>
                        <button wire:click="approve({{$reorder->id}})" class="btn btn-sm btn-success">Approve</button>
                    </td>
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
