<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\ReserveInforms;
use Livewire\Component;

class Reservation extends Component
{   
    public $reserveModal = false;
    public $selected_id;
    public $reservations= [];
    public $origin = 'vinfo', $pnumber, $vmodel, $driver_name, $status = "Pending";
    public function render()
    {   
         $this->reservations;
        return view('livewire.logistics.fleet.reservation');([
       
            'ReserveInform' => ReserveInforms::orderBy('id', 'desc')->paginate(5),
            'Reserves' => Reserve::all(),
        ]);
    }

  

}