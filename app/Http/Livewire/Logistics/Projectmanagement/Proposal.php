<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use App\Models\Proposal as ModelsProposal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Proposal extends Component
{
    public $newProposalModal = false, $ProposalModal = false, $editProposal = false;
    public $budget, $title, $duration, $requested_by, $status = 'Pending';
    public $proposalDetail;
    public $proposalId;
    use WithPagination;
    public function render()
    {
        $this->proposalDetail = ModelsProposal::with('user')->find($this->proposalId);
        return view('livewire.logistics.projectmanagement.proposal', [
            'proposals' => ModelsProposal::get(),
        ]);
    }
    public function loadModal()
    {
        $this->newProposalModal = true;
    }
    public function viewProposal($id)
    {
        $this->proposalId = $id;
        $this->ProposalModal = true;
    }
    public function create()
    {
        ModelsProposal::create([
            'user_id' => Auth::user()->id,
            'title' => $this->title,
            'budget' => $this->budget,
            'duration' => $this->duration,
            'requested_by' => Auth::user()->name,
            'status' => $this->status,
        ]);
        toastr()->addSuccess('New Proposal created');
        $this->newProposalModal = false;
        $this->resetInput();
    }
    public function editProposal($id)
    {
        $this->proposalId = $id;
        $data = ModelsProposal::find($id);
        $this->budget = $data->budget;
        $this->duration = $data->duration;
        $this->title = $data->title;
        $this->editProposal = true;
    }
    public function edit()
    {
        $dt = Carbon::now();
        $data = ModelsProposal::find($this->proposalId);
        $data->status = $this->status;
        $data->approval_date = $dt;
        $data->save();
        $this->editProposal = false;
        toastr()->addSuccess('Data update successfully');
        $this->resetInput();
    }
    public function download()
    {
        return redirect()->route('proposalDownload', ['id' => $this->proposalId]);
    }
    public function resetInput()
    {
        $this->budget = null;
        $this->title = null;
        $this->duaration = null;
        $this->requested_by = null;
    }
}
