<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Reports & Request') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                        role="tab" aria-controls="home" aria-selected="true">Reports</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Request</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            
                            <x-table head="Requests">
                                <thead class="bg-info">
                                    <th class="text-center align-middle">No.</th>
                                    <th class="text-center align-middle">Origin</th>
                                    <th class="text-center align-middle">Content</th>
                                    <th class="text-center align-middle">Date</th>
                                    <th class="text-center align-middle">Status</th>
                                    <th class="text-center align-middle">Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $request)
                                        <tr>
                                            <td class="text-center align-middle">{{$request->id}}</td>
                                            <td class="text-center align-middle">{{$request->origin}}</td>
                                            <td class="text-center align-middle">{{$request->content}}</td>
                                            <td class="text-center align-middle">@date($request->created_at)</td>
                                            <td class="text-center align-middle">{{$request->status}}</td>
                                            <td class="text-center align-middle">
                                               @if ($request->status != 'Confirmed')
                                                   <button wire:click="confirm({{$request->id}})" class="btn btn-dark btn-sm">Confirm</button>
                                               @else
                                                   <button wire:click="confirm({{$request->id}})" class="btn btn-secondary btn-sm" disabled>Confirm</button>
                                               @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </x-table>
                        </div>
                    </div>
                </div>
               
            </div>
            
        </div>
    </div>
</div>