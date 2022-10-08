
<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Admin\UsersList;
use App\Http\Livewire\Logistics\Procurement\PurchaseItems;
use App\Http\Livewire\Logistics\Procurement\Requestlists;
use App\Http\Livewire\Logistics\Warehouse\Inventory;
use App\Http\Livewire\Logistics\Warehouse\Requestslist;
use App\Http\Livewire\Hr\Leavemanagement\Leavedata;
use App\Http\Livewire\Finance\Bm\Budgets;
use App\Http\Livewire\Logistics\Procurement\Supplierslists;
use App\Http\Livewire\Logistics\Procurement\Purchaseorders;
use App\Http\Livewire\Logistics\Vendorportal\Recievedrequests;
use App\Http\Livewire\Logistics\Vendorportal\Supplierposting;
use App\Http\Livewire\Logistics\Vendorportal\Supplierlist;
use App\Http\Livewire\Logistics\Vendorportal\Disposal;
use App\Http\Livewire\Logistics\Vendorportal\Bidders;
use App\Http\Livewire\Logistics\Vendorportal\Buyers;



use App\Http\Livewire\Finance\Bm\Requestedlist;
use App\Http\Livewire\Finance\Bm\Journals;


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
Route::get('/redirects', [LoginController::class, 'login']);
Route::get('/staff', [LoginController::class, 'staff'])->name('staff');
Route::get('/manager', [LoginController::class, 'manager'])->name('manager');

//Admin Routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::view('dashboard', 'livewire.admin.dashboard')->name('dashboard');
    Route::get('users', UsersList::class)->name('users');
});

//Logistics Routes
Route::prefix('logistics')->middleware('auth', 'isLogistics')->group(function () {
    Route::view('dashboard', 'livewire.logistics.dashboard')->name('logistics');
    Route::get('procurement/requests', Requestlists::class)->name('requests');
    Route::get('warehouse/inventory', Inventory::class)->name('inventory');
    Route::get('warehouse/requests', Requestslist::class)->name('requestlists');
    Route::get('procurement/suppliers', Supplierslists::class)->name('suppliers');
    Route::get('procurement/purchaseorder', Purchaseorders::class)->name('po');
    Route::get('vendor/recievedrequests', RecievedRequests::class)->name('recievedrequests');
    Route::get('vendor/supplierposting', Supplierposting::class)->name('supplierposting');
    Route::get('procurement/po/view/{id}', PurchaseItems::class)->name('poView');
    Route::get('procurement/po/view/{id}', [PDFController::class, 'index'])->name('pdf');
    Route::get('procurement/po/download/{id}', [PDFController::class, 'downloadPdf'])->name('download');
    Route::get('vendor/supplierlist', Supplierlist::class)->name('supplierlist');
    Route::get('vendor/disposal', Disposal::class)->name('disposal');
    Route::get('vendor/bidders', Bidders::class)->name('bidders');
    Route::get('vendor/buyers', Buyers::class)->name('buyers');
});

//Finance Routes
Route::prefix('finance')->middleware('auth', 'isFinance')->group(function () {
    Route::view('dashboard', 'livewire.finance.dashboard')->name('finance');
    Route::get('budgets', Budgets::class)->name('transaction');
    Route::get('requestedlist', Requestedlist::class)->name('requestlist');
    Route::get('journals', Journals::class)->name('journal');
});

//Core Routes
Route::prefix('core')->middleware('auth', 'isCore')->group(function () {
    Route::view('dashboard', 'livewire.core.dashboard')->name('core');
});

//HR Routes
Route::prefix('hr')->middleware('auth', 'isHr')->group(function () {
    Route::view('dashboard', 'livewire.hr.dashboard')->name('hr');
    Route::get('leavemangement', Leavedata::class)->name('leave');
});
