<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Supplier Lists') }}
        </h2>
    </x-slot>
    <div class="card">
        
        <div class="card-body">
            <button wire:click="showModal" class="btn btn-success">Show Modal</button>
            <x-table head="Suppliers Lists">
                <thead>
                    <th>Company Name</th>
                    <th>Company Address</th>
                    <th>Company Phone</th>
                    <th>Company Email</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>

                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="testOnly">
        <x-slot name="title">
            {{ __('test') }}
        </x-slot>
        <x-slot name="content">
            <div class="row form-group">
                <div class="col">
                    <select wire:model="selection1" class="form-control">
                        <option value="0">Select Option</option>
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                <div class="col">
                    
                    <select class="form-control">
                       
                    </select>
                    
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('testOnly')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveTest" wire:loading.attr="disabled">
                {{ __('Save Post') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>