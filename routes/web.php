<?php

use App\Http\Controllers\DependentDropdownController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanDinasController;
use App\Http\Controllers\MasterStatusController;
use App\Http\Controllers\MasterUnitKerjaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\MasterStatus;
use App\Models\MasterUnitKerja;
use Illuminate\Support\Facades\Route;

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider and all of them will
 * | be assigned to the "web" middleware group. Make something great!
 * |
 */

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::prefix('master-unit-kerja')->group(function () {
        Route::get('/', [MasterUnitKerjaController::class, 'index'])->name('muk.index');
        Route::get('/create', [MasterUnitKerjaController::class, 'create'])->name('muk.create');
        Route::post('/', [MasterUnitKerjaController::class, 'store'])->name('muk.store');
        Route::get('/edit-master-unit/{id}', [MasterUnitKerjaController::class, 'edit'])->name('muk.edit');
        Route::put('/update-data/{id}', [MasterUnitKerjaController::class, 'update'])->name('muk.update');
        Route::delete('/{id}', [MasterUnitKerjaController::class, 'destroy'])->name('muk.destroy');
    });
    Route::prefix('master-status')->group(function () {
        Route::get('/', [MasterStatusController::class, 'index'])->name('status.index');
        Route::get('/create', [MasterStatusController::class, 'create'])->name('status.create');
        Route::post('/', [MasterStatusController::class, 'store'])->name('status.store');
        Route::get('/edit-master-unit/{id}', [MasterStatusController::class, 'edit'])->name('status.edit');
        Route::put('/update-data/{id}', [MasterStatusController::class, 'update'])->name('status.update');
        Route::delete('/{id}', [MasterStatusController::class, 'destroy'])->name('status.destroy');
    });

    Route::prefix('lapor-perjalanan-dinas')->group(function () {
        Route::get('/', [LaporanDinasController::class, 'index'])->name('laporan-dinas.index');
        Route::get('/create', [LaporanDinasController::class, 'create'])->name('laporan-dinas.create');
        Route::post('/', [LaporanDinasController::class, 'store'])->name('laporan-dinas.store');
        Route::get('/edit/{id}', [LaporanDinasController::class, 'edit'])->name('laporan-dinas.edit');
        Route::put('/{id}', [LaporanDinasController::class, 'update'])->name('laporan-dinas.update');
        Route::delete('/{id}', [LaporanDinasController::class, 'destroy'])->name('laporan-dinas.destroy');
    });
});

Route::get('provinces', [DependentDropdownController::class, 'provinces'])->name('provinces');
Route::get('cities', [DependentDropdownController::class, 'cities'])->name('cities');
Route::get('districts', [DependentDropdownController::class, 'districts'])->name('districts');
Route::get('villages', [DependentDropdownController::class, 'villages'])->name('villages');
