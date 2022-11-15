<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Initial Interview') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="List of Applicant">
            <thead class="bg-info">
                <th class="text-center">No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Email</th>
                <th class="text-center">Resume</th>
                <th class="text-center">Time</th>
                <th class="text-center">Date</th>
                <th class="text-center">Venue</th>
                <th class="text-center">Interviewing Person</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>

               
            </thead>
            <tbody>
                @forelse ($jobs as $job)
                  <tr>
                    <td class="text-center">{{$job->ApplicantList->id}}</td>
                    <td class="text-center">{{$job->ApplicantList->name}}</td>
                    <td class="text-center">{{$job->ApplicantList->position}}</td>
                    <td class="text-center">{{$job->ApplicantList->email}}</td>
                    <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$job->resume_file}}" target="__blank">Resume</a></td>
                    <td class="text-center">{{$job->ApplicantList->time}}</td>
                    <td class="text-center">{{$job->ApplicantList->date}}</td>
                    <td class="text-center">{{$job->ApplicantList->venue}}</td>
                    <td class="text-center">{{$job->ApplicantList->person}}</td>
                    <td class="text-center">{{$job->ApplicantList->status}}</td>
                    <td class="text-center">
                        @if ($job->status == 'Pending')
                        <button wire:click="loadModal({{$job->id}})" class="btn btn-primary"><i class='fa fa-check'></i> Qualified</button>
                        <button wire:click="denied({{$job->id}})" class="btn btn-danger"><i class='fa fa-check'></i> Not Qualified</button>
                        @else
                        <button wire:click="approved({{$job->id}})" class="btn btn-secondary" disabled><i class='fa fa-check'></i> Qualified</button>
                        @endif
                        <button wire:click="deleteJob({{$job->id}})"class="btn btn-sm btn-danger"><i class='fa fa-trash'></i> Delete</button>
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
    <x-jet-dialog-modal wire:model="initialModal">
        <x-slot name="title">
            {{ __('Schedule for Final Interview') }}
            
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label for="">Scheduled Time</label>
                <input wire:model="time"class="form-control" type="time">
                @error('time') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Scheduled Date</label>
                <input wire:model="date"class="form-control" type="date">
                @error('date') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('initialModal')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="approved" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Approved') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            {{ __('Delete Initial Interview') }}
            
        </x-slot>
        <x-slot name="content">
            
            <p class="h4 text-center">Are you sure, you want to delete this?</p><br>
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
