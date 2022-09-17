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
                    <th>Date</th>
                    <th class="text-center">Action.</th>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->origin}}</td>
                            <td>{{$request->content}}</td>
                            <td>{{$request->status}}</td>
                            <td>{{$request->created_at}}</td>
                            <td class="text-center">
                                <button wire:click="approve({{$request->id}})"  class="btn btn-primary">Approve</button>
                            </td>
                        </tr>                        
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
           <div class="mt-3 float-right">
            {{ $requests->links() }}
           </div>
        </div>
    </div>
</div>
