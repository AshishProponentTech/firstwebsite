<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordResetController;
use App\Http\Controllers\Admin\CourseController;
use App\Models\CoursePage;

Route::get('/', function () {
    return view('home');
})->name('homepage');

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return auth()->check()
            ? redirect()->route('admin.dashboard')
            : redirect()->route('admin.login');
    });

    // Login/logout
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // Password reset
    Route::get('/password/reset', [PasswordResetController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('/password/email', [PasswordResetController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('/password/reset/{token}', [PasswordResetController::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/password/reset', [PasswordResetController::class, 'reset'])->name('admin.password.update');

    // Dashboard + Course Management (protected)
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Course CRUD
        Route::get('/add-course', [CourseController::class, 'create'])->name('admin.add-course');
        Route::post('/add-course', [CourseController::class, 'store'])->name('admin.add-course.store');
        Route::get('/course-pages', [CourseController::class, 'index'])->name('admin.course-pages.index');
        Route::get('/course-page/{page}/edit', [CourseController::class, 'edit'])->name('admin.course-page.edit');
        Route::put('/course-page/{page}', [CourseController::class, 'update'])->name('admin.course-page.update');
        Route::delete('/course-page/{page}', [CourseController::class, 'destroy'])->name('admin.course-page.destroy');
    });
      Route::fallback(function () {
            return redirect()->route('admin.login');
        });
});

// to view the dynamically created view page

Route::get('/{slug}', function ($slug) {
    $page = CoursePage::where('slug', $slug)->firstOrFail();
    $viewPath = "courses.{$page->slug}";
    if (!view()->exists($viewPath)) {
        abort(404, 'Course page not found.');
    }
    return view($viewPath, ['page' => $page]);
})->name('course.page');

