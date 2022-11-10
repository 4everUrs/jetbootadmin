<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
    
class UleaveController extends Controller
{
    public  $name, $type, $position, $reason, $datestart, $dateend, $status;
    public $id;
    public function uleave()
    {
        return view('uleave'    );
    }
    public function leaving()
    {
        Leave::create([
            'name' => $this->name,
            'type' => $this->type,
            'position' => $this->position,
            'reason' => $this->reason,
            'datestart' => $this->datefrom,
            'dateend' =>  $this->dateto,
            'status' => $this->totalhours,
        ]);
    
        $this->resetInput();
        toastr()->addSuccess('Data added successfully');
        $this->addRecord = false;

        // public function saveRequest(){
        //     $validateddata = $this->validate([
        //     'position' => 'required|string',
        //     'salary' => 'required|string',  
        //     'details' => 'required|string',  
        //     ]);
        //     $client = Job::find($this->name);
        //     $client->position = $validateddata['position'];
        //     $client->salary = $validateddata['salary'];
        //     $client->details = $validateddata['details'];
        //     $client->save();
        //     flash()->addSuccess('Data update successfully');
        //     $this->resetInput();
        //     $this->showModal = false;
        // }
        // Leave::create([
        //     'id' => $this->id,
        //     'name' => $this->name,
        //     'type' => $this->type,
        //     'position' => $this->position,
        //     'reason' => $this->reason,
        //     'datestart' => $this->datestart,
        //     'dateend' => $this->dateend,
        //     'status' => $this->status = "Pending",
        // ]);
      
        // $this->save();
        // return back('uleave');

    }
}
