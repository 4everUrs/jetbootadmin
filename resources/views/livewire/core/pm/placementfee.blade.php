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
                    <th>Location</th>
                    <th>Position</th>
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
</div>
