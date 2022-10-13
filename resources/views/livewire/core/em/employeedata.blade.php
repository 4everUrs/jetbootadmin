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
                    <th class="text-center">Contact No.</th>
                    <th class="text-center">Position</th>
                    <th class="text-center">Company Name</th>
                    <th class="text-center">Company Location</th>
                    <th class="text-center">Action</th>
                </thead>
                <tbody>
                    @forelse ($onboards as $onboard)
                          <tr>
                            <td class="text-center">{{$onboard->id}}</td>
                            <td class="text-center">{{$onboard->name}}</td>
                            <td class="text-center">{{$onboard->phone}}</td>
                            <td class="text-center">{{$onboard->position}}</td>
                            <td class="text-center">{{$onboard->company_name}}</td>
                            <td class="text-center">{{$onboard->company_location}}</td>
                            <td class="text-center">
                                <button wire:click="submit({{$onboard->id}})" class="btn btn-sm btn-primary">Send to Payroll Mngt. </button>
                            </td>
                          </tr>
                        @empty
                          
                        @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>
