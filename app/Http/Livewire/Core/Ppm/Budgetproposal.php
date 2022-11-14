<?php

namespace App\Http\Livewire\Core\Ppm;

use App\Models\LocalEmployee;
use App\Models\Payroll;
use App\Models\Payslip;
use Livewire\Component;
use PDF;

class Budgetproposal extends Component
{
    public $showSSS = false, $showPhilhealth = false, $showPagibig = false;
    public $payslips;
    public $total;
    public $search = '';
    public function render()
    {
        return view('livewire.core.ppm.budgetproposal',[
            'payrolls' => Payslip::all(),
        ]);
    }
    public function exportSSS()
    {
        $data = [
            'payrolls' => Payslip::all(),
            'total' => $this->total,
        ];
        $pdf = PDF::loadView('sss-view',$data)->setPaper('letter','landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'sss.pdf'
        );
        $this->showSSS = false;
    }
    public function loadSSS()
    {
        $temp = Payslip::all();
        foreach($temp as $tmp){
            $this->total += $tmp->sss;
        }
        $this->showSSS = true;
    }
    public function exportPhilhealth()
    {
        $data = [
            'payrolls' => Payslip::all(),
            'total' => $this->total,
        ];
        $pdf = PDF::loadView('philhealth-view',$data)->setPaper('letter','landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'philhealth.pdf'
        );
        $this->showPhilhealth = false;
    }
    public function loadPhilhealth()
    {
        $temp = Payslip::all();
        foreach($temp as $tmp){
            $this->total += $tmp->philhealth;
        }
        $this->showPhilhealth = true;
    }
    public function exportPagibig()
    {
        $data = [
            'payrolls' => Payslip::all(),
            'total' => $this->total,
        ];
        $pdf = PDF::loadView('pagibig-view',$data)->setPaper('letter','landscape')->output();
        return response()->streamDownload(
            fn () => print($pdf),
            'pagibig.pdf'
        );
        $this->showPagibig = false;
    }
    public function loadPagibig()
    {
        $temp = Payslip::all();
        foreach($temp as $tmp){
            $this->total += $tmp->pagibig;
        }
        $this->showPagibig = true;
    }
}
