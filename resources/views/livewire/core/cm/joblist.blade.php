<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h2 style="float:left;"><strong>Create Job</strong></h2>
            <button wire:click="loadModal" type="create" class="btn btn-success" style="float:right"><i class='fa fa-plus'></i> Add New Job</button>
            
            <tbody>
                <tr>
                    <td></td>
                    
                </tr>
            </tbody>
           
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <x-table head="Job Record">
                <thead class="bg-info">
                    <th class="text-center">No.</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Monthly Salary</th>
                    <th class="text-center">Daily Salary</th>
                    <th class="text-center">Collection</th>
                    <th class="text-center">Job Details</th>
                    <th class="text-center">Company Location</th>
                    <th class="text-center">No. of Applicants</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>


                </thead>
                <tbody>
                    @forelse($jobs as $client)
                    <tr>
                        <td class="text-center">{{$client->id}}</td>
                        <td class="text-center">{{$client->name}}</td>
                        <td class="text-center">{{$client->position}}</td>
                        <td class="text-center">@money($client->salary)</td>
                        <td class="text-center">@money($client->daily_salary)</td>
                        <td class="text-center">@money($client->collection)</td>
                        <td class="text-center">{{$client->details}}</td>
                        <td class="text-center">{{$client->location}}</td>
                        <td class="text-center">{{$client->applicants}}</td>
                       
                        <td class="text-center">{{$client->status}}</td>
                        <td class="text-center">
                            @if ($client->status != 'Open')
                            <button wire:click="approve({{$client->id}})" class="btn btn-sm btn-secondary" disabled><i class='fa fa-check'></i> Approve</button>
                            @else
                            <button wire:click="approve({{$client->id}})" class="btn btn-sm btn-primary"><i class='fa fa-check'></i> Approve</button>
                            @endif
                            <button wire:click="deleteJob({{$client->id}})"class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Delete</button>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showModal">
        <x-slot name="title">
            {{ __('Create Job') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Company Name</label>
                <select wire:model="name"class="form-control" type="text">
                <option value="">Select Company</option>
                @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
                </select>
                
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Position</label>
                <input wire:model="position"class="form-control" type="text">
                @error('position') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Location</label>
                <input wire:model="location"class="form-control" type="text">
                @error('location') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Monthly Salary</label>
                <input wire:model="salary"class="form-control" type="number">
                @error('salary') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Job Details</label>
                <textarea wire:model="details"class="form-control" rows="2"></textarea>
                @error('details') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">No. of Applicants</label>
                <input wire:model="applicants"class="form-control" type="number">
                @error('applicants') <span class="text-danger">{{$message}}</span> @enderror
                <br>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="saveRequest" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            {{ __('Delete Job') }}
            
        </x-slot>
        <x-slot name="content">
            
            <p class="h4 text-center">Are you sure, you want to delete this job?</p><br>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('deleteModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="deleteData" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Yes! Delete') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
