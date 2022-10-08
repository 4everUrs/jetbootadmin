<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Onboarding') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">New Hired Employee</th>
                <th class="text-center">Email</th>
                <th class="text-center">Location</th>
                <th class="text-center">Schedule</th>
                <th class="text-center">Approved Documents</th> 
                <th class="text-center">Action</th> 
                

               
            </thead>
            <tbody>
                @forelse ($jobs as $job)
                  <tr>
                    <td class="text-center">{{$job->id}}</td>
                    <td class="text-center">{{$job->company}}</td>
                    <td class="text-center">{{$job->name}}</td>
                    <td class="text-center">{{$job->email}}</td>
                    <td class="text-center">{{$job->location}}</td>
                    <td></td>
                    <td class="text-center">{{$job->document}}</td>
                    <td class="text-center">
                        <button wire:click="submit({{$job->id}})" class="btn btn-primary">Submit</button>
                        <button wire:click="edit" class="btn btn-success">Edit</button>
                    </td>
                  </tr>
                @empty
                  
                @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
</div>
