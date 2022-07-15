<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardKelasController;
use App\Http\Controllers\dashboardLatihanController;
use App\Http\Controllers\dashboardMapelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\materiController;
use App\Http\Controllers\SubmitFormController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\forumController;
use App\Http\Controllers\pertanyaanController;
use App\Http\Controllers\jawabanController;

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

Route::middleware('RoleUser:guru,siswa')->group(function () {

    // PROFIL
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');

    Route::post('/profil/{id}',  [UserController::class,'updateProfil']);

    Route::post('/profil/password/{id}', [UserController::class,'updatePassword']);



    Route::get('/', [berandaController::class, 'index']);

    Route::get('/kelas/{kela:id}', [berandaController::class, 'listMapel']);

    Route::get('/kelas/{kela:id}', [berandaController::class, 'listMapel']);


    
    // LATIHAN

    Route::get('/kelas/latihan/{mapel:id}/create', [LatihanController::class, 'create']);

    Route::get('/kelas/latihan/{id}/{latihan:id}/edit', [LatihanController::class, 'edit']);

    Route::post('/kelas/latihan/{id}/{latihan:id}/update', [LatihanController::class, 'update']);

    Route::get('/kelas/latihan/{id}/{latihan:id}/delete', [LatihanController::class, 'destroy']);

    Route::post('/kelas/latihan/{mapel:id}', [LatihanController::class, 'store']);

    Route::get('/kelas/latihan/{mapel:id}/{tgl}', [LatihanController::class, 'latihanList']);

    // MATERI

    Route::get('/kelas/materi/{mapel:id}/create', [materiController::class, 'create']);

    Route::get('/kelas/materi/{id}/{materi:id}/edit', [materiController::class, 'edit']);

    Route::post('/kelas/materi/{id}/{materi:id}/update', [materiController::class, 'update']);

    Route::get('/kelas/materi/{id}/{materi:id}/delete', [materiController::class, 'destroy']);

    Route::post('/kelas/materi/{mapel:id}', [materiController::class, 'store']);

    Route::get('/kelas/materi/{mapel:id}/{tgl}', [materiController::class, 'materiList']);

    Route::get('/kelas/materi/{mapel:id}/forum/question', [forumController::class, 'index']);

    Route::resource('/kelas/materi/forum/mapel.question', pertanyaanController::class);

    Route::get('/kelas/materi/forum/accept/{id}/{pertanyaan:id}/{status}/{jwb}', [pertanyaanController::class, 'accept']);

    Route::post('/kelas/materi/forum/{id}/{pertanyaan:id}/{jwb}/delete', [jawabanController::class, 'destroy']);

    Route::resource('/kelas/materi/forum/question.jawab', jawabanController::class); 
    // /kelas/materi/forum/mapel/1/kelas/materi/forum/accept/mapel/1/question/3



    Route::get('/kelas', function () {
        return view('kelas');
    });


    // SUBMIT FORM

    Route::post('/kelas/submitForm/{id}/{submitForm:id}/update', [SubmitFormController::class, 'update']);

    Route::get('/kelas/submitForm/{id}/{submitForm:id}/delete', [SubmitFormController::class, 'destroy']);

    Route::post('/kelas/submitForm/{mapel:id}', [SubmitFormController::class, 'store']);

    Route::get('/kelas/submitForm/{mapel:id}/{tgl}', [SubmitFormController::class, 'submitList']);

    // SUBMISSION

    Route::post('/kelas/submission/{mapel:id}', [SubmissionController::class, 'store']);

    Route::get('/kelas/submission/{mapel:id}/{id}/delete', [SubmissionController::class, 'destroy']);

    Route::post('/kelas/submission/{mapel:id}/{id}/update', [SubmissionController::class, 'update']);

    // Route::get('/kelas', function () {
    //     return view('kelas');
    // });

    // // Route::get('/detail', function () {
    // //     return view('mapel');
    // // });

    // Route::get('/submit', function () {
    //     return view('submission');
    // });

    // Route::get('/latihan', function () {
    //     return view('latihan');
    // });

    Route::get('/forum',[forumController::class, 'index']);


});

// GURU

Route::middleware('RoleUser:guru')->group(function () {


    // Route::get('/kelas/{kela:id}', das);

    Route::get('/dashboard', [dashboardKelasController::class, 'index']);

    Route::resource('/dashboard/kelas', dashboardKelasController::class);

    Route::resource('/dashboard/mapel', dashboardMapelController::class);

    Route::get('/dashboard/mapel/kelas/{kela:id}', [dashboardMapelController::class, 'listMapel']);

    Route::get('/dashboard/mapel/{kela:id}/create', [dashboardMapelController::class, 'create']);


    // Latihan
    Route::get('/dashboard/latihan', [dashboardLatihanController::class, 'kelolaLatihan']);

    Route::prefix('dashboard/latihan')->group(function () {
        Route::get('/', [dashboardLatihanController::class, 'kelolaLatihan'])->name('kelola-latihan');
        Route::resource('kelola', dashboardLatihanController::class);
    });
});

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
