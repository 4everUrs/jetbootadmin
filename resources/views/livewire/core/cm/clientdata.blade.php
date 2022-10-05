<div>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold" style="margin-left:370px">
            {{ __('Client Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Location</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>

               
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr>
                    <td class="text-center">{{$client->id}}</td>
                    <td class="text-center">{{$client->name}}</td>
                    <td class="text-center">{{$client->email}}</td>
                    <td class="text-center">{{$client->location}}</td>
                    <td class="text-center">{{$client->status}}</td>
                    <td class="text-center">
                        <button wire:click="approve({{$client->id}})" class="btn btn-primary">Approve</button>
                        <button wire:click="edit({{$client->id}})" class="btn btn-secondary">Edit</button>
                        <button wire:click="delete({{$client->id}})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                @empty
                    
                @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="client_edit_id">
        <x-slot name="title">
            {{ __('Edit Client') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Company Name</label>
                <input wire:model="name" class="form-control" type="text">
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Email Address</label>
                <input wire:model="email" class="form-control" type="text">
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Location</label>
                <input wire:model="location" class="form-control" type="text">
                @error('location') <span class="text-danger">{{$message}}</span> @enderror
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('client_edit_id')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="editData" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
