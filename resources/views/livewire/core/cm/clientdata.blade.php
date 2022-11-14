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
                    <br>
                    <div class="row">
                        <div class="col">
                            <label for="">Contract</label>
                            <input wire:model="value"class="form-control" type="number">
                            @error('contract') <span class="text-danger">{{$message}}</span> @enderror
                            <br>
                        </div>
                        <div class="col">
                            <label for="">Terms</label>
                            <select wire:model="terms" class="form-control">
                                <option value="">Choose...</option>
                                <option value="years">Years</option>
                                <option value="months">Months</option>
                            </select>
                        </div>
                    </div>
                    
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
                <th class="text-center">Contract Term</th>
                <th class="text-center">Contract Date</th>
                <th class="text-center">End of Contract</th>
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
                    <td class="text-center">{{$client->contract}}</td>
                    <td class="text-center">@date($client->created_at)</td>
                    <td class="text-center">@date($client->endo)</td>
                    <td class="text-center">{{$client->status}}</td>
                    <td class="text-center">
                        <button wire:click="renew({{$client->id}})" class="btn btn-sm btn-primary"><i class='fa fa-pen-nib'></i> Renewal</button>
                        <button wire:click="deleteClient({{$client->id}})" class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Delete</button>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No Record Found</td>
                    </tr>
                @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showRenew">
        <x-slot name="title">
            {{ __('Renew Contract') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        <label for="">Contract</label>
                        <input wire:model="value"class="form-control" type="number">
                        @error('contract') <span class="text-danger">{{$message}}</span> @enderror
                        <br>
                    </div>
                    <div class="col">
                        <label for="">Terms</label>
                        <select wire:model="terms" class="form-control">
                            <option value="">Choose...</option>
                            <option value="years">Years</option>
                            <option value="months">Months</option>
                        </select>
                    </div>
                </div>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showRenew')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRenew" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            {{ __('Delete Client') }}
            
        </x-slot>
        <x-slot name="content">
            
            <p class="h4 text-center">Are you sure, you want to delete this client?</p><br>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="deleteData" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Yes! Delete') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
