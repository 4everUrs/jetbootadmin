<?php

namespace App\Http\Livewire\Hr\Hr;

use Livewire\Component;
use App\Models\Analytic;

class Analyticdata extends Component
{
    public $label, $price;
    
    public function render()
    {
        return view('livewire.hr.hr.analyticdata');
    }
    public function analytics(){

            $label = ['Shirts', 'T-Shirt', 'Pants', 'Coat', 'Kurta', 'Pajama'];
            $price = ['10', '5', '100', '90', '50', '30'];
            return view('livewire.hr.hr.analyticdata',['labels' => $label, 'prices' => $price]);
        


    }
}
