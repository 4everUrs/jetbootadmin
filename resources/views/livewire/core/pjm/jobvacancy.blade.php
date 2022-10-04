<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('List of Job Vacancies') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead>
                <th>No.</th>
                <th>Company Name</th>
                <th>Position</th>
                <th>Monthly Salary</th>
                <th>Job Details</th>
                <th>Location</th>
                <th class="text-center">Action</th>

               
            </thead>
            <tbody>
                @forelse($vacants as $vacant)
                <tr>
                    <td>{{$vacant->id}}</td>
                    <td>{{$vacant->name}}</td>
                    <td>{{$vacant->position}}</td>
                    <td>{{$vacant->salary}}</td>
                    <td>{{$vacant->details}}</td>
                    <td>{{$vacant->location}}</td>
                    <td class="text-center">
                        <button wire:click="approve({{$vacant->id}})" class="btn btn-sm btn-primary">Approve</button>
                        <button wire:click="edit({{$vacant->id}})"class="btn btn-sm btn-secondary">Edit</button>
                        <button wire:click="delete({{$vacant->id}})"class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="vacant_edit_id">
        <x-slot name="title">
            {{ __('Edit Job') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Company Name</label>
                <input wire:model="name"class="form-control" type="text">
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Position</label>
                <input wire:model="position"class="form-control" type="text">
                @error('position') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Monthly Salary</label>
                <input wire:model="salary"class="form-control" type="number">
                @error('salary') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Job Details</label>
                <textarea wire:model="details"class="form-control" rows="2"></textarea>
                @error('details') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Location</label>
                <input wire:model="location"class="form-control" type="text">
                @error('location') <span class="text-danger">{{$message}}</span> @enderror
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('vacant_edit_id')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
