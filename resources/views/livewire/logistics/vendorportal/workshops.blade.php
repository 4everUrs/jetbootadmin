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
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Name</th>
                    <th class="text-center align-middle">Email</th>
                    <th class="text-center align-middle">Phone</th>
                    <th class="text-center align-middle">Location</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($workshops as $workshop)
                        <tr>
                            <td class="text-center">{{$workshop->id}}</td>
                            <td class="text-center align-middle">{{$workshop->name}}</td>
                            <td class="text-center align-middle">{{$workshop->email}}</td>
                            <td class="text-center align-middle">{{$workshop->phone}}</td>
                            <td class="text-center align-middle">{{$workshop->address}}</td>
                            <td class="text-center">{{$workshop->status}}</td>
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
