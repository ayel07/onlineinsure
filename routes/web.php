<?php

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
Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return redirect('/home');
    });

    Route::get('/salesreps', [App\Http\Controllers\SalesrepController::class, 'index'])->name('salesrep_view');
    Route::get('/salesreps/add', [App\Http\Controllers\SalesrepController::class, 'addform'])->name('salesrep_add');
    Route::post('/salesreps/add', [App\Http\Controllers\SalesrepController::class, 'add'])->name('salesrep_save');
    Route::get('/salesreps/{id}/delete', [App\Http\Controllers\SalesrepController::class, 'delete'])->name('salesrep_delete');

    Route::get('/payroll', [App\Http\Controllers\PayrollController::class, 'index'])->name('payroll');
    Route::post('/payroll', [App\Http\Controllers\PayrollController::class, 'generate'])->name('payroll_generate');
    Route::get('/payroll/{id}', [App\Http\Controllers\PayrollController::class, 'pdf'])->name('payroll_pdf');

    Route::get('/pdf', [App\Http\Controllers\PayrollController::class, 'list'])->name('pdf_list');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Auth::routes();

