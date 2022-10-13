<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Client Agreement List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadPayroll" class="btn btn-success">Contract</button>
            <x-table head="">
                <thead>
                    <th>Client Name</th>
                    <th>Client Location</th>
                    <th>Contract Term</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($onboards as $onboard)
                          <tr>
                            <td class="text-center">{{$onboard->client_name}}</td>
                            <td class="text-center">{{$onboard->client_location}}</td>
                            <td class="text-center">{{$onboard->contract_term}}</td>
                            <td>
                                <button wire:click="viewModal({{$onboard->id}})" class="btn btn-primary">View</button>
                            </td>
                          </tr>
                        @empty
                          
                        @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="aggreement">
        <x-slot name="title">
            {{ __('Contract Agreement') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Client Name</label>
                <input wire:model="client_name"class="form-control" type="text">
                @error('client_name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Client Location</label>
                <input wire:model="client_location"class="form-control" type="text">
                @error('client_location') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Contract Term</label>
                <input wire:model="contract_term"class="form-control" type="text">
                @error('contract_term') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('aggreement')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="aggreementSave" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="contractModal">
        <x-slot name="title">
            {{ __('') }}
            
        </x-slot>
        <x-slot name="content">
            @include('contract')
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('contractModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="download" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
