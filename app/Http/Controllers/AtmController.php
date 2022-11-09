<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AtmController extends Controller

{
    public $employee_id;

    public function index()
    {
        return view('atm');
    }
    public function timein(Request $request)
    {
    $employeeData = Employee::find($request->employee_id);
    $time = Carbon::now();
        Time::create([
            'id' => $employeeData->id,
            'name' => $employeeData->name,
            'position' => $employeeData->position,
            'department' => $employeeData->department,
            'timein' => Carbon::parse($time)->format('g:i A'),
            'date' => Carbon::parse($time)->toFormattedDateString(),
            'status' => $employeeData = 'present',
        ]);
        $status = 'present';
        toastr()->addSuccess('Time in successful');
        return back();
    }

    public function breakin(Request $request)
    {
        
        $employeeData = Employee::find($request->employee_id);
        $time = Carbon::now();
        Time::create([
            'id' => $employeeData->id,
            'breakin' => Carbon::parse($time)->format('g:i A'),
        ]);
        toastr()->addSuccess('breakin in successful');
        return back();

        
        // $employeeData = Employee::find($request->employee_id);
        // Time::find(Employee::$employeeData('breakin')
        // ->id)->update(['breakin'=>Carbon::parse(now())->format('g:i A')]);
        // toastr()->addSuccess('Break In Successful');
        // return back();
    }
    public function breakout()
    {
        Time::find(Employee::user()->id)->update(['breakout'=>Carbon::parse(now())->format('g:i A')]);
        toastr()->addSuccess('Break Out Successful');
        return back();
    }
    public function timeout()
    {
        Time::find(Employee::user()->id)->update(['timeout'=>Carbon::parse(now())->format('g:i A')]);
        toastr()->addSuccess('Break Out Successful');
        return back();
    }

}
