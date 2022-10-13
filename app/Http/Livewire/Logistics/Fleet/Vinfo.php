<?php

namespace App\Http\Livewire\Logistics\Fleet;

use Livewire\Component;
use App\Models\Vehicleinform;
use Livewire\WithPagination;
class Vinfo extends Component
{
    public $origin = 'vinfo', $pnumber, $vmodel, $dname, $status = "Pending";
    public $vehicleModal = false;
    public $information = [];
    public $infoBox =[];
    public $infoTest=[];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
     protected $rules = [
        'origin' => 'required|string',
        'pnumber' => 'required|string',
        'vmodel' => 'required|string',
        'dname' => 'required|string'
        
    ];

    public function saveRequest()
    {
        
        $infoTest = $this->validate();
        Recieved::create($infoTest);
        $pnumber = Recieved::latest('id')->first();
        
        foreach($this->requirements as $index => $requirement){
            PostRequirement::create([
                'recieved_id' => $recieved_id->id,
                'origin' => 'Procurement',
                'requirements' => $requirement['req'],
            ]);
        }
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->vehicleModal = false;
    }


    public function render()
    {
        $this->information;
        return view('livewire.logistics.fleet.vinfo',[
            'Vehicleinforms' => Vehicleinform::orderBy('id','desc')->paginate(5),
        ]);
    }

        public function vehicularModal()
    {
        $this->vehicleModal = true;
    }


    public function saveInfo()
    {

    }

}