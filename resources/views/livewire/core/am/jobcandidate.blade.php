<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
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
                <th class="text-center">Phone</th>
                <th class="text-center">Address</th>
                <th class="text-center">Resume</th>
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
                    <td class="text-center">{{$job->phone}}</td>
                    <td class="text-center">{{$job->address}}</td>
                    <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$job->resume_file}}" target="__blank">Resume</a></td>
                    <td class="text-center">{{$job->status}}</td>
                    <td class="text-center">
                        @if ($job->status == 'Scheduled')
                        <button wire:click="approve({{$job->id}})" class="btn btn-secondary" disabled><i class='fa fa-check'></i> Scheduled</button>
                        @else
                        <button wire:click="approve({{$job->id}})" class="btn btn-primary"><i class='fa fa-check'></i> Scheduling</button>
                        @endif
                    </td>
                    
                  </tr>
              @empty
                <tr>
                    <td colspan="9" class="text-center">No Record Found</td>
                </tr>
              @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="viewLetter">
        <x-slot name="title">
            {{ __('Acceptance Letter') }}
            
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
                <label for="">Venue</label>
                <select wire:model="venue"class="form-control" type="text">
                    <option value="">Select</option>
                    <option value="Venue">Venue Address - Quezon City</option>
                    <option value="Link">Communication Link - https://us04web.zoom.us/j/78172950906?pwd=QXAFLR4jk8K20aOLyyBmO1VaLZXWtv.1</option>
                </select>
                @error('venue') <span class="text-danger">{{$message}}</span> @enderror
                <br>
                <label for="">Interviewing Person</label>
                <input wire:model="person"class="form-control" type="text">
                @error('person') <span class="text-danger">{{$message}}</span> @enderror
                <br>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('viewLetter')" wire:loading.attr="disabled"><i class='fa fa-times'></i>
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" wire:click="approved" wire:loading.attr="disabled"><i class='fa fa-check'></i>
                {{ __('Approved') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
