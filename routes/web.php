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

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['check_admin', 'auth:sanctum']], function() {
    Route::group(['prefix' => 'peternakan', 'as' => 'peternakan.'], function() {
        Route::resource('', '\App\Http\Controllers\Admin\PeternakanController');
        Route::resource('hewan_darat', '\App\Http\Controllers\Admin\Peternakan\HewanDaratController');
        Route::resource('hewan_air', '\App\Http\Controllers\Admin\Peternakan\HewanAirController');
        Route::resource('hewan_amfibi', '\App\Http\Controllers\Admin\Peternakan\HewanAmfibiController');
        Route::resource('relawan_peternakan', '\App\Http\Controllers\Admin\Peternakan\RelawanPeternakanController');
    });

    Route::resource('pertanian', '\App\Http\Controllers\Admin\PertanianController');
    Route::resource('nelayan', '\App\Http\Controllers\Admin\NelayanController');
    Route::resource('pasar_rakyat', '\App\Http\Controllers\Admin\PasarRakyatController');
    Route::resource('umkm', '\App\Http\Controllers\Admin\UMKMController');
});

// User
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['check_user', 'auth:sanctum']], function() {
    Route::group(['prefix' => 'peternakan', 'as' => 'peternakan.'], function() {
        Route::resource('', '\App\Http\Controllers\User\PeternakanController');
        
        // Ayam App
        Route::group(['prefix' => 'ayam', 'as' => 'ayam.'], function() {
            Route::resource('', '\App\Http\Controllers\User\Peternakan\AyamController');
            Route::get('/app', '\App\Http\Controllers\User\Peternakan\AyamAppController@app')->name('app');
        });
    });
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
