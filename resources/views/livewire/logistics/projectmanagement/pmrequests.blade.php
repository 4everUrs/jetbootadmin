<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('requestModal')" class="btn btn-dark btn-sm">+Request Contractor</button>
            <x-table head="Requets List">
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Origin</th>
                    <th class="text-center align-middle">Requestor</th>
                    <th class="text-center align-middle">Date</th>
                    <th class="text-center align-middle">Content</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
            </x-table>
        </div>
    </div>
   <x-jet-dialog-modal wire:model="requestModal">
    <x-slot name="title">
        {{ __('Send a Request') }}
    </x-slot>
    <x-slot name="content">
        <div class="form-group">
            <label>Item Name</label>
            <input wire:model="name" class="form-control" type="text">
            <label>Quantity</label>
            <input wire:model="qty" class="form-control" type="number">
            @error('type') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            <label>Description</label>
            <textarea wire:model="description" class="form-control"></textarea>
            @error('description') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            <label>Price Range</label>
            <div class="input-group">
                <input wire:model="start" class="form-control mr-2" type="number" placeholder="Starting">
                @error('start')<span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <input wire:model="end" class="form-control ml-2" type="number" placeholder="Ending">
                @error('end') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            </div>
            <label>Location</label>
            <input wire:model="location" class="form-control" type="text">
            @error('location') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
            <label class="mt-2">Requirements <button wire:click="addRow" class="btn btn-success btn-sm">Add
                    Row</button></label>
            @foreach ($requirements as $index => $requirement)
            <div class="input-group mt-2">
                <input wire:model="requirements.{{$index}}.req" class="form-control mr-2"
                    placeholder="Requirement {{$index + 1}}">
                @error('requirements') <span class="alert text-danger">{{ $message }}<br /></span> @enderror
                <button wire:click="removeRow({{$index}})" class="btn btn-sm btn-danger">Remove</button>
            </div>
            @endforeach


        </div>

    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('requestModal')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled">
            {{ __('Send Request') }}
        </x-jet-button>
    </x-slot>
</x-jet-dialog-modal>
</div>
