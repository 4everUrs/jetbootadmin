<?php

namespace App\Http\Livewire\Core\Cacm;

use Livewire\Component;
use App\Models\Contract;

class Agreement extends Component
{
    public $aggreement = false;
    public $client_name, $client_location, $contract_term, $email;
    public  $contractModal = false;
    public $selected_id;
    protected $rules = [
        'client_name' => 'required|string',
        'email' => ['required', 'email'],
        'client_location' => 'required|string',
        'contract_term' => 'required|string',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.core.cacm.agreement', [
            'onboards' => Contract::all(),
            'contract' => Contract::find($this->selected_id),
        ]);
    }
    public function aggreementSave()
    {
        $validateddata = $this->validate([
            'client_name' => 'required|string',
            'email' => ['required', 'email'],
            'client_location' => 'required|string',
            'contract_term' => 'required|string',
        ]);
        Contract::create([
            'client_name' => $this->client_name,
            'email' => $this->email,
            'client_location' => $this->client_location,
            'contract_term' => $this->contract_term,
        ]);
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->aggreement = false;
    }
    public function resetInput()
    {
        $this->client_name = '';
        $this->client_location = '';
        $this->contract_term = '';
    }
    public function loadPayroll()
    {
        $this->aggreement = true;
    }
    public function viewModal($id)
    {
        $this->selected_id = $id;
        $this->contractModal = true;
    }
    public function download()
    {
        return redirect()->route('downloadcontract', ['id' => $this->selected_id]);
    }
}
