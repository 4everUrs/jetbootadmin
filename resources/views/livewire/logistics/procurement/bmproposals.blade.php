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
                <thead class="bg-info">
                    <th class="text-center align-middle">No.</th>
                    <th class="text-center align-middle">Proposal Name</th>
                    <th class="text-center align-middle">Description</th>
                    <th class="text-center align-middle">Requestor</th>
                    <th class="text-center align-middle">Proposed Amount</th>
                    <th class="text-center align-middle">Approved Amount</th>
                    <th class="text-center align-middle">Status</th>
                    <th class="text-center align-middle">Remarks</th>
                    <th class="text-center align-middle">Action</th>
                </thead>
                <tbody>
                   <tr>
                        <td colspan="9" class="text-center">No Record Found</td>
                    </tr>
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
