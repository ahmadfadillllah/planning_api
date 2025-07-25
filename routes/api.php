<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\KLKHFuelStationController;
use App\Http\Controllers\ShiftController;
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
    Route::get('/klkh/fuel-station/preview/{id}', [KLKHFuelStationController::class, 'preview']);
    Route::get('/klkh/fuel-station/download/{id}', [KLKHFuelStationController::class, 'download']);
    Route::get('/klkh/fuel-station/verified/all/{id}', [KLKHFuelStationController::class, 'verifiedAll']);
    Route::get('/klkh/fuel-station/verified/pengawas/{id}', [KLKHFuelStationController::class, 'verifiedPengawas']);
    Route::get('/klkh/fuel-station/verified/diketahui/{id}', [KLKHFuelStationController::class, 'verifiedDiketahui']);

    //User Diketahui
    Route::get('/users/diketahui', [UserDiketahuiController::class, 'index']);

    //Absensi
    Route::get('/absensi', [AbsensiController::class, 'index']);

    //Banner
    Route::get('/banner', [BannerController::class, 'index']);

    //Area
    Route::get('/area', [AreaController::class, 'index']);

    //Shift
    Route::get('/shift', [ShiftController::class, 'index']);

    //Activity
    Route::get('/activity/summary', [ActivityController::class, 'summary']);
    Route::get('/activity/all', [ActivityController::class, 'all']);
});
