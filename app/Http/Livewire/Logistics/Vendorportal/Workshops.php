<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use App\Models\MroRequest;
use App\Models\Workshop;
use Livewire\Component;

class Workshops extends Component
{
    public $approveModal = false;
    public $denyModal = false;
    public $selected_id;
    public function render()
    {
        return view('livewire.logistics.vendorportal.workshops', [
            'workshops' => Workshop::all(),
        ]);
    }
    public function loadModal($id)
    {
        $this->selected_id = $id;
        $this->approveModal = true;
    }
    public function showModal($id)
    {
        $this->selected_id = $id;
        $this->denyModal = true;
    }
    public function grant()
    {
        $temp = Workshop::find($this->selected_id);
        $temp->status = 'Granted';
        $temp->save();
        $this->approveModal = false;
        toastr()->addSuccess('Granted Successfully');
    }
    public function deny()
    {
        $temp = Workshop::find($this->selected_id);
        $temp->status = 'Denied';
        $temp->save();
        $this->denyModal = false;
        toastr()->addInfo('Deny Successfully');
    }
}
