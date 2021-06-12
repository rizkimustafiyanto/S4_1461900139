<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\kamarController;
use App\Http\Controllers\pasienController;


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
    return view('dashboard0139');
});

Route::get('export-excel',[dokterController::class, 'export']);
Route::get('exportkamar',[kamarController::class, 'export']);
Route::get('exportpasien',[pasienController::class, 'export']);
Route::resource('dokter', dokterController::class);
Route::resource('kamar', kamarController::class);
Route::resource('pasien', pasienController::class);