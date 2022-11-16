<?php

namespace App\Http\Livewire\Logistics\Procurement;

use App\Mail\AwardingMail;
use App\Mail\InvitationMail;
use App\Models\Bidder;
use Livewire\Component;
use App\Models\Supplier;
use App\Models\User;
use App\Models\VendorPo;
use App\Models\WhInvoice;
use App\Notifications\SendPoNotification;
use Carbon\Carbon;
use Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Mail;

class Supplierslists extends Component
{
    use WithFileUploads;
    public $awardModal = false;
    public $poSend = false;
    public $invitationModal = false;
    public $selected_id, $file_name, $po_id, $time, $contract, $terms = 'months';
    public $venue, $date, $subject;
    public $search;
    public $renewModal = false;
    public function render()
    {
        return view('livewire.logistics.procurement.supplierslists', [
            'active' => Supplier::where('status', '=', 'Active')->orderBy('id', 'desc')->get(),
            'terminated' => Supplier::where('status', '=', 'Terminated')->orderBy('id', 'desc')->get(),
            'applicants' => Bidder::with('Post')->where('status', '!=', 'Pending')->orderBy('id', 'desc')->get(),
        ]);
    }
    public function changeStatus($id)
    {
        Supplier::find($id)->update(['status' => 'Terminated']);
        toastr()->addSuccess('Operation Successfull');
    }
    public function activate($id)
    {
        Supplier::find($id)->update(['status' => 'Active']);
        toastr()->addSuccess('Operation Successfull');
    }
    public function award($id)
    {
        $this->selected_id = $id;
        $this->awardModal = true;
    }
    public function sendPO($id)
    {
        $this->selected_id = $id;
        $this->poSend = true;
    }
    public function send()
    {
        $fileName = $this->file_name->getClientOriginalName();

        $user = Supplier::find($this->selected_id);
        $file = $this->validate([
            'po_id' => 'required|integer',
            'file_name' => 'required',
        ]);
        $file['file_name'] = $this->file_name->storeAs('po_file', $fileName, 'do');
        $file['user_id'] = $user->user_id;
        VendorPo::create($file);
        $temp = VendorPo::latest()->first();
        WhInvoice::Create([
            'supplier_id' => $user->id,
            'status' => 'Pending',
            'po_id' => $this->po_id,
            'file_name' => $temp->file_name,
        ]);
        $client = User::find($user->user_id);
        $url = 'https://mnlph.nyc3.digitaloceanspaces.com/' . $file['file_name'];
        $data = [
            'greeting' => 'Hi ' . $client->name . ',',
            'body' => 'You Recieved a new Purchase order',
            'thanks' => 'Thank you this is from techtrendzph.com',
            'actionText' => 'View Purchase Order',
            'actionURL' => url($url),
        ];
        Notification::send($client, new SendPoNotification($data));
        $this->poSend = false;
        toastr()->addSuccess('Operation Successfull');
    }
    public function awarding()
    {

        $supplier = Bidder::find($this->selected_id);
        $supplier->status = 'Awarded';
        $supplier->save();
        Supplier::create([
            'name' => $supplier->name,
            'email' => $supplier->email,
            'phone' => $supplier->phone,
            'address' => $supplier->address,
            'user_id' => $supplier->user_id,
            'status' => 'Active',
            'start' => now(),
            'end' => now(),
        ]);
        $dt = Carbon::parse($this->date)->toFormattedDateString();
        $times = Carbon::createFromFormat('H:i', $this->time)->format('g:i A');
        $data = [
            'name' => $supplier->name,
            'email' => $supplier->email,
            'phone' => $supplier->phone,
            'address' => $supplier->address,
            'date' => Carbon::parse(now())->toFormattedDateString(),
            'post' => $supplier->Post->item_name,
            'author' => Auth::user()->name,
            'date_awarding' => $dt,
            'venue' => $this->venue,
            'time' => $times
        ];
        Mail::to($supplier->email)->send(new AwardingMail($data));
        $this->contractTerms();
        toastr()->addSuccess('Operation Successfull');
        $this->awardModal = false;
    }
    public function contractTerms()
    {
        if ($this->terms == 'months') {
            $temp = Supplier::latest()->first();
            $temp->end = Carbon::parse(now())->addMonths($this->contract);
            $temp->save();
        } elseif ($this->terms == 'years') {
            $temp = Supplier::latest()->first();
            $temp->end = Carbon::parse(now())->addYears($this->contract);
            $temp->save();
        }
    }
    public function sendInvitation($id)
    {
        $this->invitationModal = true;
        $this->selected_id = $id;
    }
    public function sendInvi()
    {
        $temp = Bidder::find($this->selected_id);
        $dt = Carbon::createFromFormat('H:i', $this->time)->format('g:i A');
        $data = [
            'name' => $temp->name,
            'date' => $this->date,
            'time' => $this->time,
            'venue' => $this->venue,
            'subject' => $this->subject,
            'address' => $temp->address,
            'phone' => $temp->phone,
            'email' => $temp->email,
            'author' => Auth::user()->name,
            'date_created' => Carbon::parse(now())->toFormattedDateString(),
        ];
        Mail::to($temp->email)->send(new InvitationMail($data));
        $this->invitationModal = false;
        toastr()->addSuccess('Email Sent Successfully');
    }
    public function loadRenewModal($id)
    {
        $this->renewModal = true;
        $this->selected_id = $id;
    }
    public function renew()
    {
        $temp = Supplier::find($this->selected_id);
        $endo = $temp->end;
        if ($this->terms == 'months') {
            $temp->end = Carbon::parse($endo)->addMonths($this->contract);
            $temp->save();
        } elseif ($this->terms == 'years') {
            $temp->end = Carbon::parse($endo)->addYears($this->contract);
            $temp->save();
        }
        toastr()->addSuccess('Renew Contract Successfully');
        $this->renewModal = false;
        $this->reset();
    }
}
