<?php

namespace App\Http\Livewire\Hr\Leavemanagement;

use App\Models\Approval;
use App\Models\Disapproval;
use Livewire\Component;
use App\Models\Leave;
use Livewire\WithPagination;

class Leavedata extends Component
{
    public $name, $type, $position, $reason, $datestart, $dateend, $status = 'Pending';
    public $addRecord = false;
    public $viewModal = false;
    public $modalApprove = false;
    public $modalDisapprove = false;
    public $data;
    public $selected_id;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|string',
        'type' => 'required|string',
        'position' => 'required|string',
        'reason' => 'required|string',
        'datestart' => 'required|string',
        'dateend' => 'required|string',
        'status' => 'required|string'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function approveModal($id)
    {
        $this->selected_id = $id;
        $this->modalApprove = true;
    }
    public function disapproveModal($id)
    {
        $this->selected_id = $id;
        $this->modalDisapprove = true;
    }
    public function showModal()
    {
        $this->addRecord = true;
    }
    public function confirm()
    {
        $temp = Leave::find($this->selected_id);
        Approval::create([
            'name' => $temp->name,
            'type' => $temp->type,
            'position' => $temp->position,
            'reason' => $temp->reason,
            'datestart' => $temp->datestart,
            'dateend' => $temp->dateend,
            'status' => $temp->status = 'Approve',
        ]);
        $temp->status = 'Approved';
        $temp->save();
        $temp->destroy($this->selected_id);
        toastr()->addSuccess('Success');
        $this->dispatchBrowserEvent('close-modal');
        $this->modalApprove = false;
    }
    public function disconfirm()
    {
        $temp = Leave::find($this->selected_id);
        Disapproval::create([
            'name' => $temp->name,
            'type' => $temp->type,
            'position' => $temp->position,
            'reason' => $temp->reason,
            'datestart' => $temp->datestart,
            'dateend' => $temp->dateend,
            'status' => $temp->status = 'Disapproved',
        ]);
        $temp->status = 'Disapproved';
        $temp->save();
        $temp->destroy($this->selected_id);
        toastr()->addSuccess('Success');
        $this->dispatchBrowserEvent('close-modal');
        $this->modalDisapprove = false;
    }
    public function saveData()
    {
        $validatedData = $this->validate();
        Leave::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }
    public function render()
    {
        return view('livewire.hr.leavemanagement.leavedata', [
            'datas' => Leave::paginate(6)
        ]);
    }
    public function viewData($id)
    {

        $this->viewModal = true;
        $this->data = Leave::find($id);
        $this->name = $this->data->name;
    }

    public function resetInput()
    {
        $this->name = null;
        $this->type = null;
        $this->position = null;
        $this->reason = null;
        $this->datestart = null;
        $this->dateend = null;
    }
}
