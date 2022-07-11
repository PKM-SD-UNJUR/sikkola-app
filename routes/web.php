<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardKelasController;
use App\Http\Controllers\dashboardMapelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\UserController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// SISWA

Route::middleware(['auth', 'RoleUser:siswa'])->group(function () {

    // PROFIL
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');

    Route::post('/profil/{id}',  [UserController::class,'updateProfil']);

    Route::post('/profil/password/{id}', [UserController::class,'updatePassword']);



    Route::get('/', [berandaController::class, 'index']);

    Route::get('/kelas/{kela:id}', [berandaController::class, 'listMapel']);

    Route::get('/kelas/{kela:id}', [berandaController::class, 'listMapel']);

    // Route::get('/kelas/materi/{mapel:id}/',[materiController::class,'materiList']);

    Route::get('/kelas/materi/{mapel:id}/create', [materiController::class, 'create']);

    Route::get('/kelas/materi/{id}/{materi:id}/edit', [materiController::class, 'edit']);

    Route::post('/kelas/materi/{id}/{materi:id}/update', [materiController::class, 'update']);

    Route::get('/kelas/materi/{id}/{materi:id}/delete', [materiController::class, 'destroy']);

    Route::post('/kelas/materi/{mapel:id}', [materiController::class, 'store']);

    Route::get('/kelas/materi/{mapel:id}/{tgl}', [materiController::class, 'materiList']);

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

    // Route::get('/dashboard', function () {
    //     return view('dashboard-layout.kelas.kelas');
    // });
});

// GURU

Route::middleware(['auth', 'RoleUser:guru'])->group(function () {


    // Route::get('/kelas/{kela:id}', das);

    Route::resource('/dashboard/kelas', dashboardKelasController::class);

    Route::resource('/dashboard/mapel', dashboardMapelController::class);

    Route::get('/dashboard/mapel/kelas/{kela:id}', [dashboardMapelController::class, 'listMapel']);

    Route::get('/dashboard/mapel/{kela:id}/create', [dashboardMapelController::class, 'create']);


    // Latihan
    Route::get('/dashboard/latihan', [LatihanController::class, 'kelolaLatihan']);

    Route::prefix('dashboard/latihan')->group(function () {
        Route::get('/', [LatihanController::class, 'kelolaLatihan'])->name('kelola-latihan');
        Route::resource('kelola', LatihanController::class);
    });
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
