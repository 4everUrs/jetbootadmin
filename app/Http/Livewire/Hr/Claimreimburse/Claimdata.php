<?php

namespace App\Http\Livewire\Hr\Claimreimburse;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Claim;

class Claimdata extends Component
{
    public $item, $purchasedate, $purchaseby, $amount, $paidby, $status = 'pending';
    public $claimModal = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'item' => 'required|string',
        'purchasedate' => 'required|string',
        'purchaseby' => 'required|string',
        'amount' => 'required|string',
        'paidby' => 'required|string',
        'status' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.hr.claimreimburse.claimdata',[
            'datas' => Claim::paginate(6),
        ]);
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Claim::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->item = null;
        $this->purchasedate = null;
        $this->purchaseby = null;
        $this->amount= null;
        $this->paidby = null;
        $this->status = null;
    }
}
