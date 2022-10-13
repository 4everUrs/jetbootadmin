<?php

namespace App\Http\Livewire\Logistics\Fleet;

use App\Models\RepairRequest;
use Livewire\Component;
class Romrequest extends Component
{
    public $origin = 'Romrequest', $description, $status = "Pending", $type;
    public $repairModal = false;
    public $repairs = [];
    public $rep_id;
    public $itemBox = [];
   
    protected $rules = [
        'origin' => 'required|string',
        'pnumber' => 'required|string',
        'vbrand' => 'required|string',
        'vmod' => 'required|string',
    ];
    public function render()
    {
        $this->repairs;
        return view('livewire.logistics.fleet.romrequest',[
            'repairs' => RepairRequest::orderBy('id','desc')->paginate(5),
        ]);
    }
    
    public function repairModal()
    {
        $this->repairModal = true;
    }
    

    public function addrepairRow()
    {
        $this->repairs[] = [''];
        }

    public function removerepairRow($index){
        
            unset($this->repairs[$index]);
            $this->repairs = array_values($this->repairs);
        }

    public function insertRep()
        {
            $rep_id = RepairRequest::latest('id')->first();
            foreach ($this->itemBox as $index => $stat){
                rep_item::create([
                'origin' => $stat['origin'],
                'pnumber'=> $stat['pnumber'],
                'vnumber'=> $stat['vnumber'],
                'vmod'=> $stat['vmod'],
                'repair_req_id'=> $rep_id->id,
                'rep_id' => $this->repair_id,
            ]);
            }      
            toastr()->addSuccess('Data update successfully');
        $this->resetAll();
        $this->repairModal = false;  
        }

        public function resetAll(){
            $this->origin = null;
            $this->pnumber = null;
            $this->vbrand = null;
            $this->vmodel = null;
           }


    }

