<?php

namespace App\Http\Livewire\Hr\Leavemanagement;

use App\Models\Disapproval as ModelsDisapproval;
use Livewire\Component;
use Livewire\WithPagination;

class Disapproval extends Component
{
    use WithPagination;
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire..hr.leavemanagement.disapproval',[
            'datas' => ModelsDisapproval::paginate(10),
        ]);
    }
    public function delete($id)
    {
        $Approval = ModelsDisapproval::where('id',$id)->first();
        if($Approval->showModal){
            flash()->addWarning('Data is already deleted');
        }
        else{
            $Approval->showModal;
            $Approval->delete();
            flash()->addSuccess('Data deleted successfully');
        }
        
    }
}
