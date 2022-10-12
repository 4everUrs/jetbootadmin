<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Employee Data') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head="">
                <thead>
                    <th class="text-center">No.</th>
                    <th class="text-center">Employee Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($jobs as $job)
                      <tr>
                        <td class="text-center">{{$job->id}}</td>
                        <td class="text-center">{{$job->name}}</td>
                        <td class="text-center">{{$job->email}}</td>
                        <td class="text-center">
                            <button wire:click="submit" class="btn btn-primary">Submit</button>
                        </td>
                      </tr>
                    @empty
                      
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>
