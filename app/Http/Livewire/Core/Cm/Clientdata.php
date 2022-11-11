<?php

namespace App\Http\Livewire\Core\Cm;

use Livewire\Component;
use App\Mail\AgreementMail;
use App\Models\Client;
use App\Models\Contract;
use Carbon\Carbon;
use Mail;
class Clientdata extends Component
{
    public $showRenew = false;
    public $deleteModal = false;
    public $showClient = false;
    public $search = '';
    public $name,$email,$location,$status = 'Active',$contract;
    public $selected_id,$value,$terms;
    protected $rules = [
        'name' => 'required|string|min:6',
        'email' => ['required','email'],
        'location' => 'required|string',
        'contract' => 'required|string',
        'status' => 'required|string'
        
        
        
        
    ];
     public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        $searchFields = '%' . $this->search . '%';
        return view('livewire.core.cm.clientdata',[
            'clients' => Client::where('name', 'like', $searchFields)->get(),

        ]);
    }
    
    public function saveData()
    {
        $validatedData = $this->validate();
        dd($validatedData);
        Client::create($validatedData);
        $this->resetInput();
    }
    public function renew($id)
    {
        $this->selected_id = $id;
        $this->showRenew = true;
    }
    public function saveRenew()
    {
        $this->contract = $this->value .' '.$this->terms;
        $validateddata = $this->validate([
            'contract' => 'required|string',
        ]);
        $client = Client::find($this->selected_id);
        $client->contract = $validateddata['contract'];
        $client->status = 'Active';
        if($this->terms == 'months'){
            $client->endo = Carbon::parse($client->created_at)->addMonths($this->value);
            $client->save();
        }elseif($this->terms == 'years'){
            $client->endo = Carbon::parse($client->created_at)->addYears($this->value);
            $client->save();
        }
        flash()->addSuccess('Data update successfully');
        $this->reset();
        $this->showRenew = false;
    }
    public function deleteData(){
        Client::find($this->name)->destroy($this->name);
        flash()->addSuccess('Data deleted successfully');
        $this->deleteModal = false;
    }
    public function deleteClient($id)
    {
        $this->name = $id;
        $this->deleteModal = true;
    }
    
    public function saveclient(){
        $this->contract = $this->value .' '.$this->terms;
        $data = $this->validate();
        
        Client::create($data);
        $client = Client::latest()->first();
        if($this->terms == 'months'){
            $client->endo = Carbon::parse($client->created_at)->addMonths($this->value);
            $client->save();
        }elseif($this->terms == 'years'){
            $client->endo = Carbon::parse($client->created_at)->addYears($this->value);
            $client->save();
        }
        Contract::create([
            'client_name' => $client->name,
            'email' => $client->email,
            'client_location' => $client->location,
            'contract_term' => $this->contract,
        ]);
        $data = Contract::latest()->first();
        Mail::to($this->email)->send(new AgreementMail($data));
        flash()->addSuccess('Data added successfully');
        $this->resetInput();
        $this->showClient = false;
    }
    public function resetInput(){
        $this->name = '';
        $this->email = '';
        $this->location = '';
        $this->contract = '';
    }
    public function loadClient(){
        $this->showClient = true;
    }
}