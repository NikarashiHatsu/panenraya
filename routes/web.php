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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'check_admin'], function() {
    Route::group(['prefix' => 'peternakan', 'as' => 'peternakan.'], function() {
        Route::resource('', '\App\Http\Controllers\PeternakanController');
        Route::resource('hewan_darat', '\App\Http\Controllers\Peternakan\HewanDaratController');
        Route::resource('hewan_air', '\App\Http\Controllers\Peternakan\HewanAirController');
        Route::resource('hewan_amfibi', '\App\Http\Controllers\Peternakan\HewanAmfibiController');
        Route::resource('relawan_peternakan', '\App\Http\Controllers\Peternakan\RelawanPeternakanController');
    });

    Route::resource('pertanian', '\App\Http\Controllers\PertanianController');
    Route::resource('nelayan', '\App\Http\Controllers\NelayanController');
    Route::resource('pasar_rakyat', '\App\Http\Controllers\PasarRakyatController');
    Route::resource('umkm', '\App\Http\Controllers\UMKMController');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
