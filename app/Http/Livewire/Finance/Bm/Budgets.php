<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Transaction;
use App\Models\Expenses;
use App\Models\ListRequested;
use Livewire\WithPagination;
use App\Models\Disburse;

class Budgets extends Component
{
    public $borigin, $bproposalname, $brequestor, $bproposedamount, $bapprovedate, $brstatus = 'Ongoing',$bremarks, $transaction_id;
    public $rstatus;
    public $grandtotals, $requests;
    public $addBudget = false;
    public $updateItem = false;
    public $deleteItem = false;
    public $deleteRequest = false; // wire:model for delete modal no declare so i declare.

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()

    {
        $this->grandtotals;
        return view('livewire.finance.bm.budgets', [
            'transactions' => Transaction::orderBy('id', 'desc')->paginate(10),
            'requestsLists' => ListRequested::where('rstatus', '=', 'Pending')->get(),
        ]);
    }
    //public function approvedBudget()
    
        //$approved = Transaction::all();
        //$approved->rstatus = 'Approved';
        //$approved->save();

        //$request = ListRequested::find($approved->list_requested_id);
        //$request->approvedamount = $approved->amount;
        //$request->approvedate = Carbon::parse(now())->toFormattedDateString();
        //$request->remarks = $approved->description;
        //$request->rstatus ='Approved';
        //$request->save();

        //toastr()->addSuccess('Operation Successfull');
    
    //public function denyBudget()
    
        //$deny = Transaction::all();
        //$deny->rstatus = 'Denied';
        //$deny->save();

        //$request = ListRequested::find($deny->list_requested_id);
        //$request->approvedamount = $deny->amount;
        //$request->approvedate = Carbon::parse(now())->toFormattedDateString();
        //$request->remarks = $deny->description;
        //$request->rstatus = 'Denied';
        //$request->save();

        //toastr()->addSuccess('Operation Successfull'); 
}
