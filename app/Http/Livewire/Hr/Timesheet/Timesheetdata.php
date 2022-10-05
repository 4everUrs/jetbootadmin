<?php

namespace App\Http\Livewire\Hr\Timesheet;

use Livewire\Component;
use App\Models\Timesheet;
use Livewire\WithPagination;


class Timesheetdata extends Component
{
    public $name, $position, $datefrom, $dateto, $totalhours;
    public $timesheetModal = false;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'name' => 'required|string',
        'position' => 'required|string',
        'datefrom' => 'required|string',
        'dateto' => 'required|string',
        'totalhours' => 'required|string'
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.hr.timesheet.timesheetdata',[
            'datas' => Timesheet::paginate(6),
        ]);
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Timesheet::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->name = null;
        $this->position = null;
        $this->datefrom = null;
        $this->dateto= null;
        $this->totalhours = null;
    }
}
