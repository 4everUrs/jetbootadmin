<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use App\Models\Project;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Livewire\Component;

class Projectslists extends Component
{
    public $projectDetail = false;
    public $myDate;
    public $title, $budget, $manager, $status, $progress, $duration, $start_date, $testDate;
    public $contractor, $contractor_manager, $term, $terms, $description, $completion_date;
    public $selected_id;
    public $budgetProposal = false;
    public $project;
    protected $listeners = ['saveValue' => 'save'];
    public function render()
    {

        $this->start_date;
        return view('livewire.logistics.projectmanagement.projectslists', [
            'projects' => Project::all(),
        ]);
    }
    public function viewRow($id)
    {
        $this->project = Project::find($id);
        $this->selected_id = $id;
        $this->projectDetail = true;
        $projectDetails = Project::find($id);
        $this->title = $projectDetails->title;
        $this->description = $projectDetails->description;
        $this->budget = $projectDetails->budget;
        $this->manager = $projectDetails->manager;
        $this->status = $projectDetails->status;
        $this->duration = $projectDetails->duration;
        $this->contractor = $projectDetails->contractor;
        $this->contractor_manager = $projectDetails->contractor_manager;
        $this->completion_date = Carbon::parse($projectDetails->completion_date)->toFormattedDateString();
        $this->progress = $projectDetails->progress;
        $this->start_date = Carbon::parse($projectDetails->start_date)->toFormattedDateString();
        $this->term = filter_var($this->duration, FILTER_SANITIZE_NUMBER_INT);
        $this->terms = preg_replace('/[^a-zA-Z]/', '', $this->duration);
    }
    public function save()
    {
        $temp = Project::find($this->selected_id)->Supplier;
        $dt = Carbon::parse($this->start_date)->toDateTimeString();
        $data = Project::find($this->selected_id);
        $data->title = $this->title;
        $data->description = $this->description;
        $data->budget = $this->budget;
        $data->manager = $this->manager;
        $data->status = $this->status;
        $data->progress = $this->progress;
        $data->duration = $this->term . ' ' . $this->terms;
        $data->start_date = $dt;
        if ($this->terms == 'months') {
            $data->completion_date = Carbon::parse($dt)->addMonth($this->term);
        } elseif ($this->terms == 'years') {
            $data->completion_date = Carbon::parse($dt)->addYears($this->term);
        }
        $data->save();
        Project::find($this->selected_id)->update([
            'contractor' => $temp->name,
            'contractor_manager' => $temp->User->name,
        ]);

        $this->projectDetail = false;
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
    }
    public function resetInput()
    {
        $this->title = null;
        $this->budget = null;
        $this->description = null;
        $this->manager = null;
        $this->contractor = null;
        $this->contractor_manager = null;
        $this->duration = null;
        $this->start_date = null;
        $this->status = null;
        $this->progress = null;
        $this->term = null;
        $this->terms = null;
        $this->completion_date = null;
    }
    public function loadModal()
    {
        $this->budgetProposal = true;
    }
}
