<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Deployment Process') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="loadPlacement" type="create" class="btn btn-success" style="float:right"> Placement</button>
            <br><br>
            <x-table head="">
                <thead>
                    <th>No.</th>
                    <th>Applicant Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Location</th>
                    <th>Position</th>
                    <th>Placement Fee</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                      <tr>
                        <td class="text-center">{{$job->id}}</td>
                        <td class="text-center">{{$job->name}}</td>
                        <td class="text-center">{{$job->phone}}</td>
                        <td class="text-center">{{$job->email}}</td>
                        <td class="text-center">{{$job->company_name}}</td>
                        <td class="text-center">{{$job->company_location}}</td>
                        <td class="text-center">{{$job->position}}</td>
                        <td class="text-center">{{$job->placement}}</td>
                        <td class="text-center">{{$job->status}}</td>
                        <td>
                            <button wire:click="deploy({{$job->id}})" class="btn btn-sm btn-primary">Deployment</button>
                        </td>
                        
                      </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="showPlacement">
        <x-slot name="title">
            {{ __('Create Placement') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                
                <label for="">Employee Name</label>
                <select wire:model="name"class="form-control" type="text">
                    <option value="">Select Name</option>
                    @foreach ($jobs as $job)
                    <option value="{{$job->id}}">{{$job->name}}</option>
                    @endforeach
                </select>
                @error('name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Placement Fee</label>
                <input wire:model="placement"class="form-control" type="number">
                @error('placement') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Status</label>
                <select wire:model="status"class="form-control" type="text">
                    <option value="">Select Status</option>
                    <option value="Deploy">Deploy</option>
                    <option value="Pending">Pending</option>
                </select>
                @error('status') <span class="text-danger">{{$message}}</span> @enderror
                <br>
            
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('showPlacement')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="savePlacement" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Confirm') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
