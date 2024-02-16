<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\maskapaiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/ticket', [userController::class, 'index'])->name('ticket');
    Route::get('/searchticket', [userController::class, 'searchticket'])->name('search.tickets');
    Route::get('/buyticket/{id}', [userController::class, 'buyticket'])->name('buy.ticket');
    Route::get('/addcustomer{id}', [userController::class, 'addcustomer'])->name('add.customer');
    Route::post('/addctoticket', [userController::class, 'addctoticket'])->name('add.customer.toticket');
    Route::post('/removecfromticket', [userController::class, 'removecfromticket'])->name('remove.customer.fromticket');
    Route::post('/createcustomer/{id}', [userController::class, 'createcustomer'])->name('create.customer');
    Route::post('/maketransaction/{id}', [userController::class, 'createtransaction'])->name('make.transaction');
    Route::get('/booking', [userController::class, 'bookings'])->name('bookings');
    Route::get('/cancelbooking/{id}', [userController::class, 'cancelbooking'])->name('cancel.booking');
    Route::get('/payment/{id}', [userController::class, 'payment'])->name('pay.booking');
    Route::get('/home', function () {return view('dashboard');})->name('dashboard');
});

Route::middleware('role:unvalidated')->group(function () {
    Route::get('/unvalidated', [maskapaiController::class, 'indexUnvalidated'])->name('maskapai.unvalidated');
});

Route::middleware('role:maskapai')->group(function () {
    Route::get('/maskapaidashboard', [maskapaiController::class, 'index'])->name('maskapai.dashboard');
    Route::get('/addflight', [maskapaiController::class, 'create'])->name('add.flight');
    Route::post('/storeflight', [maskapaiController::class, 'store'])->name('store.flight');
    Route::get('/editflight/{id}', [maskapaiController::class, 'edit'])->name('edit.flight');
    Route::post('/update', [maskapaiController::class, 'update'])->name('update.flight');
    Route::get('/confirmtransaction', [maskapaiController::class, 'indexconfirmtransaction'])->name('transactions');
    Route::get('/confirmtransaction/{id}', [maskapaiController::class, 'confirmtransaction'])->name('confirm.transaction');
    Route::get('/declinetransaction/{id}', [maskapaiController::class, 'declinetransaction'])->name('decline.transaction');
    Route::get('/reportts', [maskapaiController::class, 'transactionreport'])->name('transaction.report');
    Route::get('/details/{id}', [maskapaiController::class, 'details'])->name('details');
    Route::post('/deleteflight/{id}', [maskapaiController::class, 'destroy'])->name('delete.flight');
    Route::get('/searchflight', [maskapaiController::class, 'searchflight'])->name('search.flight');
});
Route::middleware('role:admin')->group(function () {
    Route::post('/approveairline', [adminController::class, 'store'])->name('admin.approve');
    Route::post('/deleteairline', [adminController::class, 'destroy'])->name('admin.delete');
    Route::get('/admindashboard', [adminController::class, 'getUnvalidatedAirline'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
