<div>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('New Proposal') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click='loadModal' class="btn btn-dark btn-sm">+ New Proposal</button>
            <x-table head="List of Proposal">
                <thead>

                    <th>Project Title</th>
                    <th>Duration</th>
                    <th>Estimated Budget</th>
                    <th>Requested By</th>
                    <th>Requested Date</th>
                    <th>Approval Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($proposals as $proposal)
                        <tr>
                            
                            <td>{{$proposal->title}}</td>
                            <td>{{$proposal->duration}}</td>
                            <td>@money($proposal->budget)</td>
                            <td>{{$proposal->requested_by}}</td>
                            <td>{{Carbon\Carbon::parse($proposal->create_at)->toFormattedDateString()}}</td>
                            <td>{{Carbon\Carbon::parse($proposal->approval_date)->toFormattedDateString()}}</td>
                            <td>{{$proposal->status}}</td>
                            <td class="text-center">
                                <button wire:click='viewProposal({{$proposal->id}})' class="btn btn-primary btn-sm">View</button>
                                <button wire:click='editProposal({{$proposal->id}})' class="btn btn-secondary btn-sm">Edit</button>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="newProposalModal" maxWidth="lg">
        <x-slot name="title">
            {{__('New Proposal')}}
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                       <tr>
                        <td>Project Title:</td>
                        <td><input wire:model='title' class="form-control" type="text"></td>
                       </tr>
                       <tr>
                        <td>Project Duration:</td>
                        <td><input wire:model='duration' class="form-control" type="text"></td>
                       </tr>
                       <tr>
                        <td>Estimated Budget:</td>
                        <td><input wire:model='budget' class="form-control" type="text"></td>
                       </tr>
                    </table>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('newProposalModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="create" class="ms-2" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="ProposalModal" maxWidth="lg">
        <x-slot name="title">
            {{__('Proposal')}}
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    @if (!empty($proposalDetail))
                        To,<br>
                        The Administrative Department,<br>
                        <br>Date: {{Carbon\Carbon::parse($proposalDetail->created_at)->toFormattedDateString()}}<br>
                        
                        Subject: Seeking permission for the project<br><br>
                        
                        Respected Sir/Madam,<br><br>
                        
                        With due respesct, I would like to state that I am working in <u> Project Management Department </u> of your company.
                        <u>Tech-Trendz Services</u>.<br><br>
                        
                        Respected, I am writing this letter to you in order to seek permission for project <u>{{$proposalDetail->title}}</u>. I have
                        been working for a long time. The estimated budget for this project is <u>@money($proposalDetail->budget)</u> and duration of <u>{{$proposalDetail->duration}}</u> and this could help our
                        institution/ company gain better profits. I expect your kind approval for the above-said project.<br><br>

                        Therefore, I request your positive response. I shall be highly obliged.<br><br>
                        
                        Yours Sincerely/Faithfully,<br>
                        {{$proposalDetail->user->name}}
                    @endif
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('ProposalModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="download" class="ms-2" wire:loading.attr="disabled">
                {{ __('Download') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="editProposal" maxWidth="lg">
        <x-slot name="title">
            {{__('New Proposal')}}
        </x-slot>
        <x-slot name="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <td>Project Title:</td>
                            <td><input wire:model='title' class="form-control" type="text"></td>
                        </tr>
                        <tr>
                            <td>Project Duration:</td>
                            <td><input wire:model='duration' class="form-control" type="text"></td>
                        </tr>
                        <tr>
                            <td>Estimated Budget:</td>
                            <td><input wire:model='budget' class="form-control" type="text"></td>
                        </tr>
                        <tr>
                            <td>Status:</td>
                            <td>
                                <select wire:model='status' class="form-control">
                                    <option>Pending</option>
                                    <option>Approve</option>
                                    <option>Decline</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editProposal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-button wire:click="edit" class="ms-2" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>
    
        </x-slot>
    </x-jet-dialog-modal>
</div>
