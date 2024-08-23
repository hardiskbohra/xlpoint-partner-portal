<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminRoleMiddleware;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');


Route::middleware([AdminRoleMiddleware::class])->group(function(){
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');
    Route::resource('users', App\Http\Controllers\UserController::class);
});

Route::middleware(['auth'])->group(function () {
    
        Route::get('/documents', [App\Http\Controllers\DocumentController::class, 'index'])->name('home');
        Route::post('/upload-bankstatement', [App\Http\Controllers\DocumentController::class, 'uploadBankStatement'])->name('upload.bankstatement');
        Route::post('/convert-to-excel', [App\Http\Controllers\DocumentController::class, 'convertToExcel'])->name('convert.to.excel');

        Route::get('/', function () {
            return redirect('/dashboard');
        })->name('dashboard');
        
        Route::view('dashboard', 'dashboard-analytics_copy')->middleware(['auth']);
    
        Route::get('/create-partner', function () {
            return view('partners.create');
        });
        
        Route::post('/store-partner', [App\Http\Controllers\PartnerController::class, 'store'])->name('submit.form');
        
        Route::get('/partners', [App\Http\Controllers\PartnerController::class, 'index'])->name('partner');
        
        // Route::resource('users', App\Http\Controllers\UserController::class);
        Route::resource('customers', App\Http\Controllers\CustomerController::class);
        Route::resource('transactions', App\Http\Controllers\TransactionController::class);
        Route::resource('roles', App\Http\Controllers\RoleController::class);
        Route::resource('permissions', App\Http\Controllers\PermissionController::class);
        Route::resource('invoices', App\Http\Controllers\InvoiceController::class);
        
        Route::get('/my-account', function () {
            return view('accounts.edit');
        });
        
        //update user status via ajax
        Route::post('/update-user-status/{id}/{status}', [App\Http\Controllers\UserController::class, 'updateUserStatus'])->name('users.updateStatus');
        
        //update role status via ajax
        Route::post('/update-role-status/{id}/{status}', [App\Http\Controllers\RoleController::class, 'updateRoleStatus'])->name('roles.updateRoleStatus');
});

Route::post('/get-customer-name',  [App\Http\Controllers\InvoiceController::class, 'getCustomerName'])->name('getCustomerName');
Route::get('/invoice/print', [App\Http\Controllers\InvoiceController::class, 'printInvoice'])->name('invoice.print');
Route::post('/update-delivered-status',  [App\Http\Controllers\InvoiceController::class, 'updateDeliveredStatus']);
Route::post('/add-payment-history',  [App\Http\Controllers\InvoiceController::class, 'addPaymentHistory'])->name('addpaymentHistory');



