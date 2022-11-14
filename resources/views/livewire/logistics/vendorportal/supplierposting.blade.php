<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Supplier posting') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">

            <x-table head="Post Table">
                <thead class="bg-info">
                    <th class="text-center align-middle">Type</th>
                    <th class="text-center align-middle">Item Name</th>
                    <th class="text-center align-middle">Quantity</th>
                    <th class="text-center align-middle">Bidding Range</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Date Posted</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td class="text-center align-middle">{{$post->type}}</td>
                        <td class="text-center align-middle">{{$post->item_name}}</td>
                        <td class="text-center align-middle">{{$post->quantity}}</td>
                        <td class="text-center align-middle">@money($post->start) - @money($post->end)</td>
                        <td class="text-center align-middle">{{$post->description}}</td>
                        <td class="text-center">{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</td>
                        <td class="text-center">
                            <button wire:click="removePost({{$post->id}})" class="btn btn-danger">Remove</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse

                </tbody>

            </x-table>

        </div>

    </div>
    <x-jet-dialog-modal wire:model="postmodal">
        <x-slot name="title">
            {{ __('Supplier posting') }}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Type</label>
                <select wire:model="title" class="form-control">
                    <option>Select here</option>
                    <option>Supplier</option>
                    <option>Contractor</option>
                </select>
                <label>Requirements</label>
                <textarea wire:model="requirements" class="form-control"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('postmodal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ms-2" wire:click="savePost" wire:loading.attr="disabled">
                {{ __('Post') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>