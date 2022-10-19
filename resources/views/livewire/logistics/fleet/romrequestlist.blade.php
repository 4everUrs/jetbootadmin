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
            <th class="text-center align-middle">No.</th>
            <th class="text-center align-middle">Origin</th>
            <th class="text-center align-middle">Subject</th>
            <th class="text-center align-middle">Category</th>
            <th class="text-center align-middle">Description</th>
            <th class="text-center align-middle">Request Date</th>
            <th class="text-center align-middle">Completion Date</th>
            <th class="text-center align-middle">Status</th>
            <th class="text-center align-middle">Action</th>
        </thead>
        <tbody>
            @forelse ($requests as $request)
            <tr>
                <td class="text-center">{{$request->id}}</td>
                <td class="text-center align-middle">{{$request->origin}}</td>
                <td class="text-center align-middle">{{$request->subject}}</td>
                <td class="text-center align-middle">{{$request->category}}</td>
                <td class="text-center align-middle">{{$request->description}}</td>
                <td class="text-center">{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                <td class="text-center">{{$request->completion_date}}</td>
                <td class="text-center">{{$request->status}}</td>
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