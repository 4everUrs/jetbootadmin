<?php

namespace App\Http\Livewire\Hr\Hr;

use Livewire\Component;
use App\Models\Analytic;
use App\Models\Compensation;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Time;

class Analyticdata extends Component
{
    public $label, $price;
    
    public function render()
    {
        $temp = Time::all();
        $this->times = count($temp);

        $temp = Leave::all();
        $this->leaves = count($temp);

        $temp = Compensation::all();
        $this->compensations = count($temp);

        $temp = Employee::all();
        $this->employees = count($temp);
        return view('livewire.hr.hr.analyticdata');
    }
    public function analytics(){

            $label = ['Shirts', 'T-Shirt', 'Pants', 'Coat', 'Kurta', 'Pajama'];
            $price = ['10', '5', '100', '90', '50', '30'];
            return view('livewire.hr.hr.analyticdata',['labels' => $label, 'prices' => $price]);
        


    }
}
