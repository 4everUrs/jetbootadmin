<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AttendanceController extends Controller
{
    
    
    public function timein()
    {
        if (Auth::user()->role_id == '0') {
            $position = 'Admin';
        } elseif (Auth::user()->role_id == '1') {
            $position = 'Manager';
        } elseif (Auth::user()->role_id == '2') {
            $position = 'Staff';
        }
        $time = Carbon::now();
        Time::create([
            'user_id' => Auth::user()->id,
            'name' => Auth::user()->name,
            'position' => $position,
            'department' => Auth::user()->currentTeam->name,
            'timein' => Carbon::parse($time)->format('g:i A'),
            'date' => Carbon::parse($time)->toFormattedDateString(),
            'status' => $status = 'present',
        ]);
        $status = 'present';
        toastr()->addSuccess('Time in successful');
        return back();
    }
    public function breakin()
    {
        Time::find(Auth::user()->id)->update(['breakin'=>Carbon::parse(now())->format('g:i A')]);
        toastr()->addSuccess('Break In Successful');
        return back();
    }
    public function breakout()
    {
        Time::find(Auth::user()->id)->update(['breakout'=>Carbon::parse(now())->format('g:i A')]);
        toastr()->addSuccess('Break Out Successful');
        return back();
    }
    public function timeout()
    {
        Time::find(Auth::user()->id)->update(['timeout'=>Carbon::parse(now())->format('g:i A')]);
        toastr()->addSuccess('Break Out Successful');
        return back();
    }
}
