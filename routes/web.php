<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\petaniController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StokPupukPestisidaController;
use App\Http\Controllers\UserPetaniController;
use Faker\Guesser\Name;

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

Route::get('/', [BerandaController::class, 'index'])->name('welcome');
Route::get('detail', [BerandaController::class, 'detail'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/data-tanaman', [AdminController::class, 'tanamanIndex'])->name('data-tanaman');
    Route::post('admin/data-tanaman', [AdminController::class, 'tanamanStore'])->name('data-tanaman.store');
    Route::put('admin/data-tanaman/{id}', [AdminController::class, 'tanamanUpdate'])->name('data-tanaman.update');
    Route::delete('admin/data-tanaman/{id}', [AdminController::class, 'tanamanDelete'])->name('data-tanaman.destroy');
    Route::get('data-tanaman/detail', [AdminController::class, 'detailTanaman'])->name('detail-tanaman');

    Route::get('admin/data-pupuk', [AdminController::class, 'pupuk'])->name('data-pupuk');
    Route::post('admin/data-pupuk', [AdminController::class, 'pupukStore'])->name('data-pupuk.store');
    Route::delete('admin/data-pupuk/{id}', [AdminController::class, 'pupukDelete'])->name('data-pupuk.destroy');

    Route::get('admin/data-pestisida', [AdminController::class, 'pestisida'])->name('data-pestisida');
    Route::post('admin/data-pestisida', [AdminController::class, 'pestisidaStore'])->name('data-pestisida.store');
    Route::delete('admin/data-pestisida/{id}', [AdminController::class, 'pestisidaDelete'])->name('data-pestisida.destroy');
});

require __DIR__ . '/auth.php';
