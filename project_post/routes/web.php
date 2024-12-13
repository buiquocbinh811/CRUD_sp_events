<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//Medicines
// Route::get('/medicines', [MedicinesController::class, 'index'])->name('medicines.index');
// Route::get('/medicines/create', [MedicinesController::class, 'create'])->name('medicines.create');
// Route::post('/medicines', [MedicinesController::class, 'store'])->name('medicines.store');
// Route::get('/medicines/{id}', [MedicinesController::class, 'show'])->name('medicines.show');
// Route::get('/medicines/{id}/edit', [MedicinesController::class, 'edit'])->name('medicines.edit');
// Route::put('/medicines/{id}', [MedicinesController::class, 'update'])->name('medicines.update');
// Route::delete('/medicines/{id}', [MedicinesController::class, 'destroy'])->name('medicines.destroy');

// Sales

