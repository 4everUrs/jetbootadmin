<div>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold" style="margin-left:370px">
            {{ __('Client Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadClient" type="create" class="btn btn-success">Add New Client</button>
           <x-table head="">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Location</th>
                <th class="text-center">Action</th>

               
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr>
                    <td class="text-center">{{$client->id}}</td>
                    <td class="text-center">{{$client->name}}</td>
                    <td class="text-center">{{$client->email}}</td>
                    <td class="text-center">{{$client->location}}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
           </x-table>
        </div>
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
                <input wire:model="email"class="form-control" type="text">
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Location</label>
                <input wire:model="location"class="form-control" type="text">
                @error('location') <span class="text-danger">{{$message}}</span> @enderror
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showClient')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveclient" wire:loading.attr="disabled">
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
</div>
