<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\PaymentRecord;
use App\Models\Payroll;
use App\Models\Payslip;
use Livewire\Component;
use PDF;

class Payment extends Component
{
    public $search = '', $paymentModal = false;
    public $employees;
    public $total;
    public function render()
    {
        $this->employees;
        return view('livewire.core.ppm.payment',[
            'payments' => PaymentRecord::all(),
        ]);
    }
    public function viewPayment($id)
    {
        $temp = PaymentRecord::find($id);
        $this->employees = Payroll::find($temp->payroll_id)->getPayslip;
        $this->paymentModal = true;
        foreach($this->employees as $employee){
            $this->total += $employee->net_salary;
        }
    }
    public function export()
    {
      
        $data = [
            'employees' => $this->employees,
            'total' => $this->total,
        ];
        $pdf = PDF::loadView('payment-view',$data)->setPaper('letter','landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'payment.pdf'
        );
    }
}
