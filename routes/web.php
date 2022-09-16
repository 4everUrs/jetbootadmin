<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Livewire\Logistics\Procurement\Requestlists;

use App\Http\Livewire\Hr\Leavemanagement\Leavedata;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

//Login Routes
Route::get('/redirects',[LoginController::class, 'login']);

//Admin Routes
Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    Route::view('dashboard','livewire.admin.dashboard')->name('dashboard');
});

//Logistics Routes
Route::prefix('logistics')->middleware('auth','isLogistics')->group(function(){
    Route::view('dashboard','livewire.logistics.dashboard')->name('logistics');
    Route::get('procurement/requests',Requestlists::class)->name('requests');
    
});

//Finance Routes
Route::prefix('finance')->middleware('auth','isFinance')->group(function(){
    Route::view('dashboard','livewire.finance.dashboard')->name('finance');
});

//Core Routes
Route::prefix('core')->middleware('auth','isCore')->group(function(){
    Route::view('dashboard','livewire.core.dashboard')->name('core');
});

//HR Routes
Route::prefix('hr')->middleware('auth','isHr')->group(function(){
    Route::view('dashboard','livewire.hr.dashboard')->name('hr');
    Route::get('leavemangement',Leavedata::class)->name('leave');
});
