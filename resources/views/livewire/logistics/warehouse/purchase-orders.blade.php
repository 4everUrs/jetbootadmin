<div>
   <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Purchase Orders') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Purchase Orders">
                <thead class="bg-info">
                    <th>No.</th>
                    <th>Supplier Name.</th>
                    <th>Purchase Order ID.</th>
                    <th>Action</th>
                </thead>
                @forelse ($puchase_orders as $po)
                <tr>
                    <td>{{$po->id}}</td>
                    <td>{{$po->supplier_name}}</td>
                    <td><a href="#" wire:click="download({{$po->id}})">{{$po->po_id}}</a></td>
                    <td class="text-center">
                       <a class="btn btn-primary btn-sm" href="{{route('download',$po->id)}}">Download</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="4">No Record found!</td>
                </tr>
                @endforelse
            </x-table>
        </div>
    </div>
</div>
