<div>
   <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('reportModal')" class="btn btn-dark btn-sm">Send Reports</button>
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
                            <td colspan="10" class="text-center">No Record Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="reportModal">
        <x-slot name="title">
            {{__('Send Report')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Project</label>
                <select wire:model="project_id" class="form-control">
                    <option value="">Select Project</option>
                    @forelse ($projects as $project)
                        <option value="{{$project->id}}">{{$project->title}} - {{$project->progress}}%</option>
                    @empty
                        <option value="">No Project Found</option>
                    @endforelse
                </select>
                <label>Remarks</label>
                <textarea wire:model="remarks" class="form-control" rows="3"></textarea>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('reportModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button class="ms-2" id="createButton" wire:click="sendReport" wire:loading.attr="disabled">
    
                {{ __('Send') }}
            </x-jet-button>
    
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
