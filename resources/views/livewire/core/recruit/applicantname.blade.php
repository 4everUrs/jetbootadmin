<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
         {{ __('List of Applicants') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li wire:ignore class="nav-item" role="presentation">
          <button class="nav-link active mr-2" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Applicants</button>
        </li>
        <li wire:ignore class="nav-item mr-2" role="presentation">
          <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Not Qualified</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="">
                    <thead class="bg-info">
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
                                @if ($job->status == 'Qualified')
                                <button wire:click="approve({{$job->id}})" class="btn btn-secondary" disabled><i class='fa fa-check'></i> Qualified</button>
                                @else
                                <button wire:click="approve({{$job->id}})" class="btn btn-primary"><i class='fa fa-check'></i> Qualified</button>
                                <button wire:click="disapprove({{$job->id}})" class="btn btn-danger"><i class='fa fa-times'></i> Not Qualified</button>
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
        </div>
        <div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="">
                    <thead class="bg-info">
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
                      @forelse ($notQualified as $job)
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
        </div>
      </div>
    
</div>