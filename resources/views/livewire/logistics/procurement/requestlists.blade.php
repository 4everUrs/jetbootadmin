<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-dark btn-sm" wire:click="loadModal">Add new Request</button>
            <x-table head="Request Lists">
                <thead class="bg-info">
                    <th>No.</th>
                    <th>Origin.</th>
                    <th>Category.</th>
                    <th>Content.</th>
                    <th>Status.</th>
                    <th>Date Requested</th>
                    <th>Date Granted</th>
                    <th class="text-center">Action.</th>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->origin}}</td>
                            <td>{{$request->category}}</td>
                            <td>{{$request->content}}</td>
                            <td>{{$request->status}}</td>
                            <td>{{Carbon\Carbon::parse($request->create_at)->toFormattedDateString()}}</td>
                            @if (!empty($request->date_granted))
                                <td>{{Carbon\Carbon::parse($request->date_granted)->toFormattedDateString()}}</td>
                            @else
                                <td>{{$request->date_granted}}</td>
                            @endif
                            <td class="text-center">
                                <button wire:click="approve({{$request->id}})"  class="btn btn-primary btn-sm">Approve</button>
                            </td>
                        </tr>                        
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
           <div class="mt-3 float-right">
            {{ $requests->links() }}
           </div>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="requestModal">
        <x-slot name="title">
            {{ __('Send a Request') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Type</label>
                <select wire:model="type" class="form-control">
                    <option>Select type</option>
                    <option>Supplier</option>
                    <option>Contractor</option>
                    <option>Buyer</option>
                </select>
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
