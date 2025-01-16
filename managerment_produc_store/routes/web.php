<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;

// Routes for Thuoc
Route::get('/', [PetController::class, 'index'])->name('pets.index');

Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');

Route::post('/pets', [PetController::class, 'store'])->name('pets.store');

Route::get('/pets/{id}', [PetController::class, 'show'])->name('pets.show');

Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pets.edit');

Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pets.update');

Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');