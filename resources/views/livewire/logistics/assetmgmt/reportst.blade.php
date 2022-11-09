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
                    <th>Title.</th>
                    <th>Manager.</th>
                    <th>Contractor.</th>
                    <th>Supervisor.</th>
                    <th>Start Date.</th>
                    <th>Completion Date.</th>
                    <th>Total Cost.</th>
                    <th>Duration.</th>
                    <th>Status.</th>
                    <th>Remarks</th>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                    <tr>
                        <td>{{$report->title}}</td>
                        <td>{{$report->manager}}</td>
                        <td>{{$report->contractor}}</td>
                        <td>{{$report->contractor_manager}}</td>
                        <td>{{Carbon\Carbon::parse($report->start_date)->toFormattedDateString()}}</td>
                        <td>{{Carbon\Carbon::parse($report->completion_date)->toFormattedDateString()}}</td>
                        <td>@money($report->budget)</td>
                        <td>{{$report->duration}}</td>
                        <td>{{$report->status}}</td>
                        <td>{{$report->remarks}}</td>
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