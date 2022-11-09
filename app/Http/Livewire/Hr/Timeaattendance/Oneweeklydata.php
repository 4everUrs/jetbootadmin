<?php

namespace App\Http\Livewire\Hr\Timeaattendance;

use App\Models\Time;
use Livewire\Component;
use Livewire\WithPagination;

class Oneweeklydata extends Component
{
    public $name, $position, $department, $timein, $timeout, $date, $status;
    public $addRecord = false;
    public $viewModal = false;
    
    public $data;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        $this->data;
        return view('livewire.hr.timeaattendance.weeklydata',[
            'datas' => Time::paginate(6),]);
    }
  
}
