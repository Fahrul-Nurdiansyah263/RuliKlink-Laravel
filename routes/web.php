<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\FormInputController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BerandaController;

// Halaman selamat datang
Route::get('/', function () {
    return view('welcome');
});
// Login dan autentikasi backend
Route::get('backend/login', [LoginController::class, 'loginBackend'])->name('backend.login');
Route::post('backend/login', [LoginController::class, 'authenticateBackend'])->name('backend.login');
Route::post('/logout', [LoginController::class, 'logoutBackend'])->name('logout')->middleware('auth');

// Halaman utama frontend
Route::get('/index/ruliklinik', [FrontEndController::class, 'index']);

// Form input pasien dari frontend
Route::get('formInput', [FormInputController::class, 'create'])->name('pasien.form.create');
Route::post('formInput', [FormInputController::class, 'store'])->name('pasien.form.store');

// Routing untuk backend yang dilindungi autentikasi
Route::middleware(['auth'])->group(function () {
    
    // Dashboard Admin
    Route::get('backend/beranda', [BerandaController::class, 'index'])->name('backend.beranda');
    
    // User management
    Route::get('backend/user/trashed', [UserController::class, 'trashed'])->name('backend.user.trashed');
    Route::get('backend/user/restore/{id}', [UserController::class, 'restore'])->name('backend.user.restore');
    Route::post('backend/user/force-delete/{id}', [UserController::class, 'forceDelete'])->name('backend.user.forceDelete');
    Route::resource('backend/user', UserController::class, ['as' => 'backend'])->except(['show']);

    // Pasien management
    Route::get('backend/pasien/trashed', [PasienController::class, 'trashed'])->name('backend.pasien.trashed');
    Route::get('backend/pasien/restore/{id}', [PasienController::class, 'restore'])->name('backend.pasien.restore');
    Route::post('backend/pasien/force-delete/{id}', [PasienController::class, 'forceDelete'])->name('backend.pasien.forceDelete');
    Route::resource('backend/pasien', PasienController::class, ['as' => 'backend'])->except(['show']);

});
