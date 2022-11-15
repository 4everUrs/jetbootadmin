<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Audit Officers') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('addOfficerModal')" class="btn btn-dark btn-sm">+Add Officers</button>
            <x-table head="Officers">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">ID</th>
                    <th class="text-center align-middle">Name</th>
                    <th class="text-center align-middle">Email</th>
                    <th class="text-center align-middle">CIA Certification No.</th>
                </thead>   
                <tbody>
                    @forelse ($officers as $officer)
                        <tr>
                            <td class="text-center align-middle">{{$officer->id}}</td>
                            <td class="text-center align-middle">{{$officer->officer_id}}</td>
                            
                            <td class="text-center align-middle">{{$officer->name}}</td>
                            <td class="text-center align-middle">{{$officer->email}}</td>
                            <td class="text-center align-middle">{{$officer->certificate_no}}</td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody> 
            </x-table>
        </div>    
    </div>
    <x-jet-dialog-modal wire:model="addOfficerModal">
        <x-slot name="title">
            {{ __('Add Officer') }}
        </x-slot>
    
        <x-slot name="content">
            <div class="form-group">
                <label>Name</label>
                <input wire:model="name" type="text" class="form-control">
                @error('name') <span class="text-danger">{{ $message }}</span><br> @enderror
                <label>Email</label>
                <input wire:model="email" type="text" class="form-control">
                @error('email') <span class="text-danger">{{ $message }}</span><br> @enderror
                <label>Certficate No</label>
                <input wire:model="certificate_no" type="text" class="form-control">
                @error('certificate_no') <span class="text-danger">{{ $message }}</span><br> @enderror
            </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addOfficerModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="createOfficer" wire:loading.attr="disabled">
                {{ __('Add Officer') }}
            </x-jet-button>
        </x-slot>
    
    </x-jet-dialog-modal>
</div>

