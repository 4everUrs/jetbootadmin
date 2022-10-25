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
        AnnualBudget::create([
            'year'=>$this-> year,
            'budgetannual'=>$this-> budgetannual,
             'blogistics'=>$this-> budgetannual * 0.20,
             'bcore'=>$this-> budgetannual * 0.30,
             'bhr'=>$this-> budgetannual * 0.30,
             'bfinance'=>$this-> budgetannual * 0.20,
        ]);
        $this->resetBudget();
        toastr()->addSuccess('Cash Record successfully');
        $this->addAnnualBudget = false;
     
    }
    public function resetBudget()
    {
        $this->year = null;
        $this->budgetannual = null;
    }

    


}
