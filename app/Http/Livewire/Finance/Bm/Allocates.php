<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Collect;
use App\Models\Annually;
use App\Models\AnnualBudget;
use Livewire\WithPagination;

class Allocates extends Component
{
    public $bannuals;
    public $year,$budgetannual,$blogistics,$bcore,$bhr,$bfinance;
    public $addAnnualBudget = false;
     
    public function render()
    {
        $this->bannuals = AnnualBudget::all();
        return view('livewire.finance.bm.allocates');
    }

    public function loadAnnualBudget()
    {
    $this->addAnnualBudget=true;
    }

    public function addAnnualBudgets()
    {
        $this->addAnnualBudget=true;
    }
}
