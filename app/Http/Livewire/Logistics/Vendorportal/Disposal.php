<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use Livewire\Component;
use App\Models\Shop;
use App\Models\Image;
use App\Models\VendorShop;

class Disposal extends Component
{
   
    public $postModal = false;
    public $selected_id;
    public function render()
    {
        return view('livewire.logistics.vendorportal.disposal',[
            'items' => Shop::all(),
        ]);
    }
    public function mount()
    {
        // $test = Image::with('shop')->get();
        // dd($test);
    }
    public function post($id)
    {
        $this->selected_id = $id;
        $this->postModal = true;
    }
    
    public function listPost()
    {
       $temp = Shop::find($this->selected_id);
       VendorShop::create([
            'item_name' => $temp->item_name,
            'condition' => $temp->condition,
            'description' => $temp->description,
            'amount' => $temp->amount,
            'status' => $temp->status,
            'thumbnail' => $temp->thumbnail,
            'origin' => $temp->origin,
       ]);
        toastr()->addSuccess('Request Success sent!.');
        $temp->status = 'Posted';
        $temp->save();
        $this->postModal = false;
    }
}
