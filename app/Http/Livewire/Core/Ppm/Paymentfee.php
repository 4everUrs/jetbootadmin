<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\Contribution;
use App\Models\EmployeePayroll;
use App\Models\LocalEmployee;
use App\Models\PaymentRecord;
use Livewire\Component;
use App\Models\Payroll;
use App\Models\Payslip;
use Carbon\Carbon;

class Paymentfee extends Component
{
    public $showPayroll = false;
    public $employee_id, $attendance, $salary, $placement, $contribution = [], $collection;
    public $sss = '400', $philhealth = '250', $pagibig = '150';
    public $newPayroll;
    public $search = '';
    public $searchID = '';
    public $start,$end,$payroll_name,$salary_term,$payroll_id;
    public function render()
    {
        $searchFields = '%' . $this->searchID . '%';
        return view('livewire.core.ppm.paymentfee', [
            'employees' => LocalEmployee::where('id', 'like', $searchFields)->get(),
            'payslip' => Payslip::all(),
            'payrolls'=> Payroll::all(),
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
        $temp = Payroll::latest()->first();
        PaymentRecord::create([
            'payroll_id' => $temp->id,
        ]);
        $this->newPayroll = false;
        flash()->addSuccess('Data update successfully');
        $this->reset();
    }

    public function savePayroll()
    {
        $employee = LocalEmployee::find($this->employee_id);
        $payroll = Payroll::find($this->payroll_id);
        Payslip::create([
            'payroll_id' => $payroll->id,
            'local_employee_id' => $employee->id,
            'gross_salary' => $this->attendance * $employee->CreateJob->daily_salary,    
            'attendance' => $this->attendance,
        ]);
        $payslip = Payslip::latest()->first();
        if (!empty($this->sss)) {
            $payslip->sss = $payslip->gross_salary*0.045;
            $payslip->save();
        }
        if (!empty($this->philhealth)) {
            $payslip->philhealth = 400;
            $payslip->save();
        }
        if (!empty($this->pagibig)) {
            $payslip->pagibig = 400;
            $payslip->save();
        }
        $payslip->net_salary = $payslip->gross_salary - $payslip->sss - $payslip->philhealth - $payslip->pagibig;
        $payslip->save();
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
