<?php

use App\Http\Controllers\ProfileController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;

Route::apiResource('clients', ClientController::class, ['only' => ['index', 'store']]);

Route::apiResource('freelancers', FreelancerController::class, ['only' => ['index', 'store']]);
Route::apiResource('jobs', JobController::class, ['only' => ['index', 'store']]);;
Route::apiResource('proposals', ProposalController::class);
Route::apiResource('payments', PaymentController::class);
Route::apiResource('ratings', RatingController::class, ['only' => ['index', 'store']]);;
Route::apiResource('notifications', NotificationController::class);
Route::apiResource('admins', AdminController::class);


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::middleware('role:Client')->group(function () {
        Route::get('client/dashboard', [ClientController::class, 'dashboard']);
    });

    Route::middleware('role:Freelancer')->group(function () {
        Route::get('freelancer/dashboard', [FreelancerController::class, 'dashboard']);
    });

    Route::get('/profiles/{id}', [ProfileController::class, 'show']);
    Route::post('/profiles', [ProfileController::class, 'store']);
    Route::put('/profiles/{id}', [ProfileController::class, 'update']);
    Route::delete('/profiles/{id}', [ProfileController::class, 'destroy']);
});