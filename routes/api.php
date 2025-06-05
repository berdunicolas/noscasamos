<?php

use App\Http\Controllers\Api\InvitationApiController;
use App\Http\Controllers\Api\MetricsApiController;
use App\Http\Controllers\Api\SellerApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\InvitationModuleApiController;
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
    Route::resource('sellers', SellerApiController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::resource('invitations', InvitationApiController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::patch('invitations/{invitation}/set-config', [InvitationApiController::class, 'setConfig'])->name('invitations.set-config');
    Route::patch('invitations/{invitation}/set-style', [InvitationApiController::class, 'setStyle'])->name('invitations.set-style');
    Route::patch('invitations/{invitation}/change-status', [InvitationApiController::class, 'changeStatus'])->name('invitations.change-status');
    Route::get('invitations/{invitation}/clone', [InvitationApiController::class, 'clone'])->name('invitations.clone');

    Route::get('validate-invitation/{path_name?}', function($path_name = null){
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
    })->name('validate-invitation');

    Route::get('intivations/{invitation}/modules', [InvitationModuleApiController::class, 'getInvitationModules'])->name('invitation.modules');
    Route::patch('intivations/{invitation}/modules/change-order', [InvitationModuleApiController::class, 'changeModolesOrder'])->name('invitation.modules.change-order');
    Route::patch('intivations/{invitation}/modules/{module}/change-status/{displayName?}', [InvitationModuleApiController::class, 'changeModuleStatus'])->name('invitation.modules.change-order');
    Route::patch('invitations/{invitation}/modules/{module}/{displayName?}', [InvitationModuleApiController::class, 'updateModule'])->name('invitation.modules.update');
    Route::get('invitations/{invitation}/modules/available-modules', [InvitationModuleApiController::class, 'availableModules'])->name('invitation.available-modules');
    Route::delete('invitations/{invitation}/modules/{module}/delete-module/{displayName?}', [InvitationModuleApiController::class, 'deleteModule'])->name('invitation.delete-module');
    Route::post('invitations/{invitation}/modules/add-module', [InvitationModuleApiController::class, 'addModule'])->name('invitation.add-module');
    
    Route::get('metrics/created-invitations-graph', [MetricsApiController::class, 'createdInvitationsGraph'])->name('created-invitations-graph');
    Route::get('metrics/total-invitations-graph', [MetricsApiController::class, 'totalInvitationsGraph'])->name('total-invitations-graph');
    Route::get('metrics/country-invitations-graph', [MetricsApiController::class, 'countryInvitationsGraph'])->name('country-invitations-graph');
    Route::get('metrics/active-invitations-graph', [MetricsApiController::class, 'activeInvitationsGraph'])->name('active-invitations-graph');
});

Route::post('/{invitation:path_name}/confirm-invitation', [GuestController::class, 'store'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('api.invitation.store');

Route::get('/country-divisions/{code?}', function ($code = null) {
    $divisions = \App\Models\CountryDivision::select('id', 'state_name')->where('country_code', $code)->get();

    return response()->json([
        'data' => $divisions
    ], 200);
})->name('api.countries-divisions');