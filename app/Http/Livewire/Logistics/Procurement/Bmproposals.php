<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\BmProposal;
use App\Models\ListRequested;
use App\Models\Reorder;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Bmproposals extends Component
{
    public $budgetProposalModal = false;
    public $name, $amount, $description;
    use WithPagination;
    public function render()
    {
        return view('livewire.logistics.procurement.bmproposals', [
            'reorders' => Reorder::with('Supplier')->get(),
            'proposals' => BmProposal::orderBy('id', 'desc')->paginate(10),
        ]);
    }
    public function createBudgetProposal()
    {
        BmProposal::create([
            'proposalname' => $this->name,
            'requestor' => Auth::user()->name,
            'proposedamount' => $this->amount,
            'rstatus' => 'Pending',
            'description' => $this->description,
        ]);
        toastr()->addSuccess('Budget Proposal Created');
        $this->reset();
        $this->budgetProposalModal = false;
    }
    public function transfer($id)
    {
        $temp = BmProposal::find($id);
        if (BmProposal::find($id)->rstatus == 'Pending') {
            ListRequested::create([
                'proposalname' => $temp->proposalname,
                'requestor' => $temp->requestor,
                'proposedamount' => $temp->proposedamount,
                'rstatus' => 'Pending',
                'remarks' => $temp->description,
            ]);
            toastr()->addSuccess('Trasnfer Successfully');
            BmProposal::find($id)->update(['rstatus' => 'Reviewing']);
        } else {
            toastr()->addWarning('Operation Failed');
        }
    }
}
