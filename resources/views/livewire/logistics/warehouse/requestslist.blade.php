<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Requests Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <a data-toggle="modal" data-target="#sendRequest" class="btn btn-primary">Send Request</a>
            <x-table head="Request List Table">
                <thead>
                    <th>No.</th>
                    <th>From</th>
                    <th>Content</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->origin}}</td>
                            <td>{{$request->content}}</td>
                            <td>{{$request->create_at}}</td>
                            <td>{{$request->status}}</td>
                        </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">No Record Found Nigga!</td>
                    </tr>
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-modal id="sendRequest" title="Send a request" function="sendRequest">
        <div class="form-group">
            <label>Send to:</label>
            <select wire:model="destination" class="form-control">
                <option>Procurement</option>
                <option>Fleet Management</option>
            </select>
            <label>Content</label>
            <textarea wire:model="content" class="form-control"></textarea>
        </div>
    </x-modal>
</div>
