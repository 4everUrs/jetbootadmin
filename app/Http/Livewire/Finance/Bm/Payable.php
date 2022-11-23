<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\PayableExpense;

class Payable extends Component
{   
    public $eprequestor, $epdescription, $epaymenttype, $epaymentdate, $epamount;
    public $addPayableExpense=false;
    public $grandpayablexpense;




    public function render()
    {
        $totals = PayableExpense::all();
        foreach($totals as $total){
        $this->grandpayablexpense += $total->epamount;
        }
        return view('livewire.finance.bm.payable',[
            'pexpenses' => PayableExpense::all(),
        ]
    );
    }

    public function payableexpensetable()
    {
        $this->addPayableExpense = true;
    }

    public function addPayableExpenses()
    {
        PayableExpense::create(
            [
                'eprequestor' => $this->eprequestor,
                'epdescription' => $this->epdescription,
                'epaymenttype' => $this->epaymenttype,
                'epaymentdate' => $this->epaymentdate,
                'epamount' => $this->epamount,
            ]
        );
        $this->resetPayableExpense();
        toastr()->addSuccess('Add Record Successfully');
        $this->addPayableExpense = false;    
    }

    public function resetPayableExpense()
    {
        $this->eprequestor = null;
        $this->epdescription = null;
        $this->epaymenttype = null;
        $this->epaymentdate = null;
        $this->epamount = null;
    }






}
