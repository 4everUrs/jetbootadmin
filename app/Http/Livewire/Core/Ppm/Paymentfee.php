<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\Contribution;
use Livewire\Component;
use App\Models\Payroll;

class Paymentfee extends Component
{
    public $showPayroll = false;
    public $name, $attendance, $salary, $placement, $contribution = [], $collection;
    public $sss = '400', $philhealth = '250', $pagibig = '150';

    public function render()
    {

        return view('livewire.core.ppm.paymentfee', [
            'payrolls' => Payroll::all(),
        ]);
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
