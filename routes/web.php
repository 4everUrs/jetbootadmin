
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimeInController;
use App\Http\Livewire\Logistics\Procurement\Requestlists;
use App\Http\Livewire\Logistics\Warehouse\Inventory;
use App\Http\Livewire\Logistics\Warehouse\Requestslist;
use App\Http\Livewire\Hr\Leavemanagement\Leavedata;
use App\Http\Livewire\Finance\Bm\Budgets;
use App\Http\Livewire\Hr\Claimreimburse\Claimdata;
use App\Http\Livewire\Hr\Compensation\Compensationdata;
use App\Http\Livewire\Hr\Core\Coredata;
use App\Http\Livewire\Hr\Hr\Analyticdata;
use App\Http\Livewire\Hr\Payroll\Paydata;
use App\Http\Livewire\Hr\Shiftschedule\Shiftdata;
use App\Http\Livewire\Hr\Timeaattendance\Timedata;
use App\Http\Livewire\Hr\Timesheet\Timesheetdata;
use App\Models\Compensation;
use App\Models\Core;

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


Route::middleware('auth')->group(function(){
    Route::get('timein',[TimeInController::class,'timein'])->name('timein');
});

//Login Routes
Route::get('/redirects', [LoginController::class, 'login']);
Route::get('/staff', [LoginController::class, 'staff'])->name('staff');
Route::get('/manager', [LoginController::class, 'manager'])->name('manager');

//Admin Routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::view('dashboard', 'livewire.admin.dashboard')->name('dashboard');
    Route::get('users', UsersList::class)->name('users');
});

//Logistics Routes
Route::prefix('logistics')->middleware('auth','isLogistics')->group(function(){
    Route::view('dashboard','livewire.logistics.dashboard')->name('logistics');
    Route::get('procurement/requests',Requestlists::class)->name('requests');
    Route::get('warehouse/inventory',Inventory::class)->name('inventory');
    Route::get('warehouse/requests',Requestslist::class)->name('requestlists');
});

//Finance Routes
Route::prefix('finance')->middleware('auth','isFinance')->group(function(){
    Route::view('dashboard','livewire.finance.dashboard')->name('finance');
    Route::get('finance/budgets',Budgets::class)->name('transaction');
 
});

//Core Routes
Route::prefix('core')->middleware('auth','isCore')->group(function(){
    Route::view('dashboard','livewire.core.dashboard')->name('core');
});

//HR Routes
Route::prefix('hr')->middleware('auth','isHr')->group(function(){
    Route::view('dashboard','livewire.hr.dashboard')->name('hr');
    Route::get('leavemangement',Leavedata::class)->name('leave');
    Route::get('timesheet',Timesheetdata::class)->name('timesheet');
    Route::get('claim',Claimdata::class)->name('claim');
    Route::get('pay',Paydata::class)->name('pay');
    Route::get('shift',Shiftdata::class)->name('shift');
    Route::get('analytics',Analyticdata::class)->name('analytics');
    Route::get('time',Timedata::class)->name('time');
    Route::get('compensation',Compensationdata::class)->name('compensation');
    Route::get('corehuman',Coredata::class)->name('corehuman');
});
