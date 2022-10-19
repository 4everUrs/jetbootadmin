<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('List of Job Vacancies') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead class="bg-info">
                <th class="text-center">No.</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Monthly Salary</th>
                <th class="text-center">Job Details</th>
                <th class="text-center">Location</th>
                <th class="text-center">Action</th>

               
            </thead>
            <tbody>
                @forelse($vacants as $vacant)
                <tr>
                    <td class="text-center">{{$vacant->id}}</td>
                    <td class="text-center">{{$vacant->name}}</td>
                    <td class="text-center">{{$vacant->position}}</td>
                    <td class="text-center">{{$vacant->salary}}</td>
                    <td class="text-center">{{$vacant->details}}</td>
                    <td class="text-center">{{$vacant->location}}</td>
                    <td class="text-center">
                        <button wire:click="approve({{$vacant->id}})" class="btn btn-sm btn-primary"><i class='fa fa-check'></i> Approve</button>
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
