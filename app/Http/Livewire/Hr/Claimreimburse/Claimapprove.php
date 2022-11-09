<?php

namespace App\Http\Livewire\Hr\Claimreimburse;

use App\Models\Claimapprove as ModelsClaimapprove;
use Livewire\Component;

class Claimapprove extends Component
{
    
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function delete($id)
    {
        $Approval = ModelsClaimapprove::where('id',$id)->first();
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
        return view('livewire..hr.claimreimburse.claimapprove',[
            'datas' => ModelsClaimapprove::paginate(10),
        ]);
    }
}
