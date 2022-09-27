<?php

namespace App\Http\Livewire\Logistics\Vendor;

use Livewire\Component;
use App\Models\Post;
class Supplierposting extends Component
{
    public $title, $requirements, $origin;
    protected $rules = [
        'title' => 'required|string',
        'requirements' => 'required|string'
    ];
   
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public $postmodal = false;
    public function render()

    {
        return view('livewire.logistics.vendor.supplierposting',[
            'posts'=>Post::get(),
        ]);

    }
    public function showmodal(){
        $this-> postmodal=true;
    }

    public function savepost(){
    

            $validateddata = $this->validate();
            Post::create($validateddata);
            toastr()->addWarning('Successfully Posted');
            $this->resetInput();
            $this-> postmodal=false;
    }
    public function resetInput(){
        $this->title = null;
        $this->requirements = null;
    }
}

