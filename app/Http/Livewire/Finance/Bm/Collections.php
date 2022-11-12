<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Collectedincome;

class Collections extends Component
{
    public $rfrom,$caddress,$cramount,$receiptno,$paytype,$cremarks;
    public $addCollection=false;


    public function render()
    {
        $this->collects = Collectedincome::all();
        return view('livewire.finance.bm.collections');
         
    }

    public function tableReceivable()
    {
        $this->addCollection = true;
    }

    public function addCollections()
    {
        Collectedincome::create(
        [
            'rfrom' => $this->rfrom,
            'caddress' => $this->caddress,
            'cramount' => $this->cramount,
            'receiptno' => $this->receiptno,
            'paytype' => $this->paytype,
            'cremarks' => $this->cremarks,
        ]
    );
    $this->resetCollection();
    toastr()->addSuccess('Add Record successfully');
    $this->addCollection = false; 
    }

    public function resetCollection()
    {
        $this->rfrom = null;
        $this->address = null;
        $this->cramount = null;
        $this->receiptno = null;
        $this->paytype = null;
        $this->cremarks = null;
    }





    
}
