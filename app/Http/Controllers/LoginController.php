<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        // 0 = Admin
        // 1 = Manager
        // 2 = Officer
        if (Auth::user()->role_id == '0') {
            return redirect()->route('dashboard');
        } elseif (Auth::user()->role_id == '1') {
            return redirect()->route('manager');
        } elseif (Auth::user()->role_id == 2) {
            return redirect()->route('staff');
        } elseif (Auth::user()->role_id == 3) {
            Auth::logout();
            Session::flush();
            return redirect('/login')->withErrors(['msg' => 'Invalid Credentials']);
        }
    }
    public function logout()
    {
    }
    public function manager()
    {

        if (Auth::user()->current_team_id == '2') {
            return redirect()->route('logistics');
        } elseif (Auth::user()->current_team_id == '3') {
            return redirect()->route('finance');
        } elseif (Auth::user()->current_team_id == '4') {
            return redirect()->route('core');
        } elseif (Auth::user()->current_team_id == '5') {
            return redirect()->route('hr');
        }
    }
    public function staff()
    {
        if (Auth::user()->current_team_id >= 6 && Auth::user()->current_team_id <= 14) {
            return redirect()->route('logistics');
        } elseif (Auth::user()->current_team_id >= 15 && Auth::user()->current_team_id <= 19) {
            return redirect()->route('finance');
        } elseif (Auth::user()->current_team_id >= 20 && Auth::user()->current_team_id <= 28) {
            return redirect()->route('core');
        } elseif (Auth::user()->current_team_id >= 29 && Auth::user()->current_team_id <= 37) {
            return redirect()->route('hr');
        }
    }
}
