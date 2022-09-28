<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Supplier posting') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click = "showmodal"class="btn btn-primary">Add Post</button>
              
            <x-table head="Post Table"> 

               
            <thead>
                <th>Title</th>
                <th>Requirements</th>
                <th>Date Posted</th>
            </thead>
             <tbody>
                @forelse($posts as $post)
                 <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->requirements}}</td>
                    <td>{{Carbon\Carbon::parse($post->created_at)->toFormattedDateString()}}</td>
                 </tr>
                @empty

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
                <label >Requirements</label>
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