<?php

namespace App\Http\Livewire\Core;

use App\Models\ApplicantForm;
use Livewire\Component;

class Dashboard extends Component
{
    public $applicants;
    public function render()
    {
        $temp = ApplicantForm::all();
        dd($temp);
        return view('livewire.core.dashboard');
    }
}
