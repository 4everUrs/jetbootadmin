<div>
   <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Budget Proposal') }}
        </h2>
    </x-slot>
    <div class="card">
        <div class="card-body">
            <button wire:click="$toggle('budgetProposalModal')" class="btn btn-dark btn-sm">Create Budget Proposal</button>
           <x-table head="Budget Proposals">
                <tr class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Proposal Name</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Requestor</th>
                    <th class="text-center align-middle">Proposed Amount</th>
                    <th class="text-center align-middle">Approved Amount</th>
                    <th class="text-center align-middle">Date Request</th>
                    <th class="text-center align-middle">Approval Date</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Remarks</th>
                    <th class="text-center align-middle">Action</th>
                </tr>
                <tbody>
                   @forelse ($proposals as $key => $proposal)
                       <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$proposal->proposalname}}</td>
                            <td>{{$proposal->description}}</td>
                            <td>{{$proposal->requestor}}</td>
                            <td>@money($proposal->proposedamount)</td>
                            <td>@money($proposal->approvedamount)</td>
                            <td>@date($proposal->created_at)</td>   
                            <td>{{$proposal->approvedate}}</td>
                            <td>{{$proposal->rstatus}}</td>
                            <td>{{$proposal->remarks}}</td>
                            <td>
                                @if ($proposal->rstatus == 'Pending')
                                    <button wire:click="transfer({{$proposal->id}})" class="btn btn-sm btn-dark">Transfer</button>
                                @else
                                    <button wire:click="transfer({{$proposal->id}})" class="btn btn-sm btn-dark" disabled>Transfer</button>
                                @endif
                                
                            </td>
                       </tr>
                   @empty
                       <tr>
                        <td colspan="11" class="text-center">No Record Found</td>
                    </tr>
                   @endforelse
                </tbody>
           </x-table>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="budgetProposalModal">
        <x-slot name="title">
            {{ __('Budget Proposal') }}
        </x-slot>
    
        <x-slot name="content">
           <div class="form-group">
            <label>Proposal Name</label>
            <input wire:model="name" class="form-control" type="text">
            <label>Proposed Amount</label>
            <input wire:model="amount" class="form-control" type="number">
            <label>Description</label>
            <textarea wire:model="description" class="form-control" rows="4"></textarea>
           </div>
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('budgetProposalModal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    

            <x-jet-button class="ms-2" wire:click="createBudgetProposal" wire:loading.attr="disabled">
                {{ __('Create') }}
            </x-jet-button>

    
        </x-slot>
    </x-jet-dialog-modal>
</div>
