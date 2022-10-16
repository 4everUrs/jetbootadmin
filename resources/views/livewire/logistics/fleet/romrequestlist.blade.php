<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request List') }}
        </h2>
    </x-slot>
   <div class="card">
    <div class="card-body">
       <x-table head="Maintenance Request">
        <thead class="bg-info">
            <th>No</th>
            <th>Origin</th>
            <th>Subject</th>
            <th>Category</th>
            <th>Description</th>
            <th>Request Date</th>
            <th>Completion Date</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse ($requests as $request)
            <tr>
                <td>{{$request->id}}</td>
                <td>{{$request->origin}}</td>
                <td>{{$request->subject}}</td>
                <td>{{$request->category}}</td>
                <td>{{$request->description}}</td>
                <td>{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                <td>{{$request->completion_date}}</td>
                <td>{{$request->status}}</td>
                <td class="text-center">
                    <button wire:click='markComplete({{$request->id}})'  class="btn btn-success btn-sm">Mark as Compeleted</button>    
                </td>
            </tr>
            @empty
            <tr>
                <td class="text-center" colspan="7">No Record Found</td>
            </tr>
            @endforelse
        </tbody>
    </x-table>
    </div>
   </div>
</div>