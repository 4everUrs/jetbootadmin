<?php

namespace App\Http\Livewire\Hr\Claimreimburse;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Claim;
use App\Models\Claimapprove;
use App\Models\Claimdis;

class Claimdata extends Component
{
    public $item, $purchasedate, $purchaseby, $amount, $paidby, $status = 'pending';
    public $addRecord = false;
    public $viewModal = false;
    public $modalApprove= false;
    public $modalDisapprove= false;
    public $data;
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
    public function showModal()
    {
        $this->addRecord = true;
    }
    public function saveData()
    {
        $validatedData = $this->validate();
        Claim::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }
    public function render()
    {
        return view('livewire.hr.claimreimburse.claimdata',[
            'datas' => Claim::paginate(6),
        ]);
    }
    public function viewData($id){
        
        $this->viewModal = true;
        $this->data = Claim::find($id);
        $this->name = $this->data->name;
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Claim::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function approveModal($id){
        $this->selected_id =$id;
        $this->modalApprove = true;
    }
    public function disapproveModal($id){
        $this->selected_id =$id;
        $this->modalDisapprove = true;
    }
    public function confirm(){
        $temp = Claim::find($this->selected_id);
        Claimapprove::create([
            'item' => $temp->item,
            'purchasedate' => $temp->purchasedate,
            'purchaseby' => $temp->purchaseby,
            'amount' => $temp->amount,
            'paidby' => $temp->paidby,
            'status' => $temp->status = 'Approve',
        ]);
        $temp->status = 'Approved';
        $temp->save();
        $temp->destroy($this->selected_id);
        toastr()->addSuccess('Success');
        $this->dispatchBrowserEvent('close-modal');
        $this->modalApprove = false;
        }
        public function disconfirm(){
            $temp = Claim::find($this->selected_id);
            Claimdis::create([
            'item' => $temp->item,
            'purchasedate' => $temp->purchasedate,
            'purchaseby' => $temp->purchaseby,
            'amount' => $temp->amount,
            'paidby' => $temp->paidby,
           'status' => $temp->status = 'Disapproved',
            ]);
            $temp->status = 'Disapproved';
            $temp->save();
            $temp->destroy($this->selected_id);
            toastr()->addSuccess('Success');
            $this->dispatchBrowserEvent('close-modal');
            $this->modalDisapprove = false;

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
