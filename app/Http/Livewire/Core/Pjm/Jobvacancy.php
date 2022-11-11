<?php

namespace App\Http\Livewire\Core\Pjm;

use App\Http\Livewire\Core\Cm\Joblist as CmJoblist;
use App\Models\CreateJob;
use App\Models\JobList;
use Livewire\Component;
use App\Models\Vacant;
use App\Models\JobPost;
class Jobvacancy extends Component
{
    public $name,$position,$salary,$details,$location,$vacant_edit_id;
    public $search = '';
    protected $rules = [
        'name' => 'required|string|min:6',
        'position' => 'required|string',
        'salary' => 'required|string',
        'details' => 'required|string',
        'location' => 'required|string'
        
        
        
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        $searchfields = '%' . $this->search . '%';
        return view('livewire.core.pjm.jobvacancy',[
            'vacants' => CreateJob::where('status','=','Open')
            ->orWhere('status','=','Posted')->get(),
        ]);
    }
    public function resetInput()
    {
        $this->vacant_id = '';
        $this->name = '';
        $this->position = '';
        $this->salary = '';
        $this->status = '';
        $this->details = '';
        $this->location = '';
        $this->vacant_edit_id = '';
    }
    public function approve($id)
    {

        $vacant = CreateJob::find($id);
        JobPost::create([
            'name' => $vacant->name,
            'position' => $vacant->position,
            'salary' => $vacant->daily_salary,
            'details' => $vacant->details,
            'location' => $vacant->location
        ]);
        flash()->addSuccess('Data Approved successfully');
        $vacant->status = 'Posted';
        $vacant->save();
    }
    public function edit($id)
    {
        $vacant = Vacant::where('id',$id)->first();
        $this->vacant_edit_id = $vacant->id;
        $this->vacant_id = $vacant->vacant_id;
        $this->name = $vacant->name;
        $this->position = $vacant->position;
        $this->salary = $vacant->salary;
        $this->details = $vacant->details;
        $this->location = $vacant->location;
       
        
        $vacant->save();
        
        
    }
    public function editData()
    {
        $validatedData = $this->validate();
        
        Vacant::create($validatedData);
        $this->resetInput();
    }

    public function delete($id)
    {
        $vacant = Vacant::where('id',$id)->first();
        if($vacant->showModal){
            flash()->addWarning('Data is already deleted');
        }
        else{
            $vacant->showModal;
            $vacant->delete();
            flash()->addSuccess('Data deleted successfully');
        }
        
    }
}
