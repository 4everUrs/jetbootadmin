<?php

namespace App\Http\Controllers;

use App\Models\Pay;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use PDF;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function print()
    {
     
     $pay = [
        'prints' => Pay::all(),
     ]; 
     $pdf = PDF::loadView('print.print', $pay);
     return $pdf->download('Payslips.pdf'); 
    }
}
