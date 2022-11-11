<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Client Agreement List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadPayroll" class="btn btn-success"><i class='fa fa-edit'></i> Create Contract</button>
            <x-table head="">
                <thead class="bg-info">
                    <th class="text-center">Client Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Client Location</th>
                    <th class="text-center">Contract Term</th>
                    <th class="text-center">Status</th>
                </thead>
                <tbody>
                    @forelse ($onboards as $onboard)
                          <tr>
                            <td class="text-center">{{$onboard->client_name}}</td>
                            <td class="text-center">{{$onboard->email}}</td>
                            <td class="text-center">{{$onboard->client_location}}</td>
                            <td class="text-center">{{$onboard->contract_term}}</td>
                            <td class="text-center">
                                <button wire:click="viewModal({{$onboard->id}})" class="btn btn-primary" ><i class='fa fa-eye'></i> View</button>
                            </td>
                          </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No Record Found</td>
                            </tr>
                        @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="aggreement" maxWidth="lg">
        <x-slot name="title"><h2><strong>
            {{ __('COMPANY CONTRACT AGREEMENT') }}</strong></h2>
            
        </x-slot>
        <x-slot name="content">
            
            <div class="form-group">
                <label for="">Client Name</label>
                <select wire:model="client_name"class="form-control" type="text">
                    <option value="">Select Client</option>
                    @foreach ($onboards as $onboard)
                    <option>{{$onboard->client_name}}</option>
                    @endforeach
                </select>
                @error('client_name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Email Address</label>
                <input wire:model="email"class="form-control" type="text">
                @error('email') <span class="text-danger">{{$message}}</span> @enderror
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

    <x-jet-dialog-modal wire:model="contractModal" maxWidth="lg">
        <x-slot name="title">
            {{ __('') }}
            
        </x-slot>
        <x-slot name="content">
            @include('contract')
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('contractModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Close') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="download" wire:loading.attr="disabled"><i class='fa fa-download'></i>
                {{ __('Download') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
