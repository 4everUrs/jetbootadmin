<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Suppliers Lists">
                <thead>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Company Phone</th>
                    <th>Company Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>{{$supplier->phone}}</td>
                            <td>{{$supplier->email}}</td>
                            @if ($supplier->status == 'Inactive')
                                <td class="text-danger text-center">{{$supplier->status}}</td>
                            @else
                                <td class="text-center">{{$supplier->status}}</td>
                            @endif
                            
                            <td>
                                <button class="btn btn-primary">Send P.O</button>
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
