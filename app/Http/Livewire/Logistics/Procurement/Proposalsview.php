<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Models\BmProposal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;
use PDF;

class Proposalsview extends Component
{
    public function render()
    {
        return view('livewire.logistics.procurement.proposalsview');
    }
    public function downloadProposal(Request $request)
    {
        $filename  = rand(10000, 99999);
        $temp = BmProposal::find($request->id);
        $data = [
            'details' => $temp
        ];
        $pdf = PDF::loadView('livewire.logistics.procurement.proposalsview', $data)->setPaper('a4');
        return $pdf->stream('budgetproposal' . $filename . '.pdf');
    }
}
