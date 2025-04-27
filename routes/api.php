<?php

use App\Http\Controllers\Api\EpisodesController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\SeasonsController;
use App\Http\Controllers\Api\SeriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/series', SeriesController::class);
    Route::get('/series/{series}/seasons', [SeasonsController::class, 'index']);
    Route::get('/series/{series}/episodes', [EpisodesController::class, 'index']);
    Route::patch('/episodes/{episode}', [EpisodesController::class, 'watched']);
});
Route::post('/login', [LoginController::class, 'authentication']);
