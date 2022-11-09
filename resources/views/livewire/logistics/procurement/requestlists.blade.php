<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-dark btn-sm" wire:click="loadModal">Add new Request</button>
            <ul class="nav nav-tabs mt-3" id="myTab" role="tablist">
                <li class="nav-item mr-2" role="presentation" wire:ignore>
                    <button class="nav-link active" id="Recieved-tab" data-bs-toggle="tab" data-bs-target="#Recieved" type="button"
                        role="tab" aria-controls="Recieved" aria-selected="true">Recieved</button>
                </li>
                <li class="nav-item" role="presentation" wire:ignore>
                    <button class="nav-link" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent" type="button"
                        role="tab" aria-controls="sent" aria-selected="false">Sent</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div wire:ignore.self class="tab-pane fade show active" id="Recieved" role="tabpanel" aria-labelledby="Recieved-tab">
                    <x-table head="Request Lists">
                        <thead class="bg-info">
                            <th class="text-center align-middle">No.</th>
                            <th class="text-center align-middle">Origin</th>
                            <th class="text-center align-middle">Type</th>
                            <th class="text-center align-middle">Category</th>
                            <th class="text-center align-middle">Item Name</th>
                            <th class="text-center align-middle">Quantity</th>
                            <th class="text-center align-middle">Description</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Date Requested</th>
                            <th class="text-center align-middle">Date Granted</th>
                            <th class="text-center align-middle">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($requests as $key => $request)
                            <tr>
                                <td class="text-center">{{$key+1}}</td>
                                <td class="text-center align-middle">{{$request->origin}}</td>
                                <td class="text-center align-middle">{{$request->type}}</td>
                                <td class="text-center align-middle">{{$request->category}}</td>
                                <td class="text-center align-middle">{{$request->item_name}}</td>
                                <td class="text-center align-middle">{{$request->item_qty}}</td>
                                <td class="text-center align-middle">{{$request->content}}</td>
                                <td class="text-center">{{$request->status}}</td>
                                <td class="text-center">{{Carbon\Carbon::parse($request->create_at)->toFormattedDateString()}}</td>
                                @if (!empty($request->date_granted))
                                <td class="text-center">{{Carbon\Carbon::parse($request->date_granted)->toFormattedDateString()}}</td>
                                @else
                                <td>{{$request->date_granted}}</td>
                                @endif
                                <td class="text-center">
                                    @if ($request->status == 'Approved')
                                        <button wire:click="approve({{$request->id}})" class="btn btn-secondary btn-sm" disabled>Approved</button>
                                    @else
                                        <button wire:click="approve({{$request->id}})" class="btn btn-primary btn-sm">Approve</button>
                                    @endif
                                   
                                    
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11" class="text-center">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </x-table>
                    <div class="mt-3 float-right">
                        {{ $requests->links() }}
                    </div>
                </div>
                <div class="tab-pane fade" id="sent" role="tabpanel" aria-labelledby="sent-tab" wire:ignore.self>
                    <div class="card">
                        <div class="card-body">
                            <x-table head="Sent Request">
                                <tr class="bg-info">
                                    <th class="text-center align-middle">No</th>
                                    <th class="text-center align-middle">Destination</td>
                                    <th class="text-center align-middle">Description</th>
                                    <th class="text-center align-middle">Date Requested</th>
                                    <th class="text-center align-middle">Date of Approval</th>
                                    <th class="text-center align-middle">Remarks</th>
                                    <th class="text-center align-middle">Status</th>
                                </tr>
                                <tbody>
                                    @forelse ($sents as $sent)
                                        <tr>
                                            <td class="text-center">{{$sent->id}}</td>
                                            <td class="text-center align-middle">{{$sent->destination}}</td>
                                            <td class="text-center align-middle">{{$sent->description}}</td>
                                            <td class="text-center">@date($sent->created_at)</td>
                                            <td class="text-center">{{$sent->approval_date}}</td>
                                            <td class="text-center align-middle">{{$sent->remarks}}</td>
                                            <td class="text-center">{{$sent->status}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No Record Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </x-table>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="requestModal">
        <x-slot name="title">
            {{ __('Send a Request') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Item Name</label>
                <input wire:model="name" class="form-control" type="text">
                <label>Quantity</label>
                <input wire:model="qty" class="form-control" type="number">
                @error('type') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                    <label>Description</label>
                    <textarea wire:model="description" class="form-control"></textarea>
                    @error('description') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                    <label>Price Range</label>
                    <div class="input-group">         
                        <input wire:model="start" class="form-control mr-2" type="number" placeholder="Starting">
                        @error('start')<span class="alert text-danger">{{ $message }}<br /></span> @enderror
                        <input wire:model="end" class="form-control ml-2" type="number" placeholder="Ending">
                        @error('end') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                    </div>
                    <label>Location</label>
                    <input wire:model="location" class="form-control" type="text">
                    @error('location') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                    <label class="mt-2">Requirements <button wire:click="addRow" class="btn btn-success btn-sm">Add Row</button></label>
                    @foreach ($requirements  as $index => $requirement)
                        <div class="input-group mt-2">
                          <input wire:model="requirements.{{$index}}.req" class="form-control mr-2" placeholder="Requirement {{$index + 1}}">
                          @error('requirements') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                            <button wire:click="removeRow({{$index}})" class="btn btn-sm btn-danger">Remove</button>
                        </div>
                    @endforeach
               
                
            </div>
            
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('requestModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled">
                {{ __('Send Request') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    
</div>
