<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collectedincome;

class Collections extends Component
{
    public $cname,$caccountno,$cdescription,$cparticular,$creference,$cdatereceive,$cmodeofpayment,$camount;
    public $addCollection=false;
    public $grandcollection;


    public function render()
    {
        $this->collects = Collectedincome::all();
        return view('livewire.finance.bm.collections');
         
    }

    public function tableCollection()
    {
        $this->addCollection = true;
    }

    public function addCollections()
    {
        Collectedincome::create(
        [
            'cname' => $this->cname,
            'caccountno' => $this->caccountno,
            'cdescription' => $this->cdescription,
            'cparticular' => $this->cparticular,
            'creference' => $this->creference,
            'cdatereceive' => $this->cdatereceive,
            'cmodeofpayment' => $this->cmodeofpayment,
            'camount' => $this->camount,
        ]
    );
    $this->resetCollection();
    toastr()->addSuccess('Add Collection successfully');
    $this->addCollection = false; 
    }

    public function resetCollection()
    {
        $this->cname = null;
        $this->caccountno = null;
        $this->cdescription = null;
        $this->cparticular = null;
        $this->cdatereceive = null;
        $this->cmodeofpayment = null;
        $this->camount = null;
    }

    public function sumCollect()
    {
        $totals = Collectedincome::all();
        foreach($totals as $total){
        $this->grandcollection += $total->cramount;
    }
}
}
