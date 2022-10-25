<?php

namespace App\Http\Livewire\Core\Nhb;

use App\Models\ApplicantList;
use Livewire\Component;
use App\Models\Onboard;
use App\Models\LocalEmployee;
use App\Models\LocalPlacement;
use Carbon\Carbon;

class Onboarding extends Component
{
    public $showOnboard = false;
    public $name, $age, $gender, $company_name, $position, $status = 'Hired', $contract, $resume_file;
    public $selected_id,$value,$terms;

    public function render()
    {
        return view('livewire.core.nhb.onboarding', [
            'onboards' => Onboard::all(),
            'employee' => LocalPlacement::where('status','=','Deployed')->get(),
        ]);
    }
    public function showModal($id){
        $this->selected_id = $id;
        $this->showOnboard = true;
    }
    public function saveOnboard()
    {
        $this->contract = $this->value .' '.$this->terms;
        $validateddata = $this->validate([
            'age' => 'required|string',
            'gender' => 'required|string',
            'contract' => 'required|string',
        ]);
        $temp = Onboard::find($this->selected_id);
        $temp->age = $validateddata['age'];
        $temp->gender = $validateddata['gender'];
        $temp->contract = $validateddata['contract'];
        $temp->status = 'Hired';
        if($this->terms == 'months'){
            $temp->endo = Carbon::parse($temp->created_at)->addMonths($this->value);
            $temp->save();
        }elseif($this->terms == 'years'){
            $temp->endo = Carbon::parse($temp->created_at)->addYears($this->value);
            $temp->save();
        }
        
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showOnboard = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->age = '';
        $this->gender = '';
        $this->contract = '';
    }
    public function loadOnboard()
    {
        $this->showOnboard = true;
    }
    public function submit($id)
    {
        $onboard = Onboard::find($id);
        $onboard->status = 'Deployed';
            LocalEmployee::create([
            'joblist_id' => $onboard->listing_id,
            'name' => $onboard->name,
            'phone' => $onboard->phone,
            'email' => $onboard->email,
            'status' => 'Active',
            ]);
            $onboard->save();
            flash()->addSuccess('Data approved successfully');
        
    }
}
