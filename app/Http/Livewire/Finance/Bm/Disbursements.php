<?php

namespace App\Http\Livewire\Finance\Bm;

use App\Models\BmProposal;
use App\Models\Disburse;
use App\Models\ListRequested;
use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class Disbursements extends Component
{
    public $dorigin, $drequestor, $damount, $dremarks, $dstatus;
    public $addRelease=false;

    public function render()
    {

        return view('livewire.finance.bm.disbursements',[
            'disburses' => Disburse::all(),
        ]);
    }
    public function approvedBudget($id)
    {

        $approved = Transaction::find($id);
        $approved->status = 'Approved';
        $approved->save();

        $request = ListRequested::find($approved->list_requested_id);
        $request->approvedamount = $approved->amount;
        $request->approvedate = Carbon::parse(now())->toFormattedDateString();
        $request->remarks = $approved->description;
        $request->rstatus ='Approved';
        $request->save();


        toastr()->addSuccess('Operation Successfull');
    }

    public function denyBudget($id)
    {
        $deny = Transaction::find($id);
        $deny->status = 'Denied';
        $deny->save();

        $request = ListRequested::find($deny->list_requested_id);
        $request->approvedamount = $deny->amount;
        $request->approvedate = Carbon::parse(now())->toFormattedDateString();
        $request->remarks = $deny->description;
        $request->rstatus = 'Denied';
        $request->save();

        toastr()->addSuccess('Operation Successfull');
    }

    public function tableApprovedBudget(){

        $this->addRelease = true;
    }

}

