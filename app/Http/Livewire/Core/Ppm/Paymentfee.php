<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\Contribution;
use App\Models\EmployeePayroll;
use App\Models\LocalEmployee;
use Livewire\Component;
use App\Models\Payroll;
use Carbon\Carbon;

class Paymentfee extends Component
{
    public $showPayroll = false;
    public $name, $attendance, $salary, $placement, $contribution = [], $collection;
    public $sss = '400', $philhealth = '250', $pagibig = '150';
    public $newPayroll;
    public $searchID = '';
    public $start,$end,$payroll_name,$salary_term;
    public function render()
    {
        $searchFields = '%' . $this->searchID . '%';
        return view('livewire.core.ppm.paymentfee', [
            'employees' => LocalEmployee::where('id', 'like', $searchFields)->get(),
        ]);
    }

    public function createPayroll()
    {
        $year = Carbon::parse($this->start)->format('Y');
        $month = Carbon::parse($this->start)->format('F');
        $this->start = Carbon::parse($this->start)->toFormattedDateString();
        $this->end = Carbon::parse($this->end)->toFormattedDateString();
        Payroll::create([
            'year' => $year,
            'month'=> $month,
            'salary_term' => $this->salary_term,
            'start_date' => $this->start,
            'end_date' => $this->end,
            'name' => $this->payroll_name
        ]);
        $this->newPayroll = false;
        flash()->addSuccess('Data update successfully');
        $this->reset();
    }

    public function savePayroll()
    {

        $payroll = Payroll::find($this->name);
        $payroll->attendance = $this->attendance;
        $payroll->salary = $this->salary;
        $payroll->gross_salary = $this->attendance * $this->salary;
        $payroll->save();
        if (!empty($this->sss)) {
            $this->contribution[] = 'SSS:' . $this->sss;
            $payroll->net_salary = $payroll->gross_salary - $this->sss;
            $payroll->save();
        }
        if (!empty($this->philhealth)) {
            $this->contribution[] = 'Philhealth:' . $this->philhealth;
            $payroll->net_salary = $payroll->gross_salary - $this->philhealth;
            $payroll->save();
        }
        if (!empty($this->pagibig)) {
            $this->contribution[] = 'Pagibig:' . $this->pagibig;
            $payroll->net_salary = $payroll->gross_salary - $this->pagibig;
            $payroll->save();
        }
        foreach ($this->contribution as $benefits) {
            Contribution::create([
                'payroll_id' => $payroll->id,
                'contribution' => $benefits,
            ]);
        }
        flash()->addSuccess('Data update successfully');
        $this->resetInput();
        $this->showPayroll = false;
    }
    public function resetInput()
    {
        $this->name = '';
        $this->attendance = '';
        $this->salary = '';
        $this->contribution = '';
    }
    public function loadPayroll()
    {
        $this->showPayroll = true;
    }
    public function total()
    {
    }
}
