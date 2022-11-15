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
    public $item_name, $quantity, $unit_cost;
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
        $subtotal = $this->unit_cost * $this->quantity;
        $shipping = $subtotal * 0.1;
        $tax = $subtotal * 0.18;
        $total = $subtotal + $shipping + $tax;
        BmProposal::create([
            'proposalname' => 'Procurement of ' . $this->item_name,
            'item_name' => $this->item_name,
            'quantity' => $this->quantity,
            'unit_cost' => $this->unit_cost,
            'shipping_fee' => $shipping,
            'tax' => $tax,
            'subtotal' => $subtotal,
            'requestor' => Auth::user()->name,
            'proposedamount' => $total,
            'rstatus' => 'Pending',
            'description' => 'This budget proposal aims to acquire a budget for the acquisition of ' . $this->item_name,
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
                'origin' => 'Logistics-Procurement'
            ]);
            toastr()->addSuccess('Transfer Successfully');
            BmProposal::find($id)->update(['rstatus' => 'Reviewing']);
        } else {
            toastr()->addWarning('Operation Failed');
        }
    }
}
