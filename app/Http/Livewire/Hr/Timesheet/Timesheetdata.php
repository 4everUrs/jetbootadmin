<?php

namespace App\Http\Livewire\Hr\Timesheet;

use App\Models\Employee;
use App\Models\Time;
use Livewire\Component;
use App\Models\Timesheet;
use Livewire\WithPagination;


class Timesheetdata extends Component
{
    public $employeeid, $name, $position, $datefrom, $dateto, $totalhours;
    public $addRecord = false;
    public $viewModal = false;

    public $data;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [

        'employeeid' => 'required|string',
        'position' => 'required|string',
        'datefrom' => 'required|string',
        'dateto' => 'required|string',
        'totalhours' => 'required|string'
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
        Timesheet::create([
            'id' => $this->id,
            'name' => $this->name,
            'position' => $this->position,
            'datefrom' => $this->datefrom,
            'dateto' =>  $this->dateto,
            'totalhours' => $this->totalhours,
        ]);

        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;
    }

    public function render()
    {
        return view('livewire.hr.timesheet.timesheetdata', [
            'datas' => Timesheet::paginate(6),
        ]);
    }
    public function viewData($id)
    {

        $this->viewModal = true;
        $this->data = Timesheet::find($id);
        $this->name = $this->data->name;
    }
    public function saveRecord()
    {

        $validatedData = $this->validate();
        Timesheet::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->position = null;
        $this->datefrom = null;
        $this->dateto = null;
        $this->totalhours = null;
    }
}
