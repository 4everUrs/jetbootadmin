<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Workshop List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Workshop applicant">
                <thead class="bg-info">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($workshops as $workshop)
                        <tr>
                            <td>{{$workshop->id}}</td>
                            <td>{{$workshop->name}}</td>
                            <td>{{$workshop->email}}</td>
                            <td>{{$workshop->phone}}</td>
                            <td>{{$workshop->address}}</td>
                            <td>{{$workshop->status}}</td>
                            <td class="text-center">
                                <button wire:click="loadModal({{$workshop->id}})" class="btn btn-primary btn-sm">Approve</button>
                                <button wire:click="showModal({{$workshop->id}})" class="btn btn-danger btn-sm">Deny</button>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="approveModal">
        <x-slot name="title">
            {{ __('Approve?') }}
        </x-slot>
        <x-slot name="content">
            {{__('Do you want to approve this application?')}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('approveModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="grant" wire:loading.attr="disabled">
                {{ __('yes') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="denyModal">
        <x-slot name="title">
            {{ __('Approve?') }}
        </x-slot>
        <x-slot name="content">
            {{__('Do you want to deny this application?')}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('denyModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="deny" wire:loading.attr="disabled">
                {{ __('yes') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
