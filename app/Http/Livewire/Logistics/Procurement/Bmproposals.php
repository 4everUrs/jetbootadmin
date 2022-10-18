<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\ListRequested;
use App\Models\Reorder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bmproposals extends Component
{
    public $budgetProposalModal = false;
    public $name, $amount, $description;
    public function render()
    {
        return view('livewire..logistics.procurement.bmproposals', [
            'reorders' => Reorder::with('Supplier')->get(),
        ]);
    }
    public function createBudgetProposal()
    {
        ListRequested::create([
            'proposalname' => $this->name,
            'requestor' => Auth::user()->name,
            'proposedamount' => $this->amount,
            'rstatus' => 'Pending',

        ]);
        toastr()->addSuccess('Budget Proposal Created');
        $this->reset();
        $this->budgetProposalModal = false;
    }
}
