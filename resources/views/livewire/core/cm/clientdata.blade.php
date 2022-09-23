<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadClient" type="create" class="btn btn-success">Add New Client</button>
           <x-table head="Client List">
            <thead>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Location</th>
                <th>Action</th>

               
            </thead>
            <tbody>
                @forelse($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->location}}</td>
                </tr>
                @empty

                @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showClient">
        <x-slot name="title">
            {{ __('Create client') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Company Name</label>
                <input wire:model="name" class="form-control" type="text">
                <br>
                <label for="">Email Address</label>
                <input wire:model="email"class="form-control" type="text">
                <br>
                <label for="">Location</label>
                <input wire:model="location"class="form-control" type="text">
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showClient')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveClient" wire:loading.attr="disabled">
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
</div>
