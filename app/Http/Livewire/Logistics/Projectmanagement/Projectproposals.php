<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Livewire\Component;
use PDF;

class Projectproposals extends Component
{
    public function render()
    {
        return view('livewire.logistics.projectmanagement.projectproposals');
    }
    public function downloadProposal(Request $request)
    {
        $filename  = rand(10000, 99999);
        $temp = Proposal::find($request->id)->ProposalItem;
        $proposal = Proposal::find($request->id);
        $data = [
            'details' => $temp,
            'proposal' => $proposal,
        ];
        $pdf = PDF::loadView('livewire.logistics.projectmanagement.projectproposals', $data)->setPaper('a4');
        return $pdf->stream('budgetproposal' . $filename . '.pdf');
    }
}
