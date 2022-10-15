<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Request List') }}
        </h2>
    </x-slot>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="true">Request List</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"> Form Request</button>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="list" role="tabpanel" aria-labelledby="list-tab">
            <div class="card">
                <div class="card-body">
                    <x-table head="Request List">
                        <thead>
                            <th>Origin</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Request Date</th>
                            <th>Date of Completion</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($requests as $request)
                            <tr>
                                <td>{{$request->origin}}</td>
                                <td>{{$request->subject}}</td>
                                <td>{{$request->category}}</td>
                                <td>{{$request->description}}</td>
                                <td>{{Carbon\Carbon::parse($request->created_at)->toFormattedDateString()}}</td>
                                @if (!empty($request->completion_date))
                                <td>{{Carbon\Carbon::parse($request->completion_date)->toFormattedDateString()}}</td>
                                @elseif (empty($request->completion_date))
                                <td>{{$request->completion_date}}</td>
                                @endif
                                <td>{{$request->status}}</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Approve</button>
                                </td>
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </x-table>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body">
    </div>
    
</div>