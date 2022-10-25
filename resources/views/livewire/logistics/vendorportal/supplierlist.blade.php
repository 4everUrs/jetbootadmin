<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Supplier Lists') }}
        </h2>
    </x-slot>
    <div class="card">  
        <div class="card-body">
            <x-table head="Suppliers Lists">
                <thead class="bg-info">
                    <th class="text-center align-middle">Company Name</th>
                    <th class="text-center align-middle">Company Address</th>
                    <th class="text-center align-middle">Company Phone</th>
                    <th class="text-center align-middle">Company Email</th>
                    <th class="text-center align-middle">Status</th>
                </thead>
                <tbody>
                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td class="text-center align-middle">{{$supplier->name}}</td>
                            <td class="text-center align-middle">{{$supplier->address}}</td>
                            <td class="text-center align-middle">{{$supplier->phone}}</td>
                            <td class="text-center align-middle">{{$supplier->email}}</td>
                            <td class="text-center">{{$supplier->status}}</td>
                           
                        </tr>
                    @empty
                        
                    @endforelse
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