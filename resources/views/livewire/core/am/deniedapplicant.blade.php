<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="List of Denied Applicant">
            <thead class="bg-info">
                <th class="text-center">Name</th>
                <th class="text-center">Position</th>
                <th class="text-center">Email</th>
                <th class="text-center">Phone</th>
                <th class="text-center">Address</th>
                <th class="text-center">Resume</th>
                <th class="text-center">Status</th>

               
            </thead>
            <tbody>
                @forelse ($jobs as $job)
                  <tr>
                    <td class="text-center">{{$job->name}}</td>
                    <td class="text-center">{{$job->position}}</td>
                    <td class="text-center">{{$job->email}}</td>
                    <td class="text-center">{{$job->phone}}</td>
                    <td class="text-center">{{$job->address}}</td>
                    <td class="text-center"><a href="https://mnlph.nyc3.digitaloceanspaces.com/{{$job->resume_file}}" target="__blank">Resume</a></td>
                    <td class="text-center">{{$job->status}}</td>
                    
                  </tr>
              @empty
                <tr>
                    <td colspan="8" class="text-center">No Record Found</td>
                </tr>
              @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
</div>
