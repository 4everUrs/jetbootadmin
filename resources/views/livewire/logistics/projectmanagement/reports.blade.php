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
