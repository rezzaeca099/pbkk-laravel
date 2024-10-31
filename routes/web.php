<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MasterAkunController;
use App\Http\Controllers\Admin\PermohonanLayananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterLayananController;
use App\Http\Controllers\profilecontroller;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// auth_login
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
Route::get('/my/profile', [AuthController::class, 'profile'])->name('auth.profile');
Route::post('/proseslogin', [AuthController::class,'proseslogin'])->name('auth.proseslogin');

// auth_register
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

// Master-data_Layanan
Route::get('/master-layanan', [MasterLayananController::class, 'index'])->name('master-layanan.index');
Route::post('/master-layanan/store', [MasterLayananController::class, 'store'])->name('master-layanan.store');
Route::get('/master-layanan/edit/{id}', [MasterLayananController::class, 'edit'])->name('master-layanan.edit');
Route::post('/master-layanan/update/{id}', [MasterLayananController::class, 'update'])->name('master-layanan.update');
Route::get('/master-layanan/{id}', [MasterLayananController::class, 'destroy'])->name('master-layanan.destroy');

// Master-data_akun
Route::get('/master-akun', [MasterAkunController::class, 'index'])->name('master-akun.index');
Route::post('/master-akun/store', [MasterAkunController::class, 'store'])->name('master-akun.store');
Route::get('/master-akun/edit/{id}', [MasterAkunController::class, 'edit'])->name('master-akun.edit');
Route::post('/master-akun/update/{id}', [MasterAkunController::class, 'update'])->name('master-akun.update');
Route::get('/master-akun/{id}', [MasterAkunController::class, 'destroy'])->name('master-akun.destroy');

// permohonan_Layanan
Route::get('/permohonan', [PermohonanLayananController::class, 'index'])->name('permohonan.index');
Route::get('/permohonan/create', [PermohonanLayananController::class, 'create'])->name('permohonan.create');
Route::post('/permohonan/store', [PermohonanLayananController::class, 'store'])->name('permohonan.store');
Route::get('/permohonan/edit{id}', [PermohonanLayananController::class, 'edit'])->name('permohonan.edit');
Route::post('/permohonan/update{id}', [PermohonanLayananController::class, 'update'])->name('permohonan.update');
Route::post('/permohonan/{id}', [PermohonanLayananController::class, 'destroy'])->name('permohonan.destroy');

// Profile
Route::get('/profile/index', [profilecontroller::class,'index'])->name('profile.index');
Route::get('/profile/edit{id}', [profilecontroller::class,'edit'])->name('profile.edit');
Route::post('/profile/store', [profilecontroller::class,'store'])->name('profile.store');
Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');

//  









