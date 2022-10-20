<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Suppliers Lists">
                <thead class="bg-info">
                    <th class="text-center align-middle">Company Name</th>
                    <th class="text-center align-middle">Company Address</th>
                    <th class="text-center align-middle">Company Phone</th>
                    <th class="text-center align-middle">Company Email</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td class="text-center align-middle">{{$supplier->name}}</td>
                            <td class="text-center align-middle">{{$supplier->address}}</td>
                            <td class="text-center align-middle">{{$supplier->phone}}</td>
                            <td class="text-center align-middle">{{$supplier->email}}</td>
                            @if ($supplier->status == 'Inactive')
                                <td class="text-danger text-center">{{$supplier->status}}</td>
                            @else
                                <td class="text-center">{{$supplier->status}}</td>
                            @endif
                            
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm">Send P.O</button>
                                <button wire:click="changeStatus({{$supplier->id}})" class="btn btn-danger btn-sm">Terminate</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>
