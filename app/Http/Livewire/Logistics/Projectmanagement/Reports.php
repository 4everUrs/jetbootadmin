<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use App\Models\Project;
use App\Models\Report;
use Livewire\Component;

class Reports extends Component
{
    public $reportModal = false;
    public $project_id, $remarks;
    public function render()
    {
        return view('livewire.logistics.projectmanagement.reports', [
            'projects' => Project::all(),
            'reports' => Report::all()
        ]);
    }
    public function sendReport()
    {
        $temp = Project::find($this->project_id);
        Report::create([
            'title' => $temp->title,
            'manager' => $temp->manager,
            'contractor' => $temp->contractor,
            'contractor_manager' => $temp->contractor_manager,
            'start_date' => $temp->start_date,
            'completion_date' => $temp->completion_date,
            'progress' => $temp->progress,
            'status' => $temp->status,
            'description' => $temp->description,
            'budget' => $temp->budget,
            'duration' => $temp->duration,
            'remarks' => $this->remarks,
        ]);
        toastr()->addSuccess('Report Sent Successfully');
        $this->reset();
        $this->reportModal = false;
    }
}
