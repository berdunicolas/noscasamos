<?php

use App\Http\Controllers\Api\InvitationApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->name('api.')->group(function () {
    Route::resource('users', UserApiController::class)->only(['index', 'store', 'show']);
    Route::resource('invitations', InvitationApiController::class)->only(['index', 'store', 'show', 'destroy']);
});