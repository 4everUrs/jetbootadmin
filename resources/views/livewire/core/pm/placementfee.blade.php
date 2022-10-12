<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Deployment Process') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="">
                <thead>
                    <th>No.</th>
                    <th>Applicant Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Position</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Remarks</th>
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
                        <td class="text-center">{{$job->status}}</td>
                        <td class="text-center">{{$job->remarks}}</td>
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
            {{ __('Create Local Placement') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                
               
                <label for="">Total Placement Fee</label>
                <input wire:model="placement"class="form-control" type="number">
                @error('placement') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Deployment Papers</label>
                <input wire:model="papers"class="form-control" type="file">
                @error('papers') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label>Ticket Booking</label>
                <select wire:model="ticket"class="form-control" type="text">
                @error('ticket') <span class="text-danger">{{$message}}</span> @enderror
                <option value="Approved">Approved</option>
                <option value="">Pending</option>
                </select>
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
