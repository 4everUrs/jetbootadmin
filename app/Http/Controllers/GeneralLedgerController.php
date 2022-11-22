<?php

namespace App\Http\Controllers;
use App\Models\Collectedincome;
use PDF;
use Illuminate\Http\Request;


class GeneralLedgerController extends Controller
{
public function downloadPdf(Request $request)
{
  // making variable for storing all data gathared from database;
        $data =[
            'collects'=>Collectedincome::all(),
        ];
         $pdf = PDF::loadView('genedreports',$data); // storing the view file with data in $pdf
         return $pdf->download('collection_reports.pdf'); //downloading function of dompdf
}

}
