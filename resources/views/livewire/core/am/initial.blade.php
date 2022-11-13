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
                    <td class="text-center">{{$job->id}}</td>
                    <td class="text-center">{{$job->name}}</td>
                    <td class="text-center">{{$job->position}}</td>
                    <td class="text-center">{{$job->email}}</td>
                    <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$job->resume_file}}" target="__blank">Resume</a></td>
                    <td class="text-center">{{$job->time}}</td>
                    <td class="text-center">{{$job->date}}</td>
                    <td class="text-center">{{$job->venue}}</td>
                    <td class="text-center">{{$job->person}}</td>
                    <td class="text-center">{{$job->status}}</td>
                    <td class="text-center">
                        @if ($job->status == 'Qualified')
                        <button wire:click="approve({{$job->id}})" class="btn btn-secondary" disabled><i class='fa fa-check'></i> Qualified</button>
                        @else
                        <button wire:click="approve({{$job->id}})" class="btn btn-primary"><i class='fa fa-check'></i> Qualified</button>
                        <button wire:click="denied({{$job->id}})" class="btn btn-danger"><i class='fa fa-check'></i> Not Qualified</button>
                        @endif
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
</div>
