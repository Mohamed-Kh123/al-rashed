<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

    Route::resource('/clients', ClientController::class);
    Route::get('/client/without-payment/{month}', [ClientController::class, 'getClientsWithoutPayments'])->name('client.without-payment');
    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');
    Route::get('payments/{id}/create', [PaymentsController::class, 'create'])->name('payments.create');
    Route::post('payments/store/{id?}', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('payments/{id}/edit',[PaymentsController::class, 'edit'])->name('payments.edit');
    Route::put('payments/{id}/update',[PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('payments/{id}/delete',[PaymentsController::class, 'edit'])->name('payments.destroy');
    Route::get('/bill/{id}/edit', [PaymentsController::class, 'editInvoice'])->name('invoices.edit');
    Route::put('/bill/{id}/update', [PaymentsController::class, 'updateInvoice'])->name('invoices.update');
    Route::delete('/bill/{id}/delete', [PaymentsController::class, 'deleteInvoice'])->name('invoices.delete');
    Route::get('/bill/{id}', [PaymentsController::class, 'payment'])->name('payments.bill');
    Route::get('/pdf/{id}', [PaymentsController::class, 'pdfConvert'])->name('pdf');
    
    Route::get('/search', [SearchController::class, 'getResult'])->name('search');
    Route::get('/getNames', [SearchController::class, 'getNames']);


    Route::get('/test', function(){
    
        $invoices = Invoice::whereMonth('invoice_date', 2)->get('client_id');
        if($invoices){
            $clients = DB::table('clients')->leftJoin('invoices', function($join){
                $join->on('clients.id', '=', 'invoices.client_id')
                ->whereMonth('invoice_date', 3);
            })
            ->whereNull('invoices.id')
            ->toSql();
            return $clients;
        }
        

    });