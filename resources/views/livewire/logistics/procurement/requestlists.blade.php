<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button class="btn btn-success" wire:click="loadModal">Add new Request</button>
            <x-table head="Request Lists">
                <thead>
                    <th>No.</th>
                    <th>From.</th>
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
                            <td>{{$request->content}}</td>
                            <td>{{$request->status}}</td>
                            <td>{{Carbon\Carbon::parse($request->create_at)->toFormattedDateString()}}</td>
                            <td>{{Carbon\Carbon::parse($request->updated_at)->toFormattedDateString()}}</td>
                            <td class="text-center">
                                <button wire:click="approve({{$request->id}})"  class="btn btn-primary">Approve</button>
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

                    <label class="mt-2">Requirements <button wire:click="addRow" class="btn btn-success btn-sm">Add Row</button></label>
                    @foreach ($requirements  as $index => $requirement)
                        <div class="input-group mt-2">
                          <input wire:model="requirements.{{$index}}.req" class="form-control mr-2" placeholder="Requirement {{$index + 1}}">
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
                {{ __('add new Item') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    
</div>
