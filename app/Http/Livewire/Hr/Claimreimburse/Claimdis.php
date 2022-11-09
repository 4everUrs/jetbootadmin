<?php

namespace App\Http\Livewire\Hr\Claimreimburse;

use App\Models\Claimdis as ModelsClaimdis;
use Livewire\Component;

class Claimdis extends Component
{
    public $modalRemove = false;
    public function removeModal($id){
        $this->selected_id =$id;
        $this->modalRemove = true;
    }
    public function remove($id)
    {
        $Approval = ModelsClaimdis::where('id',$id)->first();
        if($Approval->showModal){
            flash()->addWarning('Data is already deleted');
        }
        else{
            $Approval->showModal;
            $Approval->delete();
            flash()->addSuccess('Data deleted successfully');
        }
        
    }
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function delete($id)
    {
        $Approval = ModelsClaimdis::where('id',$id)->first();
        if($Approval->showModal){
            flash()->addWarning('Data is already deleted');
        }
        else{
            $Approval->showModal;
            $Approval->delete();
            flash()->addSuccess('Data deleted successfully');
        }
        
    }
    public function render()
    {
        return view('livewire..hr.claimreimburse.claimdis',[
            'datas' => ModelsClaimdis::paginate(10),
        ]); 
    }
}
