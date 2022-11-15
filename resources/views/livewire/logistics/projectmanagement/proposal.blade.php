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
                <thead class="bg-info">

                    <th class="text-center align-middle">Project Name</th>
                    <th class="text-center align-middle">Attachment</th>
                    <th class="text-center align-middle">Duration</th>
                    <th class="text-center align-middle">Estimated Budget</th>
                    <th class="text-center align-middle">Approval Date</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                    @forelse ($proposals as $proposal)
                        <tr>
                            
                            <td class="text-center align-middle">{{$proposal->title}}</td>
                            <td class="text-center align-middle"><a href="{{route('projectproposal',$proposal->id)}}" target="__blank">View</a></td>
                            <td class="text-center align-middle">{{$proposal->duration}}</td>
                            <td class="text-center align-middle">@money($proposal->budget)</td>
                            @if (!empty($proposal->approval_date))
                                <td class="text-center">{{Carbon\Carbon::parse($proposal->approval_date)->toFormattedDateString()}}</td>
                            @else
                                <td></td>
                            @endif
                            <td class="text-center">Admin <i class="right fas fa-{{$proposal->admin_status}}"></i><br>
                                Finance <i class="right fas fa-{{$proposal->finance_status}}">
                            </td>
                            <td class="text-center align-middle">
                                <div class="dropdown">
                                    <button class="btn btn-dark btn-md dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Send
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <button wire:click="toAdmin({{$proposal->id}})" class="dropdown-item">Administrative</button>
                                        <button wire:click="toFinance({{$proposal->id}})" class="dropdown-item">Budget Management</button>
                                        
                                    </div>
                                </div>
                            
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
                        <td>Project Description:</td>
                        <td><textarea wire:model='description' class="form-control" rows="4"></textarea></td>
                       </tr>
                       <tr>
                        <td>Project Start:</td>
                        <td><input wire:model='start' class="form-control" type="date"></td>
                       </tr>
                       <tr>
                        <td>Project Duration:</td>
                        <td>
                            <input wire:model='duration' class="form-control" type="number" placeholder="Months">
                        </td>
                       </tr>
                       <tr>
                        <td>Personnel:</td>
                        <td><input wire:model='personnel' class="form-control" type="number" placeholder="Optional"></td>
                       </tr>
                       <tr>
                        <td>Materials, Supplies & Equipements:</td>
                        <td><input wire:model='materials' class="form-control" type="number" placeholder="Optional"></td>
                       </tr>
                       <tr>
                        <td>Item(s):</td>
                        <td><button wire:click="addRow" class="btn btn-dark btn-sm">+Add Row</button></td>
                       </tr>
                        @foreach ($itemContainer as $key => $item)
                            <tr>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col">
                                            <input wire:model.defer="itemContainer.{{$key}}.item_name" class="form-control" type="text" placeholder="Item Name">
                                        </div>
                                        <div class="col-2">
                                            <input wire:model.defer="itemContainer.{{$key}}.quantity" class="form-control" type="number" placeholder="Quantity">
                                        </div>
                                        <div class="col">
                                            <div class="input-group">
                                                <input wire:model.defer="itemContainer.{{$key}}.unit_cost" class="form-control" type="number" placeholder="Cost per unit">
                                                <button  wire:click="removeRow({{$key}})" class="btn btn-danger ml-2">Remove</button>
                                            </div>
                            
                                        </div>
                            
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
