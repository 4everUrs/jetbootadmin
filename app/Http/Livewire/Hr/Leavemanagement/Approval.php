<?php

namespace App\Http\Livewire\Hr\Leavemanagement;

use App\Models\Approval as ModelsApproval;
use Livewire\Component;
use Livewire\WithPagination;
class Approval extends Component
{
 

    use WithPagination;
    public function showModal()
    {
        $this->deleteRecord = true;
    }
    public function deleteModal($id)
    {
        $this->selected_id=$id;
        $this->deleteModal = true;
    }
    public function delete($id)
    {
        $Approval = ModelsApproval::where('id',$id)->first();
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

    public function render()
    {
        return view('livewire..hr.leavemanagement.approval',[
            'datas' => ModelsApproval::paginate(10),
        ]);
    }
}
