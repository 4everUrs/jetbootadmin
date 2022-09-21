<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Recieved Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Request Lists">
                <thead>
                    <th>No.</th>
                    <th>Origin</th>
                    <th>Type</th>
                    <th>Message</th>
                     <th>Data Posted</th>
                     <th>Status</th>
                     <th>Actiom</th>

                    
                </thead>
                <tbody>
                    @forelse ($recieveds as $recieved)
                        <tr>
                            <td>{{$recieved->id}}</td>
                            <td>{{$recieved->origin}}</td>
                            <td>{{$recieved->type}}</td>
                            <td>{{$recieved->message}}</td>
                            <td>{{$recieved->created_at}}</td>
                            <td>{{$recieved->status}}</td>
                            <td>
                                <button class="btn btn-primary">Approve</button>
                                <button data-toggle="modal" data-target="#show" class="btn btn-primary">Post</button>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center"colspan="7"> no record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    
        
</div>
