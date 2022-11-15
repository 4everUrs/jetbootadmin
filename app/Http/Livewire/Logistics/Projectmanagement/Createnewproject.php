<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use App\Models\Project;
use App\Models\Supplier;
use Carbon\Carbon;
use Livewire\Component;

class Createnewproject extends Component
{
    public $title, $description, $budget, $term, $terms, $manager, $status = 'On-Going', $progess = '1';
    public $contractor;
    public function render()
    {
        return view('livewire.logistics.projectmanagement.createnewproject', [
            'contractors' => Supplier::all(),
        ]);
    }
    public function createProject()
    {
        $dt = Carbon::now();
        Project::create([
            'title' => $this->title,
            'description' => $this->description,
            'budget' => $this->budget,
            'duration' => $this->term . ' ' . $this->terms,
            'manager' => $this->manager,
            'status' => $this->status,
            'progress' => $this->progess,
            'supplier_id' => $this->contractor,
        ]);
        toastr()->addSuccess('New project created');
        $this->resetInput();
        return redirect()->route('projects');
    }
    public function resetInput()
    {
        $this->reset();
    }
}
