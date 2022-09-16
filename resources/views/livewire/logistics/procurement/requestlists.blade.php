<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Add new Request</button>
            <x-table head="Request Lists">
                <thead>
                    <th>No.</th>
                    <th>From.</th>
                    <th>Content.</th>
                    <th>Status.</th>
                    <th>Action.</th>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->origin}}</td>
                            <td>{{$request->content}}</td>
                            <td>{{$request->status}}</td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                            </td>
                        </tr>                        
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
            {{ $requests->links() }}
        </div>
    </div>
</div>
