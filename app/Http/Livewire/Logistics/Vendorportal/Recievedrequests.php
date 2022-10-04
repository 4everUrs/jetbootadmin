<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

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
        return view('livewire.logistics.vendorportal.recievedrequests', [
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
            'start' => $data->start,
            'end' => $data->end,
            'location' => $data->location,
            'description' =>$data->description,
        ]);

        $post = Recieved::find($this->selected_id);
        $post->status = 'Posted';
        $post->save();
        
        $this->postModal = false;
    }
        
    

}
