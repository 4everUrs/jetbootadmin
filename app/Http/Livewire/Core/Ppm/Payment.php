<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\Listingpayable;
use App\Models\PaymentRecord;
use App\Models\Payroll;
use App\Models\Payslip;
use Livewire\Component;
use Livewire\WithFileUploads;
use PDF;

class Payment extends Component
{
    public $search = '', $paymentModal = false, $showPayment = false;
    public $employees;
    public $total;
    public $payment_file,$remarks;
    use WithFileUploads;
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
    public function sendPayment()
    {
      
        $file_name = $this->payment_file->getClientOriginalName();
        Listingpayable::create([
            'lpname'=> 'Core Payment', 
            'lpattachment'=> $this->payment_file->storeAs('payables',$file_name,'do'), 
            'lpremarks'=> $this->remarks, 
            'lpstatus' => 'Pending'
        ]);
        flash()->addSuccess('Send Successfully');
        $this->showPayment = false;
    }
    public function loadPayment()
    {
        $this->showPayment = true;
    }
}
