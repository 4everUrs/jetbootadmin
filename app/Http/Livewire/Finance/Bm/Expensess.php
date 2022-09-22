<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Expenses;
use Livewire\WithPagination;

class Expensess extends Component
{
    public $eoriginated ,$ecategory ,$eamount,$eaccount,$edescription,$estatus='ongoing';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'eoriginated' => 'required|string',
        'ecategory' => 'required|string',
        'eamount' => 'required|integer',
        'eaccount' => 'required|string',
        'edescription' => 'required|string',
        'estatus' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.finance.bm.expensess',[
            'expenses'=>Expenses::orderBy('id','desc')->paginate(5),
        ]);
    }
    public function savedata()
    {
        
        $data=$this->validate();
        Expenses::create($data);
        toastr()->addSuccess('Expenses Successfully Added');
        $this->resetInput();
        $this->dispatchBrowserEvent('close-modal');

    }
    public function resetInput()
    {
        $this->eoriginated = null;
        $this->ecategory = null;
        $this->eamount = null;
        $this->eaccount = null;
        $this->edescription = null;
        $this->estatus = null;
    }
}
