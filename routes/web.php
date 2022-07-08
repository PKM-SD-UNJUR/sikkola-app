<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardKelasController;
use App\Http\Controllers\dashboardMapelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\materiController;

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

Route::get('/', [berandaController::class, 'index']);

Route::get('/kelas/{kela:id}', [berandaController::class, 'listMapel']);

Route::get('/kelas/{kela:id}', [berandaController::class, 'listMapel']);

Route::get('/kelas/materi/{mapel:id}/',[materiController::class,'materiList']);

Route::get('/kelas', function () {
    return view('kelas');
});

Route::get('/detail', function () {
    return view('mapel');
});

Route::get('/submit', function () {
    return view('submission');
});

Route::get('/latihan', function () {
    return view('latihan');
});

Route::get('/dashboard', function () {
    return view('dashboard-layout.kelas.kelas');
});

// Route::get('/kelas/{kela:id}', das);

Route::resource('/dashboard/kelas', dashboardKelasController::class);

Route::resource('/dashboard/mapel', dashboardMapelController::class);

Route::get('/dashboard/mapel/kelas/{kela:id}',[dashboardMapelController::class,'listMapel']);

Route::get('/dashboard/mapel/{kela:id}/create',[dashboardMapelController::class,'create']);
