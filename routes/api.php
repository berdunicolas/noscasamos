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
    Route::patch('invitations/{invitation}/set-config', [InvitationApiController::class, 'setConfig'])->name('invitations.set-config');
    Route::patch('invitations/{invitation}/set-style', [InvitationApiController::class, 'setStyle'])->name('invitations.set-style');
    Route::patch('invitations/{invitation}/change-status', [InvitationApiController::class, 'changeStatus'])->name('invitations.change-status');
    Route::get('invitations/{invitation}/clone', [InvitationApiController::class, 'clone'])->name('invitations.clone');

    Route::get('validate-invitation/{path_name}', function($path_name){
        $invitation = \App\Models\Invitation::select('path_name')->where('path_name', $path_name)->count();
        if ($invitation > 0) {
            return response()->json([
                'message' => 'El nombre de la invitación ya existe',
                'status' => false
            ], 200);
        } else {
            return response()->json([
                'message' => 'El nombre de la invitación está disponible',
                'status' => true
            ], 200);
        }
    });
});

Route::get('/country-divisions/{code}', function ($code) {
    $divisions = \App\Models\CountryDivision::select('id', 'state_name')->where('country_code', $code)->get();

    return response()->json([
        'data' => $divisions
    ], 200);
})->name('api.countries-divisions');