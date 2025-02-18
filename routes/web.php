<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::controller(ResidentController::class)->group(function () {
        Route::get('/resident-records', 'index')->name('dashboard.resident-records');
        Route::get('/resident-records/{resident}/edit', 'edit')->name('resident.edit');
        Route::post('/resident-records', 'store')->name('resident.store');
        Route::put('/resident-records/{resident}', 'update')->name('resident.update');
        Route::delete('/resident-records/{resident}', 'delete')->name('resident.delete');
    });



    Route::get('/', fn() => view('dashboard.dashboard'))->name('dashboard');
    Route::get('/news', fn() => view('dashboard.news'))->name('dashboard.news');
    Route::get('/agendas', fn() => view('dashboard.agendas'))->name('dashboard.agendas');
    Route::get('/guest-book', fn() => view('dashboard.guest-book'))->name('dashboard.guest-book');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
