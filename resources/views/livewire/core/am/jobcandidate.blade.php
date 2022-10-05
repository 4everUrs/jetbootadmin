<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="List of Applicant">
            <thead>
                <th class="text-center">No.</th>
                <th class="text-center">Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Location</th>
                <th class="text-center">Resume</th>
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
                    <td class="text-center">{{$job->location}}</td>
                    <td class="text-center">{{$job->resume_file}}</td>
                    
                    
                  </tr>
              @empty
                  
              @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
</div>
