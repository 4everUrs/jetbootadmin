<?php

namespace App\Http\Livewire\Logistics\Vendor;

use Livewire\Component;
use App\Models\Recieved;
use App\Models\Post;
class Recievedrequests extends Component
{
    public $postModal = false;
    public $title, $requirements=[], $origin, $selected_id = '1';
    
    
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
            'data' => Recieved::find($this->selected_id),
            'datas' => Recieved::find($this->selected_id)->getRequirements,
            
        ]);
    }
    public function loadModal($id)
    {
        $this->selected_id = $id;
        
        $this->postModal = true;
    }
    
    public function savePost(){
        
        $data = Recieved::find($this->selected_id);
        
        Post::create([
            'origin' => $data->origin,
            'recieved_id' => $this->selected_id,
            'type' => $data->type,
            'description' =>$data->description,
        ]);

        $post = Recieved::find($this->selected_id);
        $post->status = 'Posted';
        $post->save();
        
        $this->postModal = false;
    }
        
    

}
