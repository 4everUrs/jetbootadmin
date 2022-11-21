<?php

namespace App\Http\Livewire\Finance\Bm;

use Livewire\Component;
use App\Models\Collect;
use App\Models\Logisticannual;
use App\Models\AnnualBudget;
use App\Models\OperatingBudget;
use App\Models\AllocateBudgets;
use Livewire\WithPagination;

class Allocates extends Component
{
    public $bannuals;
    public $year,$budgetannual,$blogistics,$bcore,$bhr,$bfinance;
    public $lyear,$ldeptbudget,$lobudget,$lfbudget,$lcbudget,$llbudget,$lsbudget;
    public $department,$startdate,$enddate,$recurrence,$amounts;
    
    
    public $addAnnualBudget = false;
    public $addLogisticsBudget = false;
    public $addAnnuallyBudget = false;
    public function render()
    {
        $this->bannuals = AnnualBudget::all();
        $this->lannuals = Logisticannual::all();
        $this->obudgets = OperatingBudget::all();
        $this->allocates = AllocateBudgets::all();

        return view('livewire.finance.bm.allocates');
    }

    public function loadAnnualBudget()
    {
    $this->addAnnualBudget=true;
    }

    public function addAnnualBudgets()
    {
        AnnualBudget::create([
            'year'=>$this->year,
            'budgetannual'=>$this->budgetannual,
             'blogistics'=>$this->budgetannual * 0.20,
             'bcore'=>$this->budgetannual * 0.30,
             'bhr'=>$this->budgetannual * 0.30,
             'bfinance'=>$this->budgetannual * 0.20,
        ]);
        $this->resetBudget();
        toastr()->addSuccess('Annual Budget Successfully Recorded');
        $this->addAnnualBudget = false;
     
    }
    public function resetBudget()
    {
        $this->year = null;
        $this->budgetannual = null;
    }


    //LOGISTICS ANNUAL BUDGET
    public function loadLogisticBudget()
    {
      $this-> addLogisticsBudget=true;
    }

    public function addLogisticsBudgets()
    {
        Logisticannual::create([
            'lyear'=>$this->lyear,
            'ldeptbudget'=>$this->ldeptbudget,
             'lobudget'=>$this->ldeptbudget * 0.30,
             'lfbudget'=>$this->ldeptbudget * 0.15,
             'lcbudget'=>$this->ldeptbudget * 0.10,
             'llbudget'=>$this->ldeptbudget * 0.15,
             'lsbudget'=>$this->ldeptbudget * 0.30,
        ]);
        $this->resetLogistics();
        toastr()->addSuccess('Cash Record successfully');
        $this->addLogisticsBudget = false;
    }

    public function resetLogistics()
    {
        $this->lyear = null;
        $this->ldeptbudget =null;
    }

    //Annual Budget

    public function loadBudget()
    {
        $this-> addAnnuallyBudget=true;
    }
    public function addAnnuallyBudgets()
    {
        AllocateBudgets::create([
            'department'=>$this->department,
            'startdate'=>$this->startdate,
             'enddate'=>$this->enddate,
             'recurrence'=>$this->recurrence,
             'amounts'=>$this->amounts,
        ]);

        $this->resetAnnualBudgets();
        toastr()->addSuccess('Data Record Successfully');
        $this->addAnnuallyBudget = false;
        
    }

    public function resetAnnualBudgets()
    {
        $this->department = null;
        $this->startdate =null;
        $this->enddate =null;
        $this->recurrence =null;
        $this->amounts =null;
    }
    







    


}
