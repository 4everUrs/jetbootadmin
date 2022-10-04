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
                <th class="text-center">Location</th>
                <th class="text-center">Status</th>
                
            </thead>
            <tbody>
              @forelse ($jobs as $job)
                  <tr>
                    <td>{{$job->id}}</td>
                    <td>{{$job->name}}</td>
                    <td>{{$job->position}}</td>
                    <td>{{$job->email}}</td>
                    <td>{{$job->phone}}</td>
                    <td>{{$job->location}}</td>
                    <td>{{$job->status}}</td>
                  </tr>
              @empty
                  
              @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
    
    
</div>