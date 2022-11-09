<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Projects List') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <a href="{{route('newproject')}}" class="btn btn-dark btn-sm">+ Create new project</a>
            <button wire:click="loadModal" class="btn btn-success btn-sm">+ Create budget proposal</button>
            <x-table head="Projects">
                <thead class="bg-info">
                    <th>Title</th>
                    <th>Manager</th>
                    <th>Budget</th>
                    <th>Duration</th>
                    <th>Progress</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr wire:click='viewRow({{$project->id}})'>
                            <td>{{$project->title}}</td>
                            <td>{{$project->manager}}</td>
                            <td>@money($project->budget)</td>
                            <td>{{$project->duration}}</td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$project->progress}}%" aria-valuenow="{{$project->progress}}"
                                        aria-valuemin="0" aria-valuemax="100">{{$project->progress}}%</div>
                                </div>
                            </td>
                            <td>{{$project->status}}</td>
                        </tr>
                        
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="projectDetail" maxWidth="lg">
        <x-slot name="title">
            {{__('Project Details')}}
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist" wire:ignore.self>
                        <li class="nav-item mr-2" role="presentation" wire:ignore>
                            <button class="nav-link active" id="projectDetail-tab" data-toggle="tab" data-target="#projectDetail" type="button" role="tab"
                                aria-controls="projectDetail" aria-selected="true">Project Details</button>
                        </li>
                        <li class="nav-item mr-2" role="presentation " wire:ignore>
                            <button class="nav-link" id="contractorDetails-tab" data-toggle="tab" data-target="#contractorDetails" type="button" role="tab"
                                aria-controls="contractorDetails" aria-selected="false">Contractor</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent" >
                        <div class="tab-pane fade show active" id="projectDetail" role="tabpanel" aria-labelledby="projectDetail-tab"wire:ignore.self>
                            <div class="card">
                                <div class="card-body">
                                   <table class="table table-bordered">
                                    <tr>
                                        <td>Project Title</td>
                                        <td>
                                            <input wire:model='title' class="form-control" type="text" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Project description</td>
                                        <td>
                                            <textarea wire:model='description' class="form-control" rows="3"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Project Manager</td>
                                        <td>
                                            <input wire:model='manager' class="form-control" type="text" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Project Budget</td>
                                        <td>
                                            <input wire:model='budget' class="form-control" type="text" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Project Duration</td>
                                        <td>
                                            <input wire:model='duration' class="form-control" type="text" >
                                        </td>
                                    </tr>
                                    
                                
                                </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contractorDetails" role="tabpanel" aria-labelledby="contractorDetails-tab" wire:ignore.self>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Contractor Name</td>
                                            <td>
                                                <input wire:model='contractor' class="form-control" type="text" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Contractor Manager</td>
                                            <td>
                                                <input wire:model='contractor_manager' class="form-control" type="text" >
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Start Date</td>
                                            <td>
                                              <div x-data x-init="new Pikaday({ field: $refs.dateInput, format: 'D/M/YYYY' })">
                                               <input x-ref="dateInput" type="text" wire:model.lazy="start_date" class="form-control" autocomplete="off">
                                            </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Project Duration</td>
                                            <td>
                                                <div class="input-group">
                                                    <input wire:model='term' type="number" id="inputEstimatedDuration" class="form-control">
                                                    <select wire:model='terms' class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="months">Month(s)</option>
                                                        <option value="years">Year(s)</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Target Completion</td>
                                            <td>
                                                <input wire:model='completion_date' class="form-control" type="text" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                <select wire:model='status' class="form-control">
                                                    <option>Select Option</option>
                                                    <option>On-Going</option>
                                                    <option>Completed</option>
                                                </select>
                                                
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Progress (Percentage)</td>
                                            <td>
                                                <input wire:model='progress' class="form-control" type="text">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('projectDetail')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="save" class="ms-2" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="budgetProposal" maxWidth="lg">
        <x-slot name="title">
            {{__('Budget Proposal')}}
        </x-slot>
        <x-slot name="content">
            <div class="form-group">
                <label>Project Title</label>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('budgetProposal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="edit" class="ms-2" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
    @push('scripts')
       <script>
        var picker = new Pikaday(
                {
                    field: document.getElementById('myDate'),
                    onSelect: function() {
                        var data = this.getDate();
                        @this.set('myDate', data);
                    }
                });
    </script>
    @endpush
</div>
