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
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Supplier Name</th>
                    <th class="text-center align-middle">Invoice No</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                @forelse ($puchase_orders as $po)
                <tr>
                    <td class="text-center">{{$po->id}}</td>
                    <td class="text-center align-middle">{{$po->supplier_name}}</td>
                    <td class="text-center align-middle"><a href="{{route('download',$po->id)}}" target="__blank">{{$po->po_id}}</a></td>
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
