<?php

namespace App\Http\Livewire\Logistics\Vendorportal;

use App\Models\MroRequest;
use Livewire\Component;
use App\Models\Recieved;
use App\Models\Post;
use App\Models\ProcurementSentRequest;
use App\Models\RequestNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Recievedrequests extends Component
{
    public $postModal = false;
    public $title, $requirements = [], $origin, $selected_id;
    public $data, $datas;


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

        if (!empty($this->selected_id)) {
            $this->data = Recieved::find($this->selected_id);
            $this->datas = Recieved::find($this->selected_id)->getRequirements;
        }

        return view('livewire.logistics.vendorportal.recievedrequests', [
            'recieveds' => Recieved::orderBy('id', 'desc')->paginate(10),
            'requests' => MroRequest::orderBy('id', 'desc')->paginate(10),
        ]);
    }
    public function loadModal($id)
    {
        $this->selected_id = $id;

        $this->postModal = true;
    }

    public function savePost()
    {

        $data = Recieved::find($this->selected_id);
        if ($data->status != 'Posted') {
            Post::create([
                'origin' => $data->origin,
                'recieved_id' => $this->selected_id,
                'type' => $data->type,
                'start' => $data->start,
                'end' => $data->end,
                'location' => $data->location,
                'description' => $data->description,
                'item_name' => $data->item_name,
                'quantity' => $data->quantity
            ]);
            Recieved::find($this->selected_id)->update(['status' => 'Posted']);
            RequestNotification::create([
                'user_id' => Auth::user()->id,
                'sender' =>  Auth::user()->currentTeam->name,
                'department' => 'Logistics',
                'reciever' => 'Procurement',
                'request_content' => 'Aprove your request',
                'routes' => 'requests'
            ]);
            $x = ProcurementSentRequest::find($this->selected_id);
            $x->status = 'Approved';
            $x->approval_date = Carbon::parse(now())->toFormattedDateString();
            $x->save();
            $this->postModal = false;
        } else {
            toastr()->addWarning('Already Posted');
            $this->postModal = false;
        }
    }
}
