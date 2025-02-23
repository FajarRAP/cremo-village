<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestBookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResidentController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::prefix('/dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::controller(ResidentController::class)->group(function () {
        Route::get('/resident-records', 'index')->name('dashboard.resident-records');
        Route::get('/resident-records/{resident}/edit', 'edit')->name('resident.edit');
        Route::post('/resident-records', 'store')->name('resident.store');
        Route::put('/resident-records/{resident}', 'update')->name('resident.update');
        Route::delete('/resident-records/{resident}', 'destroy')->name('resident.destroy');
    });

    Route::controller(GuestBookController::class)->group(function () {
        Route::get('/guest-book', 'index')->name('dashboard.guest-book');
        Route::get('/guest-book/{guestbook}/edit', 'edit')->name('guest-book.edit');
        Route::post('/guest-book', 'store')->name('guest-book.store');
        Route::put('/guest-book/{guestbook}', 'update')->name('guest-book.update');
        Route::delete('/guest-book/{guestbook}', 'destroy')->name('guest-book.destroy');
    });

    Route::controller(AgendaController::class)->group(function () {
        Route::get('/agenda', 'index')->name('dashboard.agendas');
        Route::get('/agenda/{agenda}/edit', 'edit')->name('agenda.edit');
        Route::post('/agenda', 'store')->name('agenda.store');
        Route::put('/agenda/{agenda}', 'update')->name('agenda.update');
        Route::delete('/agenda/{agenda}', 'destroy')->name('agenda.destroy');
    });

    Route::get('/news', fn() => view('dashboard.news'))->name('dashboard.news');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
