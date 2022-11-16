<?php

namespace App\Http\Livewire\Finance\Bm;

use App\Models\BmProposal;
use App\Models\Disburse;
use App\Models\ReleaseBudget;
use App\Models\ListRequested;

use App\Models\Transaction;
use Carbon\Carbon;
use Livewire\Component;

class Disbursements extends Component
{
    public $dorigin, $drequestor, $damount, $dremarks, $dstatus;
    public $rorigin, $rcategory, $ramount, $raccount, $rstatus = "Pending";
    public $addRelease = false;

    public function render()
    {
        if ($this->rorigin != null) {
            $temp = ListRequested::find($this->rorigin);
            $this->ramount = $temp->proposedamount;
        }
        return view('livewire.finance.bm.disbursements', [
            'disburses' => ListRequested::where('rstatus', 'Approved')->get(),
            'release' => ReleaseBudget::all(),
        ]);
    }

    public function tableApprovedBudget()
    {

        $this->addRelease = true;
    }

    public function release($id)
    {
        ReleaseBudget::find($id)->update([
            'rstatus' => 'Released',
        ]);
        toastr()->addSuccess('Budget Released');
    }

    public function addReleases()
    {
        ReleaseBudget::create(
            [
                'list_requested_id' => $this->rorigin,
                'rcategory' => $this->rcategory,
                'raccount' => $this->raccount,
                'rstatus' => $this->rstatus,
            ]
        );
        $this->resetRelease();
        toastr()->addSuccess('Release Budget Successfully');
        $this->addRelease = false;
    }

    public function resetRelease()
    {
        $this->rorigin = null;
        $this->rcategory = null;
        $this->ramount = null;
        $this->raccount = null;
        $this->rstatus = 'Released';
    }
}
