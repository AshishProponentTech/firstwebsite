<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseAboutController;

Route::prefix('admin')->middleware('web')->group(function () {
    // Create
    Route::get('/course-about/create', [CourseAboutController::class, 'create'])->name('admin.course-about.create');
    Route::post('/course-about', [CourseAboutController::class, 'store'])->name('admin.course-about.store');

    // List
    Route::get('/course-about', [CourseAboutController::class, 'index'])->name('admin.course-about.index');

    // Edit / Update
    Route::get('/course-about/{id}/edit', [CourseAboutController::class, 'edit'])->name('admin.course-about.edit');
    Route::put('/course-about/{id}', [CourseAboutController::class, 'update'])->name('admin.course-about.update');

    // Delete
    Route::delete('/course-about/{id}', [CourseAboutController::class, 'destroy'])->name('admin.course-about.destroy');
});
