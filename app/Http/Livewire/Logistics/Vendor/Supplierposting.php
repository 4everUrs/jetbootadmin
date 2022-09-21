<?php

namespace App\Http\Livewire\Logistics\Vendor;

use Livewire\Component;
use App\Models\Post;
class Supplierposting extends Component
{
    public $title, $requirements;
    protected $rules = [
        'title' => 'string',
        'requirements' => 'string',
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public $postmodal = false;
    public function render()

    {
        return view('livewire.logistics.vendor.supplierposting');

    }
    public function showmodal(){
        $this-> postmodal=true;
    }

    public function savepost(){

            $validateddata = $this->validate();
    
            Post::create($validateddata);
            $this-> postmodal=false;
    }
}

