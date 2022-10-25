<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('International Deployment process') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="">
                <thead>
                    <th>No.</th>
                    <th>Job candidate name</th>
                    <th>Job Site</th>
                    <th>Total Placement Fee</th>
                    <th>Deployment Papers</th>
                    <th>Ticket Booking Confirmation</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                      <tr>
                        <td class="text-center">{{$job->id}}</td>
                        <td class="text-center">{{$job->name}}</td>
                        <td class="text-center">{{$job->location}}</td>
                        <td class="text-center">{{$job->placement}}</td>
                        <td class="text-center">{{$job->papers}}</td>
                        <td class="text-center">{{$job->ticket}}</td>
                        <td  class="text-center">
                            <button wire:click="submit" class="btn btn-sm btn-primary">Deployment</button>
                        </td>
                        
                      </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>
