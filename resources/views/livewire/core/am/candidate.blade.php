<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Job Candidates') }}
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
                    <td class="text-center">{{$job->Iinterview->ApplicantList->id}}</td>
                    <td class="text-center">{{$job->Iinterview->ApplicantList->name}}</td>
                    <td class="text-center">{{$job->Iinterview->ApplicantList->position}}</td>
                    <td class="text-center">{{$job->Iinterview->ApplicantList->email}}</td>
                    <td class="text-center">{{$job->Iinterview->ApplicantList->phone}}</td>
                    <td class="text-center">{{$job->Iinterview->ApplicantList->address}}</td>
                    <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$job->resume_file}}" target="__blank">Resume</a></td>
                    <td class="text-center">{{$job->status}}</td>
                    <td class="text-center">
                        @if ($job->status == 'Deployment')
                        <button wire:click="approve({{$job->id}})" class="btn btn-secondary" disabled><i class='fa fa-check'></i> For Deployement</button>
                        @else
                        <button wire:click="approve({{$job->id}})" class="btn btn-primary"><i class='fa fa-check'></i> For Deployment</button>
                        @endif
                        <button wire:click="deleteJob({{$job->id}})" class="btn btn-danger"><i class='fa fa-trash'></i> Delete</button>
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
    <x-jet-dialog-modal wire:model="deleteModal">
        <x-slot name="title">
            {{ __('Delete Job Candidate') }}
            
        </x-slot>
        <x-slot name="content">
            
            <p class="h4 text-center">Are you sure, you want to delete this job candidate?</p><br>
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
