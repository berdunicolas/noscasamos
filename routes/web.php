<?php

use App\Enums\ModuleTypeEnum;
use App\Http\Controllers\Admin\Invitation\InvitationController;
use App\Http\Controllers\Admin\Seller\SellerController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\User\RegisteredUserController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Middleware\EnsureCorrectAuthModel;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::domain('{account}.'. config('app.url'))->group(function () {
    Route::get('/', function ($account) {
        return "Bienvenido al sitio de $account";
    });
});

Route::middleware('auth', EnsureCorrectAuthModel::class.':web')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/users', [RegisteredUserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}/edit', [RegisteredUserController::class, 'edit'])->name('users.edit');
    Route::get('/users/{user}', [RegisteredUserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}', [RegisteredUserController::class, 'update'])->name('users.update');
    Route::get('/sellers', [SellerController::class, 'index'])->name('sellers.index');
    Route::get('/sellers/{seller}/edit', [SellerController::class, 'edit'])->name('sellers.edit');
    Route::post('/sellers/{seller}', [SellerController::class, 'update'])->name('sellers.update');
    Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations.index');
    Route::get('/invitations/{invitation}/edit', [InvitationController::class, 'edit'])->name('invitations.edit');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/invitations', [SettingsController::class, 'invitationsStore'])->name('settings.invitations.store');
});


Route::get('/{invitation:path_name}', [GuestController::class, 'index'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation');
Route::get('/{invitation:path_name}/invitados/login', [GuestController::class, 'loginForm'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests.login');
Route::post('/{invitation:path_name}/invitados/login', [GuestController::class, 'login'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests.login');

Route::middleware('auth', EnsureCorrectAuthModel::class.':guests')->group(function () {
    Route::get('/{invitation:path_name}/invitados', [GuestController::class, 'guest'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests');
});

require __DIR__.'/auth.php';
