<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class Budgets extends Component
{
    public $originated,$category,$amount,$account,$description,$status='ongoing';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'originated' => 'required|string',
        'category' => 'required|string',
        'amount' => 'required|integer',
        'account' => 'required|string',
        'description' => 'required|string',
        'status' => 'required|string'
    ];
    
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()

    {
        return view('livewire.finance.bm.budgets',[
            'transactions'=>Transaction::orderBy('id','desc')->paginate(5),   
        ]);

    }
    public function savedata()
    {
        $data=$this->validate();
        Transaction::create($data);
        toastr()->addSuccess('Budget Request Successfully Added');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->originated =null;
        $this->category =null;
        $this->amount =null;
        $this->account =null;
        $this->description =null;
        $this->status =null;
    }
    
}
