<?php

namespace App\Http\Livewire\Finance\Bm;
use App\Models\Disburse;
use App\Models\Transaction;

use Livewire\Component;

class Disbursements extends Component
{
    public $originated,$category,$amount,$account,$description,$status='Ongoing',$transaction_id;
   
    public function render()
    {
        
        return view('livewire.finance.bm.disbursements',[
            'transactions'=>Transaction::orderBy('id','desc')->paginate(5),
        ]);
        
    }
    public function approvedBudget($id)
    {
        $approved = Transaction::find($id);
        $approved->status='Approved';
        $approved->save();
    }

    public function denyBudget($id)
    {
        $deny = Transaction::find($id);
        $deny->status='Denied';
        $deny->save();
    }

    
}
