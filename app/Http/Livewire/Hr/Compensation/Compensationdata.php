<?php

namespace App\Http\Livewire\Hr\Compensation;

use App\Models\Compensation;
use Livewire\Component;
use Livewire\WithPagination;

class Compensationdata extends Component
{

        public $name, $position, $basepay, $benefits, $insentives, $insurance;
        public $compensationModal = false;
        use WithPagination;
        protected $paginationTheme = 'bootstrap';
        protected $rules = [
            'name' => 'required|string',
            'position' => 'required|string',
            'basepay' => 'required|string',
            'benefits' => 'required|string',
            'insentives' => 'required|string',
            'insurance' => 'required|string'
        ];
    
        public function updated($fields)
        {
            $this->validateOnly($fields);
        }

    public function render()
    {
        return view('livewire.hr.compensation.compensationdata',[
            'datas' => Compensation::paginate(6)
        ]);
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
    }


}
