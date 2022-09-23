<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Wait') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadModal" type="create" class="btn btn-success">Create New Job</button>
            <thead>
                <th></th>
    
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    
                </tr>
            </tbody>
           
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ __('Create job') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Job Name</label>
                <input class="form-control" type="text">
                <br>
                <label for="">Job Details</label>
                <textarea class="form-control" rows="2"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled">
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
