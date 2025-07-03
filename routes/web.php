<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

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
Route::pattern('id', '[0-9]+');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/', [WelcomeController::class, 'index']);

    // Semua role bisa akses halaman index, show, dsb (kecuali create/tambah/ajak)
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [UserController::class, 'index']);
        Route::post('/list', [UserController::class, 'list']);
        Route::get('/{id}', [UserController::class, 'show']);
        Route::get('/{id}/edit', [UserController::class, 'edit']);
        Route::put('/{id}', [UserController::class, 'update']);
        Route::put('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
        Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
        Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
        Route::get('/barang/import', [UserController::class, 'import']);
        Route::post('/barang/import_ajax', [UserController::class, 'import_ajax']);
        Route::get('/barang/export_excel', [UserController::class, 'export_excel']);
        Route::get('/barang/export_pdf', [UserController::class, 'export_pdf']);
        Route::delete('/{id}', [UserController::class, 'destroy']);
    });

    // Hanya ADM yang bisa create/tambah/ajak user
    Route::middleware('authorize:ADM')->group(function(){
        Route::group(['prefix' => 'user'], function () {
            Route::get('/create', [UserController::class, 'create']);
            Route::post('/', [UserController::class, 'store']);
            Route::get('/create_ajax', [UserController::class, 'create_ajax']);
            Route::post('/ajax', [UserController::class, 'store_ajax']);
        });
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']);
            Route::post('/list', [LevelController::class, 'list']);
            Route::get('/create', [LevelController::class, 'create']);
            Route::post('/', [LevelController::class, 'store']);
            Route::get('/{id}', [LevelController::class, 'show']);
            Route::get('/{id}/edit', [LevelController::class, 'edit']);
            Route::put('/{id}', [LevelController::class, 'update']);
            Route::delete('/{id}', [LevelController::class, 'destroy']);
        });
    });

    // Contoh: hanya MNG
    Route::middleware('authorize:MNG')->group(function(){
        Route::get('/kategori', [KategoriController::class, 'index']);
    });
    // Contoh: hanya STF
    Route::middleware('authorize:STF')->group(function(){
        // Route khusus staf
    });
    // Contoh: hanya KSR
    Route::middleware('authorize:KSR')->group(function(){
        // Route khusus kasir
    });
});

