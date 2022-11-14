<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Deployment Process') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           
            <x-table head="">
                <thead class="bg-info">
                    <th class="text-center">No.</th>
                    <th class="text-center">Applicant Name</th>
                    <th class="text-center">Contact</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Location</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                   
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
                        <td class="text-center">{{$job->status}}</td>
                        <td class="text-center">
                            @if ($job->status == 'Deployed')
                            <button wire:click="deploy({{$job->id}})" class="btn btn-sm btn-secondary" disabled><i class='fa fa-car'></i> Deployment</button>
                            @else
                            <button wire:click="deploy({{$job->id}})" class="btn btn-sm btn-primary"><i class='fa fa-car'></i> Deployment</button>
                            <button wire:click="editPlacement({{$job->id}})" class="btn btn-sm btn-dark"><i class='fa fa-edit'></i> Edit</button>
                            @endif
                        </td>
                        
                      </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">No Record Found</td>
                        </tr>
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
                
                <label for="">Company Name</label>
                <input wire:model="company_name"class="form-control" type="text">
                @error('company_name') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Location</label>
                <input wire:model="company_location"class="form-control" type="text">
                @error('company_location') <span class="text-danger">{{$message}}</span> @enderror
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
