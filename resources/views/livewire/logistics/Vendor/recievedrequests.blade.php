<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Recieved Requests') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="Request Lists">
                <thead>
                    <th>No.</th>
                    <th>Origin</th>
                    <th>Type</th>
                    <th>Message</th>
                     <th>Data Posted</th>
                     <th>Status</th>
                     <th>Actiom</th>

                    
                </thead>
                <tbody>
                    @forelse ($recieveds as $recieved)
                        <tr>
                            <td>{{$recieved->id}}</td>
                            <td>{{$recieved->origin}}</td>
                            <td>{{$recieved->type}}</td>
                            <td>{{$recieved->message}}</td>
                            <td>{{Carbon\Carbon::parse($recieved->created_at)->toFormattedDateString()}}</td>
                            <td>{{$recieved->status}}</td>
                            <td>
                                <button wire:click="grant({{$recieved->id}})" class="btn btn-primary">Post</button>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center"colspan="7"> no record found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="postModal">
        <x-slot name="title">
            {{ __('Recieved Requests') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Type</label>
                <select wire:model="title" class="form-control">
                    <option>Select Type</option>
                    <option>Supplier</option>
                    <option>Contractor</option>
                </select>
                <label>Requirements</label>
                <textarea wire:model="requirements" class="form-control"></textarea>

            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('postModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        
            <x-jet-button class="ms-2" wire:click="savePost" wire:loading.attr="disabled">
                {{ __('Save Post') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
        
</div>
