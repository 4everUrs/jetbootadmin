<?php

namespace App\Http\Livewire\Hr\Payroll;

use App\Models\Employee;
use App\Models\Time;
use Carbon\Carbon;
use Livewire\Component;

class Timemachine extends Component
{
    public $employee_id;
    public function render()
    {
        
        return view('livewire.hr.payroll.timemachine')->layout('layouts.guest');
    }
    public function timein()
    {
    dd($this->employee_id);
    $time = Carbon::now();
    $employeeData = Employee::find(1);
    dd($employeeData);
        Time::create([
            'id' => $employeeData->id,
            'name' => $employeeData->name,
            'position' => $employeeData->name,
            'department' => $employeeData->name,
            'timein' => Carbon::parse($time)->format('g:i A'),
            'date' => Carbon::parse($time)->toFormattedDateString(),
            'status' => $employeeData = 'present',
        ]);
        $status = 'present';
        toastr()->addSuccess('Time in successful');
        return back();
    }

}
