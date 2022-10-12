<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;
use PDF;
class DisbursementController extends Controller
{
    public function downloadPdf(Request $request){

       
        // making variable for storing all data gathared from database;
        $data =[
            'transactions'=>Transaction::all(),
        ];
         $pdf = PDF::loadView('transactdisburse',$data); // storing the view file with data in $pdf
         return $pdf->download('disbursement_report.pdf'); //downloading function of dompdf
    }
}
