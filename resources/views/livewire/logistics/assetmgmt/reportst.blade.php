<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <x-table head=" Project Reports">
                <thead class="bg-info">
                    <th class="text-center align-middle">Title</th>
                    <th class="text-center align-middle">Manager</th>
                    <th class="text-center align-middle">Contractor</th>
                    <th class="text-center align-middle">Supervisor</th>
                    <th class="text-center align-middle">Start Date</th>
                    <th class="text-center align-middle">Completion Date</th>
                    <th class="text-center align-middle">Total Cost</th>
                    <th class="text-center align-middle">Duration</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Remarks</th>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                    <tr>
                        <td class="text-center align-middle">{{$report->title}}</td>
                        <td class="text-center align-middle">{{$report->manager}}</td>
                        <td class="text-center align-middle">{{$report->contractor}}</td>
                        <td class="text-center align-middle">{{$report->contractor_manager}}</td>
                        <td class="text-center">{{Carbon\Carbon::parse($report->start_date)->toFormattedDateString()}}</td>
                        <td class="text-center">{{Carbon\Carbon::parse($report->completion_date)->toFormattedDateString()}}</td>
                        <td class="text-center align-middle">@money($report->budget)</td>
                        <td class="text-center align-middle">{{$report->duration}}</td>
                        <td class="text-center">{{$report->status}}</td>
                        <td class="text-center align-middle">{{$report->remarks}}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No Record Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
</div>