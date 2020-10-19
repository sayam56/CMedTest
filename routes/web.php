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

/* Route::get('/', function () {
    return view('welcome');
}); */

/* Route::get('/','App\Http\Controllers\MainController@index'); */
/* Route::group(['middleware' => ['auth']], function () { 

});
 */
Route::group(['middleware' => ['web', 'auth']], function(){
    Route::get('/apiList', [App\Http\Controllers\PrescriptionController::class, 'apiList'])->name('apiList');
    Route::get('/report', [App\Http\Controllers\PrescriptionController::class, 'generateReport'])->name('report');
    Route::post('/createPrescription', [App\Http\Controllers\PrescriptionController::class, 'create'])->name('createPrescription');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::any('/presItemDelete/{pres_id}', [App\Http\Controllers\PrescriptionController::class, 'delete']);





/* Route::group(['middleware' => 'auth', 'namespace' => 'user'], function () {
   
}); */
