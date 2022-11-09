<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use PDF;

class DownloadProposalController extends Controller
{
    public function proposalDownload(Request $request)
    {

        $data = [
            'proposalDetail' => Proposal::with('user')->find($request->id),
        ];
        $pdf = PDF::loadView('proposal-view', $data);
        return $pdf->download('proposal.pdf');
    }
}
