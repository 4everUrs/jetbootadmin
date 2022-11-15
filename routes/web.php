
<?php

use App\Http\Controllers\ApplyLeaveController;
use App\Http\Controllers\AtmController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Livewire\Admin\UsersList;
use App\Http\Livewire\Logistics\Procurement\PurchaseItems;
use App\Http\Controllers\TimeInController;
use App\Http\Controllers\DisbursementController;
use App\Http\Controllers\DownloadProposalController;
use App\Http\Controllers\GeneralLedgerController;
use App\Http\Controllers\InvoiceDownloadController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProposalDownloadController;
use App\Http\Controllers\UclaimsController;
use App\Http\Controllers\UleaveController;
use App\Http\Livewire\Admin\AuditTrails;
use App\Http\Livewire\Admin\Mailbox;
use App\Http\Livewire\Logistics\Procurement\Requestlists;
use App\Http\Livewire\Logistics\Warehouse\Inventory;
use App\Http\Livewire\Logistics\Warehouse\Requestslist;
use App\Http\Livewire\Hr\Leavemanagement\Leavedata;
use App\Http\Livewire\Finance\Bm\Budgets;
use App\Http\Livewire\Core\Recruit\Applicantname;
use App\Http\Livewire\Core\Am\Candidate;
use App\Http\Livewire\Core\Am\Deniedapplicant;
use App\Http\Livewire\Core\Am\Initial;
use App\Http\Livewire\Core\Am\Jobcandidate;
use App\Http\Livewire\Core\Nhb\Onboarding;
use App\Http\Livewire\Core\Em\Employeedata;
use App\Http\Livewire\Core\Rap\Applicantreport;
use App\Http\Livewire\Core\Rap\Clientreport;
use App\Http\Livewire\Core\Pjm\Jobvacancy;
use App\Http\Livewire\Core\Ppm\Paymentfee;
use App\Http\Livewire\Core\Ppm\Payment;
use App\Http\Livewire\Core\Ppm\Budgetproposal;
use App\Http\Livewire\Core\Ppm\Internpayment;
use App\Http\Livewire\Core\Pm\Placementfee;
use App\Http\Livewire\Core\Pm\Internplacement;
use App\Http\Livewire\Core\Cm\Addclient;
use App\Http\Livewire\Core\Cm\Clientdata;
use App\Http\Livewire\Core\Cm\Joblist;
use App\Http\Livewire\Core\Cacm\Agreement;
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
use App\Http\Livewire\Finance\Bm\Listsofpayables;
use App\Http\Livewire\Finance\Bm\Listsofreceivables;
use App\Http\Livewire\Logistics\Projectmanagement\Projectslists;
use App\Http\Livewire\Finance\Bm\Disbursements;
use App\Http\Livewire\Finance\Bm\Generalledgers;
use App\Http\Livewire\Finance\Bm\Collections;
use App\Http\Livewire\Finance\Bm\Allocates;
use App\Http\Livewire\Finance\Bm\Balancesheets;
use App\Http\Livewire\Hr\Claimreimburse\Claimapprove;
use App\Http\Livewire\Hr\Claimreimburse\Claimdis;
use App\Http\Livewire\Hr\Compensation\Claimed;
use App\Http\Livewire\Hr\Employeelist\Employee;
use App\Http\Livewire\Hr\Leavemanagement\Approval;
use App\Http\Livewire\Hr\Leavemanagement\Approve;
use App\Http\Livewire\Hr\Leavemanagement\Disapproval;
use App\Http\Livewire\Hr\Leavemanagement\Disapprove;
use App\Http\Livewire\Hr\Payroll\Timemachine;
use App\Http\Livewire\Hr\Payroll\Trypay;
use App\Http\Livewire\Hr\Timeaattendance\Monthlydata;
use App\Http\Livewire\Hr\Timeaattendance\Onemonthlydata;
use App\Http\Livewire\Hr\Timeaattendance\Oneweeklydata;
use App\Http\Livewire\Hr\Timeaattendance\Weeklydata;
use App\Http\Livewire\Logistics\Assetmgmt\AssetAuditExport;
use App\Http\Livewire\Logistics\Assetmgmt\Assetslist;
use App\Http\Livewire\Logistics\Assetmgmt\Createasset;
use App\Http\Livewire\Logistics\Assetmgmt\Delivery;
use App\Http\Livewire\Logistics\Assetmgmt\Evaluations;
use App\Http\Livewire\Logistics\Assetmgmt\Invoices as AssetmgmtInvoices;
use App\Http\Livewire\Logistics\Assetmgmt\MaintenanceRequests;
use App\Http\Livewire\Logistics\Assetmgmt\Orderlist;
use App\Http\Livewire\Logistics\Assetmgmt\Reportst;
use App\Http\Livewire\Logistics\AuditManagement\AuditReports;
use App\Http\Livewire\Logistics\AuditManagement\Records;
use App\Http\Livewire\Logistics\AuditManagement\Reports as AuditManagementReports;
use App\Http\Livewire\Logistics\AuditManagement\Auditofficer;
use App\Http\Livewire\Logistics\AuditManagement\Auditscheduling;
use App\Http\Livewire\Logistics\Daksboard;
use App\Http\Livewire\Logistics\Dashboard;
use App\Http\Livewire\Logistics\Projectmanagement\Createnewproject;
use App\Http\Livewire\Logistics\Projectmanagement\Proposal;
use App\Http\Livewire\Logistics\Fleet\Activity;
use App\Http\Livewire\Logistics\Fleet\DeliveryList;
use App\Http\Livewire\Logistics\Fleet\Dispatching;
use App\Http\Livewire\Logistics\Fleet\Maps;
use App\Http\Livewire\Logistics\Fleet\Reservation;
use App\Http\Livewire\Logistics\Fleet\Rominventory;
use App\Http\Livewire\Logistics\Fleet\Romrequest;
use App\Http\Livewire\Logistics\Fleet\Romrequestlist;
use App\Http\Livewire\Logistics\Fleet\VehicleRequest;
use App\Http\Livewire\Logistics\Fleet\Vinfo;
use App\Http\Livewire\Logistics\Fleet\Vlists;
use App\Http\Livewire\Logistics\Procurement\Bmproposals;
use App\Http\Livewire\Logistics\Procurement\Invoices;
use App\Http\Livewire\Logistics\Procurement\Proposalsview;
use App\Http\Livewire\Logistics\Procurement\Reorders;
use App\Http\Livewire\Logistics\Projectmanagement\Contractors;
use App\Http\Livewire\Logistics\Projectmanagement\Pmrequests;
use App\Http\Livewire\Logistics\Projectmanagement\Projectproposals;
use App\Http\Livewire\Logistics\Projectmanagement\Reports;
use App\Http\Livewire\Logistics\Users;
use App\Http\Livewire\Logistics\Vendorportal\Workshops;
use App\Http\Livewire\Logistics\Warehouse\Exportinventory;
use App\Http\Livewire\Logistics\Warehouse\Invoices as WarehouseInvoices;
use App\Http\Livewire\Logistics\Warehouse\PurchaseOrders as WarehousePurchaseOrders;
use App\Http\Livewire\Messages;
use App\Models\WhInvoice;
use App\Models\Claiming;

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

// Route::get('/timemachine',Timemachine::class)->name('Timemachine');
// Route::get('/timein',[Timemachine::class,'timein'])->name('timein');

Route::get('/atm', [AtmController::class, 'index'])->name('atm');
Route::get('/uleave', [UleaveController::class, 'uleave'])->name('uleave');
Route::get('/uclaims', [UclaimsController::class, 'uclaims'])->name('uclaims');

Route::post('/timein', [AtmController::class, 'timein'])->name('timein');
Route::post('/leaving', [UleaveController::class, 'leaving'])->name('leaving');

Route::post('/breakin', [AtmController::class, 'breakin'])->name('breakin');
Route::post('/breakout', [AtmController::class, 'breakout'])->name('breakout');
Route::post('/timeout', [AtmController::class, 'timeout'])->name('timeout');


// Route::post('/breakout',[AtmController::class,'breakout'])->name('breakout');
// Route::post('/timeout',[AtmController::class,'timeout'])->name('timeout');
// Route::get('/timein',[Timemachine::class,'timein'])->name('timein');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/testfile', [PDFController::class, 'testDownload']);


Route::middleware('auth')->group(function () {
    Route::get('/messages', Messages::class)->name('messaging');
    Route::get('proposal/download/{id}', [Proposalsview::class, 'downloadProposal'])->name('bmproposaldownload');
    Route::get('project/download/{id}', [Projectproposals::class, 'downloadProposal'])->name('projectproposal');
});

//Login Routes
Route::get('/redirects', [LoginController::class, 'login'])->name('home');
Route::get('/staff', [LoginController::class, 'staff'])->name('staff');
Route::get('/manager', [LoginController::class, 'manager'])->name('manager');

//Admin Routes
Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function () {
    Route::view('dashboard', 'livewire.admin.dashboard')->name('dashboard');
    Route::get('users', UsersList::class)->name('users');
    Route::get('audit', AuditTrails::class)->name('audits');
    Route::get('mailbox', Mailbox::class)->name('mailbox');
});

//Logistics Routes
Route::prefix('logistics')->middleware('auth', 'isLogistics')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('logistics');
    Route::get('users', Users::class)->name('users-lists');
    Route::get('procurement/requests', Requestlists::class)->name('requests');
    Route::get('warehouse/inventory', Inventory::class)->name('inventory');
    Route::get('warehouse/purchase-orders', WarehousePurchaseOrders::class)->name('warehousePO');
    Route::get('warehouse/requests', Requestslist::class)->name('requestlists');
    Route::get('procurement/suppliers', Supplierslists::class)->name('suppliers');
    Route::get('projectmanagement/contractors', Supplierslists::class)->name('contractorspm');
    Route::get('procurement/proposals', Bmproposals::class)->name('bmproposal');
    Route::get('procurement/invoices', Invoices::class)->name('invoice');
    Route::get('procurement/purchaseorder', Purchaseorders::class)->name('po');
    Route::get('vendor/recievedrequests', RecievedRequests::class)->name('recievedrequests');
    Route::get('vendor/supplierposting', Supplierposting::class)->name('supplierposting');
    Route::get('procurement/po/view/{id}', PurchaseItems::class)->name('poView');
    Route::get('procurement/po/view/{id}', [PDFController::class, 'index'])->name('pdf');
    Route::get('procurement/po/download/{id}', [PDFController::class, 'testDownload'])->name('download');
    Route::get('asset/invoice/download/{data}', [InvoiceDownloadController::class, 'invoiceDownload'])->name('invoiceDownload');
    Route::get('vendor/supplierlist', Supplierlist::class)->name('supplierlist');
    Route::get('vendor/disposal', Disposal::class)->name('disposal');
    Route::get('vendor/bidders', Bidders::class)->name('bidders');
    Route::get('vendor/buyers', Buyers::class)->name('buyers');
    Route::get('vendor/workshops', Workshops::class)->name('workshop');
    Route::get('projects/lists', Projectslists::class)->name('projects');
    Route::get('assets/lists', Assetslist::class)->name('assets');
    Route::get('assets/new', Createasset::class)->name('newasset');
    Route::get('assets/orders', Orderlist::class)->name('assetorders');
    Route::get('assets/lists/export', [AssetAuditExport::class, 'export'])->name('auditExport');
    Route::get('assets/delivery', Delivery::class)->name('delivery-request');
    Route::get('assets/invoices', AssetmgmtInvoices::class)->name('assetinvoice');
    Route::get('project/new', Createnewproject::class)->name('newproject');
    Route::get('project/proposal', Proposal::class)->name('proposal');
    Route::get('project/requests', Pmrequests::class)->name('pmrequests');
    Route::get('project/proposal/download/{id}', [DownloadProposalController::class, 'proposalDownload'])->name('proposalDownload');
    Route::get('fleet/vinfo', Vinfo::class)->name('vehicleinformation');
    Route::get('fleet/maps', Maps::class,)->name('mappers');
    Route::get('fleet/delivery', DeliveryList::class,)->name('deliverylist');
    Route::get('fleet/romrequest', Romrequest::class)->name('repairs');
    Route::get('fleet/reservation', Reservation::class)->name('reserve');
    Route::get('fleet/dispatching', Dispatching::class)->name('dispatching');
    Route::get('fleet/request', VehicleRequest::class)->name('vehiclerequest');
    Route::get('fleet/romrequestlist', Romrequestlist::class)->name('romlist');
    Route::get('fleet/rominventory', Rominventory::class)->name('rominventory');
    Route::get('fleet/lists', Vlists::class)->name('vlists');
    Route::get('asset/evaluations', Evaluations::class)->name('evaluations');
    Route::get('asset/reports', Reportst::class)->name('assetreport');
    Route::get('asset/maintenance', MaintenanceRequests::class)->name('assetmaintenance');
    Route::get('projectmanagement/reports', Reports::class)->name('pmreports');
    Route::get('warehouse/invoices', WarehouseInvoices::class)->name('warehouseInvoice');
    Route::get('audit/dashboard', AuditReports::class)->name('auditsdashboard');
    Route::get('audit/reports', AuditManagementReports::class)->name('auditReports');
    Route::get('audit/records', Records::class)->name('auditRecords');
    Route::get('audit/auditofficer', Auditofficer::class)->name('auditofficer');
    Route::get('audit/auditscheduling', Auditscheduling::class)->name('auditscheduling');
    Route::get('warehouse/inventory/export', [Exportinventory::class, 'export'])->name('exportInventory');
});

//Finance Routes
Route::prefix('finance')->middleware('auth', 'isFinance')->group(function () {
    Route::view('dashboard', 'livewire.finance.dashboard')->name('finance');
    Route::get('budgets', Budgets::class)->name('transaction');
    Route::get('requestedlist', Requestedlist::class)->name('requestlist');
    Route::get('journals', Journals::class)->name('journal');
    Route::get('disbursements', Disbursements::class)->name('moneyTransaction');
    Route::get('generalledgers', Generalledgers::class)->name('generalledge');
    Route::get('collections', Collections::class)->name('collects');
    Route::get('allocates', Allocates::class)->name('allocatebudget');
    Route::get('balancesheets', Balancesheets::class)->name('bsheets');
    Route::get('listsofpayables', Listsofpayables::class)->name('listspayables');
    Route::get('listsofreceivables', Listsofreceivables::class)->name('listsreceivable');
    Route::get('loaddisburse', [DisbursementController::class, 'downloadPdf'])->name('export');
    Route::get('genledgerreport', [GeneralLedgerController::class, 'downloadPdf'])->name('generalreports');
});


//Core Routes
Route::prefix('core')->middleware('auth', 'isCore')->group(function () {
    Route::view('dashboard', 'livewire.core.dashboard')->name('core');
    Route::get('recruit/applicantname', Applicantname::class)->name('applicantname');
    Route::get('am/candidate', Candidate::class)->name('candidate');
    Route::get('am/deniedapplicant', Deniedapplicant::class)->name('deniedapplicant');
    Route::get('am/initial', Initial::class)->name('initial');
    Route::get('am/deniedapplicant', Deniedapplicant::class)->name('deniedapplicant');
    Route::get('am/jobcandidate', Jobcandidate::class)->name('jobcandidate');
    Route::get('nhb/onboarding', Onboarding::class)->name('onboarding');
    Route::get('em/employeedata', Employeedata::class)->name('employeedata');
    Route::get('rap/applicantreport', Applicantreport::class)->name('applicantreport');
    Route::get('rap/clientreport', Clientreport::class)->name('clientreport');
    Route::get('pjm/jobvacancy', Jobvacancy::class)->name('jobvacancy');
    Route::get('ppm/paymentfee', Paymentfee::class)->name('paymentfee');
    Route::get('ppm/payment', Payment::class)->name('payment');
    Route::get('ppm/budgetproposal', Budgetproposal::class)->name('budgetproposal');
    Route::get('ppm/internpayment', internpayment::class)->name('internpayment');
    Route::get('pm/placementfee', Placementfee::class)->name('placementfee');
    Route::get('pm/internplacement', Internplacement::class)->name('internplacement');
    Route::get('cm/addclient', Addclient::class)->name('addclient');
    Route::get('cm/clientdata', Clientdata::class)->name('clientdata');
    Route::get('cm/joblist', Joblist::class)->name('joblist');
    Route::get('cacm/agreement', Agreement::class)->name('agreement');
    Route::get('joblisting', JobList::class)->name('joblisting');
    Route::get('mailbox', Mailbox::class)->name('emailbox');
    Route::get('contract/download/{id}', [ContractController::class, 'downloadContract'])->name('downloadcontract');
});

//HR Routes
Route::prefix('hr')->middleware('auth', 'isHr')->group(function () {
    Route::view('dashboard', 'livewire.hr.dashboard')->name('hr');
    Route::get('timesheet', Timesheetdata::class)->name('timesheet');
    Route::get('shift', Shiftdata::class)->name('shift');
    Route::get('analytics', Analyticdata::class)->name('analytics');
    Route::get('corehuman', Coredata::class)->name('corehuman');
    Route::get('time', Timedata::class)->name('time');
    Route::get('oneweekly', Oneweeklydata::class)->name('oneweekly');
    Route::get('onemonthly', Onemonthlydata::class)->name('onemonthly');
    Route::get('leavemangement', Leavedata::class)->name('leave');
    Route::get('approval', Approval::class)->name('approval');
    Route::get('disapproval', Disapproval::class)->name('disapproval');
    Route::get('pay', Paydata::class)->name('pay');
    Route::get('print', [PrintController::class, 'print'])->name('print');
    Route::get('claim', Claimdata::class)->name('claim');
    Route::get('claimapprove', Claimapprove::class)->name('claimapprove');
    Route::get('claimdis', Claimdis::class)->name('claimdis');
    Route::get('compensation', Compensationdata::class)->name('compensation');
    Route::get('claiming', Claimed::class)->name('claiming');
    Route::get('employee', Employee::class)->name('employee');
});
