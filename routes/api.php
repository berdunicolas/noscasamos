<?php

use App\Http\Controllers\Api\InvitationApiController;
use App\Http\Controllers\Api\MetricsApiController;
use App\Http\Controllers\Api\SellerApiController;
use App\Http\Controllers\Api\SettingApiController;
use App\Http\Controllers\Api\TemplateApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\InvitationModuleApiController;
use App\Http\Controllers\TemplateModuleApiController;
use App\Http\Middleware\EnsureCorrectAuthModel;
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
    Route::post('sellers/{seller}', [SellerApiController::class, 'update'])->name('sellers.update');
    Route::resource('invitations', InvitationApiController::class)->only(['index', 'store', 'show', 'destroy']);
    Route::middleware('role:ADMIN')->resource('invitations', InvitationApiController::class)->only(['destroy']);
    Route::post('invitations/store-by_event', [InvitationApiController::class, 'storeByEvent'])->name('invitations.store-by-event');
    Route::patch('invitations/{invitation}/set-config', [InvitationApiController::class, 'setConfig'])->name('invitations.set-config');
    Route::patch('invitations/{invitation}/set-style', [InvitationApiController::class, 'setStyle'])->name('invitations.set-style');
    Route::patch('invitations/{invitation}/change-status', [InvitationApiController::class, 'changeStatus'])->name('invitations.change-status');
    Route::post('invitations/{invitation}/clone', [InvitationApiController::class, 'clone'])->name('invitations.clone');
    Route::patch('invitations/{invitation}/enable-guest-token', [InvitationApiController::class, 'enableGuestToken'])->name('invitations.enable-guest-token');

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

    Route::get('invitations/{invitation}/modules', [InvitationModuleApiController::class, 'getInvitationModules'])->name('invitation.modules');
    Route::patch('invitations/{invitation}/modules/change-order', [InvitationModuleApiController::class, 'changeModulesOrder'])->name('invitation.modules.change-order');
    Route::patch('invitations/{invitation}/modules/{module}/change-status', [InvitationModuleApiController::class, 'changeModuleStatus'])->name('invitation.modules.change-status');
    Route::patch('invitations/{invitation}/modules/{module}', [InvitationModuleApiController::class, 'updateModule'])->name('invitation.modules.update');
    Route::get('invitations/{invitation}/modules/available-modules', [InvitationModuleApiController::class, 'availableModules'])->name('invitation.available-modules');
    Route::delete('invitations/{invitation}/modules/{module}/delete-module', [InvitationModuleApiController::class, 'deleteModule'])->name('invitation.delete-module');
    Route::post('invitations/{invitation}/modules/add-module', [InvitationModuleApiController::class, 'addModule'])->name('invitation.add-module');

    Route::resource('templates', TemplateApiController::class)->only(['index', 'store', 'show', 'update', 'destroy']);
    Route::get('templates/{template}/modules', [TemplateModuleApiController::class, 'getTemplateModules'])->name('template.modules');
    Route::patch('templates/{template}/modules/change-order', [TemplateModuleApiController::class, 'changeModulesOrder'])->name('template.modules.change-order');
    Route::patch('templates/{template}/modules/{module}/change-status', [TemplateModuleApiController::class, 'changeModuleStatus'])->name('template.modules.change-status');
    Route::patch('templates/{template}/modules/{module}', [TemplateModuleApiController::class, 'updateModule'])->name('template.modules.update');
    Route::get('templates/{template}/modules/available-modules', [TemplateModuleApiController::class, 'availableModules'])->name('template.available-modules');
    Route::delete('templates/{template}/modules/{module}/delete-module', [TemplateModuleApiController::class, 'deleteModule'])->name('template.delete-module');
    Route::post('templates/{template}/modules/add-module', [TemplateModuleApiController::class, 'addModule'])->name('template.add-module');
    
    Route::get('metrics/created-invitations-graph', [MetricsApiController::class, 'createdInvitationsGraph'])->name('created-invitations-graph');
    Route::get('metrics/total-invitations-graph', [MetricsApiController::class, 'totalInvitationsGraph'])->name('total-invitations-graph');
    Route::get('metrics/country-invitations-graph', [MetricsApiController::class, 'countryInvitationsGraph'])->name('country-invitations-graph');
    Route::get('metrics/active-invitations-graph', [MetricsApiController::class, 'activeInvitationsGraph'])->name('active-invitations-graph');

    Route::post('settings/set-invitations-settings', [SettingApiController::class, 'setInvitationsSettings'])->name('settings.set-invitations-settings');
    Route::post('settings/colors', [SettingApiController::class, 'addColor'])->name('settings.colors.store');
    Route::delete('settings/colors/{color}', [SettingApiController::class, 'deleteColor'])->name('settings.colors.destroy');
    Route::post('settings/icons', [SettingApiController::class, 'addIcon'])->name('settings.icons.store');
    Route::delete('settings/icons/{icon}', [SettingApiController::class, 'deleteIcon'])->name('settings.icons.destroy');
    Route::post('settings/fonts', [SettingApiController::class, 'addFont'])->name('settings.fonts.store');
    Route::delete('settings/fonts/{font}', [SettingApiController::class, 'deleteFont'])->name('settings.fonts.destroy');
});

Route::middleware(EnsureCorrectAuthModel::class.':guests')->delete('{invitation:path_name}/invitados/{guest}', [GuestController::class, 'destroy'])->name('api.guests.delete');
Route::post('/{invitation:path_name}/confirm-invitation', [GuestController::class, 'store'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('api.invitation.store');

Route::get('/country-divisions/{code?}', function ($code = null) {
    $divisions = \App\Models\CountryDivision::select('id', 'state_name')->where('country_code', $code)->get();

    return response()->json([
        'data' => $divisions
    ], 200);
})->name('api.countries-divisions');