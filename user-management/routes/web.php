<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

// Routes tĩnh
// URL cố định, không thay đổi
// Không có tham số động trong URL
Route::get('/', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

// Routes động với {id}
// URL có chứa tham số biến đổi
// Sử dụng {} để định nghĩa tham số
// Tham số thay đổi theo từng request
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');


// Route::resource('courses', CourseController::class);