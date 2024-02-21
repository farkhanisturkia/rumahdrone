<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\DeliveryController;

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

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware('auth')->name('inventaris.')->group(function () {
        Route::get('/inventaris', [InventarisController::class, 'index'])->name('index'); 
    });

    Route::middleware('auth')->name('stok.')->group(function () {
        Route::get('/stok', [StokController::class, 'index'])->name('index'); 
    });

    Route::middleware(['auth','admin'])->name('admin.')->group(function () {
        Route::name('inventaris.')->group(function () {
            Route::post('/inventaris', [InventarisController::class, 'store'])->name('store');
            Route::get('/inventaris/{inventaris}', [InventarisController::class, 'edit'])->name('edit');
            Route::put('/{inventaris}/inventaris', [InventarisController::class, 'update'])->name('update');
            Route::delete('/{inventaris}', [InventarisController::class, 'destroy'])->name('destroy'); 
        });
        Route::name('stok.')->group(function () {
            Route::post('/stok', [StokController::class, 'store'])->name('store');
            Route::get('/enter/{stok}', [StokController::class, 'enter'])->name('enter');
            Route::post('/enterstore/{stok}', [StokController::class, 'enterstore'])->name('enterstore');
            Route::get('/release/{stok}', [StokController::class, 'release'])->name('release');
            Route::post('/releasestore/{stok}', [StokController::class, 'releasestore'])->name('releasestore');
            Route::get('/stok/{stok}', [StokController::class, 'edit'])->name('edit');
            Route::put('/{stok}/stok', [StokController::class, 'update'])->name('update');
            Route::delete('/stok/{stok}', [StokController::class, 'destroy'])->name('destroy');
        });
        Route::name('laporan.')->group(function () {
            Route::get('/laporan', [LaporanController::class, 'index'])->name('index'); 
        });
    });

    Route::middleware(['auth','staf'])->name('staf.')->group(function () {
        Route::name('delivery.')->group(function () {
            Route::get('/delivery', [DeliveryController::class, 'index'])->name('index'); 
            Route::post('/delivery', [DeliveryController::class, 'store'])->name('store');
            Route::get('/delivery/{delivery}', [DeliveryController::class, 'edit'])->name('edit');
            Route::put('/{delivery}/delivery', [DeliveryController::class, 'update'])->name('update');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';
});
