<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThuocController;

// Routes for Thuoc
Route::get('/', [ThuocController::class, 'index'])->name('thuocs.index');

Route::get('/thuocs/create', [ThuocController::class, 'create'])->name('thuocs.create');

Route::post('/thuocs', [ThuocController::class, 'store'])->name('thuocs.store');

Route::get('/thuocs/{id}', [ThuocController::class, 'show'])->name('thuocs.show');

Route::get('/thuocs/edit/{id}', [ThuocController::class, 'edit'])->name('thuocs.edit');

Route::put('/thuocs/{id}', [ThuocController::class, 'update'])->name('thuocs.update');

Route::get('/thuocs/{id}/export', [ThuocController::class, 'export'])->name('thuocs.export');

Route::post('/thuocs/{id}/export', [ThuocController::class, 'exportStore'])->name('thuocs.export.store');