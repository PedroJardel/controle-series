<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\Authenticator;
use App\Mail\SeriesCreated;
use App\Models\Series;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/series');
});

Route::middleware(Authenticator::class)->group(function () {
    Route::resource('/series', SeriesController::class)
        ->except(['show']);

    Route::resource('/series/{series}/seasons', SeasonsController::class)->only(['index']);
    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'update'])->name('episodes.update');
});

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signin');
Route::resource('/users', UsersController::class)->only('create', 'store');