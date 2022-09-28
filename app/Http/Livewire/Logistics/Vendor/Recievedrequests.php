<?php

namespace App\Http\Livewire\Logistics\Vendor;

use Livewire\Component;
use App\Models\Recieved;
use App\Models\Post;
class Recievedrequests extends Component
{
    public $postModal = false;
    public $title, $requirements, $origin, $selected_id;
    protected $rules = [
        'title' => 'required|string',
        'requirements' => 'required|string',
        'origin' => 'required|string'
    ];
   
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    

    public function render()
    {
        return view('livewire.logistics.vendor.recievedrequests', [
            'recieveds'=>Recieved::get(),
        ]);
    }
    public function grant($id)
    {
        $this->postModal = true;
        $this->selected_id = $id;
        $post = Recieved::find($id);
        $this->origin = $post->origin;
        
    }
    public function savePost(){
        $validatedData = $this->validate();
        Post::create($validatedData);

        $post = Recieved::find($this->selected_id);
        $post->status = 'Posted';
        $post->save();
        
        $this->postModal = false;
    }
        
    

}
