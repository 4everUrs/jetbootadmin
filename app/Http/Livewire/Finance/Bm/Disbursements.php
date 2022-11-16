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
    public $rorigin, $rcategory, $ramount, $raccount, $rstatus="Released";
    public $addRelease=false;

    public function render()
    {

        return view('livewire.finance.bm.disbursements',[
            'disburses' => Disburse::all(),
            'release' => ReleaseBudget::all(),
        ]);
    }
    
    public function tableApprovedBudget(){

        $this->addRelease = true;
    }

    public function addReleases(){
        ReleaseBudget::create(
            [
                'rorigin' => $this->rorigin,
                'rcategory' => $this->rcategory,
                'ramount' => $this->ramount,
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

