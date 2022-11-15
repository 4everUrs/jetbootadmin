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
                    <th class="text-center align-middle">Attachment</th>
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
                            <td class="text-center align-middle">{{$key+1}}</t  d>
                            <td class="text-center align-middle">{{$proposal->proposalname}}</td>
                            <td>{{$proposal->description}}</td>
                            <td class="text-center align-middle"><a href="{{route('dlproposal')}} target="_blank" rel="noopener noreferrer">View</a></td>
                            <td class="text-center align-middle">{{$proposal->requestor}}</td>
                            <td class="text-center align-middle">@money($proposal->proposedamount)</td>
                            <td class="text-center align-middle">@money($proposal->approvedamount)</td>
                            <td class="text-center align-middle">@date($proposal->created_at)</td>   
                            <td class="text-center align-middle">{{$proposal->approvedate}}</td>
                            <td class="text-center align-middle">{{$proposal->rstatus}}</td>
                            <td class="text-center align-middle">{{$proposal->remarks}}</td>
                            <td class="text-center align-middle">
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
            <label>Item Name</label>
            <input wire:model="item_name" class="form-control" type="text">
            <label>Quantity</label>
            <input wire:model="quantity" class="form-control" type="number">
            <label>Cost per unit</label>
            <input wire:model="unit_cost" class="form-control" type="number">
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
