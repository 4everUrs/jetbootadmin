<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Client Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h2 style="float:left;"><strong>All Clients</strong></h2>
            <button wire:click="loadClient" type="create" class="btn btn-success" style="float:right;"><i class='fa fa-plus'></i> Add New Client</button>
            <thead>
                <th></th>

            </thead>
            <tbody>
                <tr>
                    <td></td>
                
                </tr>
            </tbody>
       
        </div>
        <x-jet-dialog-modal wire:model="showClient">
            <x-slot name="title">
                {{ __('Create Client') }}
                
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
                    <label for="">Company Location</label>
                    <input wire:model="location" class="form-control" type="text">
                    @error('location') <span class="text-danger">{{$message}}</span> @enderror
                    
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('showClient')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        
                <x-jet-button class="ms-2" wire:click="saveclient" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                    {{ __('Confirm') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead class="bg-info">
                <th class="text-center">No.</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Company Location</th>
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
                        <button wire:click="approve({{$client->id}})" class="btn btn-sm btn-primary"><i class='fa fa-check'></i> Approve</button>
                        <button wire:click="delete({{$client->id}})" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Delete</button>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No Record Found</td>
                    </tr>
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
