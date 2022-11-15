<?php

namespace App\Http\Livewire\Logistics\Projectmanagement;

use App\Models\Listingpayable;
use App\Models\ListRequested;
use App\Models\Proposal as ModelsProposal;
use App\Models\ProposalItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class Proposal extends Component
{
    public $newProposalModal = false, $ProposalModal = false, $editProposal = false;
    public $budget, $title, $duration, $description, $status = 'Pending';
    public $start, $personnel, $materials;
    public $proposalDetail;
    public $proposalId;
    public $total;
    public $itemContainer = [];
    use WithPagination;
    public function render()
    {
        $this->proposalDetail = ModelsProposal::with('user')->find($this->proposalId);
        return view('livewire.logistics.projectmanagement.proposal', [
            'proposals' => ModelsProposal::get(),
        ]);
    }
    public function addRow()
    {
        $this->itemContainer[] = ['item_name', 'quantity', 'unit_cost'];
    }
    public function removeRow($key)
    {
        unset($this->itemContainer[$key]);
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
            'description' => $this->description,
            'budget' => 100000,
            'duration' => $this->duration,
            'requested_by' => Auth::user()->name,
            'admin_status' => 'Approved',
            'finance_status' => 'Pending',
            'start_date' => $this->start,
        ]);

        $temp = ModelsProposal::latest()->first();
        if (!empty($this->personnel)) {
            ProposalItem::create([
                'proposal_id' => $temp->id,
                'personnel' => $this->personnel,
            ]);
        }
        if (!empty($this->materials)) {
            ProposalItem::create([
                'proposal_id' => $temp->id,
                'materials' => $this->materials,
            ]);
        }
        if (!empty($this->itemContainer)) {
            foreach ($this->itemContainer as $item) {
                ProposalItem::create([
                    'item_name' => $item['item_name'],
                    'quantity' => $item['quantity'],
                    'unit_cost' => $item['unit_cost'],
                    'proposal_id' => $temp->id,
                ]);
            }
        }
        $proposals  = ModelsProposal::latest()->first();
        foreach ($proposals->ProposalItem as $proposal) {
            $this->total += ($proposal->unit_cost * $proposal->quantity) + $proposal->personnel + $proposal->materials;
        }
        $proposals->budget = $this->total;
        $proposals->save();
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
    public function toAdmin($id)
    {
        // $temp = ModelsProposal::find($id);
        // dd($temp);
        ModelsProposal::find($id)->update([
            'admin_status' => 'check',
            'approval_date' => Carbon::parse(now())->toFormattedDateString(),
        ]);
        toastr()->addSuccess('Sent Success');
    }
    public function toFinance($id)
    {
        $temp = ModelsProposal::find($id);
        ListRequested::create([
            'origin' => 'Logistics-Project Management',
            'proposalname' => $temp->title,
            'requestor' => Auth::user()->name,
            'proposedamount' => $temp->budget,
            'rstatus' => 'Pending',
            'remarks' => 'N/A'
        ]);
        $temp->finance_status = 'check';
        $temp->save();
        toastr()->addSuccess('Successfully Sent');
    }
}
