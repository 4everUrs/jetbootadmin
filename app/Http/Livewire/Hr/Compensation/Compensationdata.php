<?php

namespace App\Http\Livewire\Hr\Compensation;

use App\Models\Claimed;
use App\Models\Claiming;
use App\Models\Compensation;
use App\Models\Leave;
use Livewire\Component;
use Livewire\WithPagination;

class Compensationdata extends Component
{

        public $name, $position, $basepay, $benefits, $insentives, $insurance, $overall, $status = "Ready To Claim  ";
        public $addRecord = false;
        public $viewModal = false;
        public $modalApprove= false;
    
        public $data;
        use WithPagination;
        protected $paginationTheme = 'bootstrap';
        protected $rules = [
            'name' => 'required|string',
            'position' => 'required|string',
            'basepay' => 'required|integer',
            'benefits' => 'required|integer',
            'insentives' => 'required|integer',
            'insurance' => 'required|integer',
            'overall' => 'required|string',
            'status' => 'required|string',
        ];
        
        public function updated($fields)
        {
            $this->validateOnly($fields);
        }
        public function showModal()
    {
        $this->addRecord = true;
    }
  

    public function approveModal($id){
        $this->selected_id =$id;
        $this->modalApprove = true;
    }
    public function saveData()
    {
        Compensation::create([
                'name' => $this->name,
                'position' => $this->position,
                'basepay' => $this->basepay,
                'benefits' => $this->benefits,
                'insentives' => $this->insentives,
                'insurance' => $this->insurance,
                'overall' => $this->basepay + $this->benefits + $this->insentives + $this->insurance,
                'status' => $this->status = 'Ready To Claim',
            ]);
          
            $this->resetInput();
            toastr()->addSuccess('Success');
            $this->addRecord = false;
            
            
        }
    public function render()
    {
        return view('livewire.hr.compensation.compensationdata',[
            'datas' => Compensation::paginate(10)
        ]);
    }
    public function confirm(){
        $temp = Compensation::find($this->selected_id);
        Claiming::create([
            'name' => $temp->name,
            'position' => $temp->position,
            'basepay' => $temp->basepay,
            'benefits' => $temp->benefits,
            'insentives' => $temp->insentives,
            'insurance' => $temp->insurance,
            'overall' => $temp->overall,
            'status' => $temp->status = 'Already Claimed',
        ]);
        $temp->save();
        $temp->destroy($this->selected_id);
        toastr()->addSuccess('Success');
        $this->dispatchBrowserEvent('close-modal');
        $this->modalApprove = false;
        }
    public function viewData($id){
        
        $this->viewModal = true;
        $this->data = Compensation::find($id);
        $this->name = $this->data->name;
    }
    public function saveRecord(){
        $validatedData = $this->validate();
        Compensation::create($validatedData);
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->dispatchBrowserEvent('close-modal');
    }
    public function resetInput(){
        $this->name = null;
        $this->position = null;
        $this->basepay = null;
        $this->benefits= null;
        $this->insentives = null;
        $this->insurance = null;
        $this->overall = null;
        $this->status = null;

    }


}
