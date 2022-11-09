<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApplyLeaveController extends Controller
{
    public function applyleave()
    {
        return view('applyleave');
    }
}
