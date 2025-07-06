<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KLKHFuelStationController;
use App\Http\Controllers\UserDiketahuiController;
use Illuminate\Support\Facades\Route;


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    //Auth logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    //KLKH Fuel Station
    Route::post('/klkh/fuel-station', [KLKHFuelStationController::class, 'store']);
    Route::get('/klkh/fuel-station', [KLKHFuelStationController::class, 'index']);
    Route::put('/klkh/fuel-station/{id}', [KLKHFuelStationController::class, 'update']);
    Route::delete('/klkh/fuel-station/{id}', [KLKHFuelStationController::class, 'destroy']);

    //User Diketahui
    Route::get('/users/diketahui', [UserDiketahuiController::class, 'index']);
});
