<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/events', [EventController::class, 'index']);
Route::get('/registrations', [RegistrationController::class, 'index']);
Route::get('/registrations/{registration}', [RegistrationController::class, 'show'])
    ->middleware('can:view,registration');
Route::post('/registrations', [RegistrationController::class, 'store']);
Route::put('/registrations/{registration}', [RegistrationController::class, 'update'])
    ->middleware('can:update,registration');