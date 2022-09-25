<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('List of Job Vacancy') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
           <x-table head="">
            <thead>
                <th>No.</th>
                <th>Company Name</th>
                <th>Position</th>
                <th>Monthly Salary</th>
                <th>Job Details</th>
                <th>Location</th>
                <th>Action</th>

               
            </thead>
            <tbody>
                @forelse($vacants as $vacant)
                <tr>
                    <td>{{$vacant->id}}</td>
                    <td>{{$vacant->name}}</td>
                    <td>{{$vacant->position}}</td>
                    <td>{{$vacant->salary}}</td>
                    <td>{{$vacant->details}}</td>
                    <td>{{$vacant->location}}</td>
                    <td>
                        <button class="btn btn-primary">Submit</button>
                    </td>
                </tr>
                @empty

                @endforelse
            </tbody>
           </x-table>
        </div>
    </div>
</div>
