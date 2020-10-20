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

Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/apiList', [App\Http\Controllers\PrescriptionController::class, 'apiList'])->name('apiList');
    Route::get('/report', [App\Http\Controllers\PrescriptionController::class, 'generateReport'])->name('report');
    Route::post('/createPrescription', [App\Http\Controllers\PrescriptionController::class, 'create'])->name('createPrescription');
    Route::post('/filterList', [App\Http\Controllers\PrescriptionController::class, 'filterList'])->name('filterList');
    Route::post('/updatePrescription', [App\Http\Controllers\PrescriptionController::class, 'update'])->name('updatePrescription');
    Route::any('/fetchEditItemInfo/{pres_id}', [App\Http\Controllers\PrescriptionController::class, 'fetch']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/presItemDelete/{pres_id}', [App\Http\Controllers\PrescriptionController::class, 'delete']);


