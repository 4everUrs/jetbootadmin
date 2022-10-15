<div>
    <x-slot name="header">
        <h2 class="h3 font-weight-bold" style="margin-left:290px">
         {{ __('List of Applicants') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone Number</th>
                <th class="text-center">Address</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Company Address</th>
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
                    <td class="text-center">{{$job->company}}</td>
                    <td class="text-center">{{$job->location}}</td>
                    <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$job->resume_file}}" target="__blank">Resume</a></td>
                    <td class="text-center">{{$job->status}}</td>
                    <td class="text-center">
                        <button wire:click="approve({{$job->id}})" class="btn btn-primary">Approve</button>
                    </td>
                  </tr>
              @empty
                  
              @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    
    
</div>