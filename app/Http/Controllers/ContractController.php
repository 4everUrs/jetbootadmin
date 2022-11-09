<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;
use PDF;
class ContractController extends Controller
{
   public function downloadContract(Request $request)
   {
    
    $data = [
       'contract' => Contract::find($request->id),
    ];


    $pdf = PDF::loadView('contract', $data); 
    return $pdf->download('contract-aggreement.pdf'); 
   }
}
