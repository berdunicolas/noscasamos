<?php

use App\Http\Controllers\Admin\Invitation\InvitationController;
use App\Http\Controllers\Admin\MetricsController;
use App\Http\Controllers\Admin\Seller\SellerController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\User\RegisteredUserController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Middleware\EnsureCorrectAuthModel;
use App\Models\Invitation;
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

if(config('app.env') == 'production') {

    Route::domain(config('app.subdomain_url'))->group(function () {
    
        Route::middleware('auth', EnsureCorrectAuthModel::class.':web')->group(function () {
            Route::get('/', function () {
                $years = Invitation::select(DB::raw("DATE_FORMAT(date, '%Y') as year"))
                    ->where('date', '!=', null)
                    ->groupBy('year')
                    ->orderBy('year', 'desc')
                    ->get();

                return view('admin.dashboard', [
                    'years' => $years
                ]);
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
            Route::get('/metrics', [MetricsController::class, 'index'])->name('metrics.index');
            Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
            Route::post('/settings/invitations', [SettingsController::class, 'invitationsStore'])->name('settings.invitations.store');
        });
    });

} else {
    Route::middleware('auth', EnsureCorrectAuthModel::class.':web')->group(function () {
        Route::get('/', function () {
            $years = Invitation::select(DB::raw("DATE_FORMAT(date, '%Y') as year"))
                ->where('date', '!=', null)
                ->groupBy('year')
                ->orderBy('year', 'desc')
                ->get();

            return view('admin.dashboard', [
                'years' => $years
            ]);
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
        Route::get('/metrics', [MetricsController::class, 'index'])->name('metrics.index');
        Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('/settings/invitations', [SettingsController::class, 'invitationsStore'])->name('settings.invitations.store');
    });
}

if(config('app.env') == 'production') {

    Route::domain(config('app.url'))->group(function () {
        Route::get('/{invitation:path_name}', [GuestController::class, 'index'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation');
        Route::get('/{invitation:path_name}/invitados/login', [GuestController::class, 'loginForm'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests.login');
        Route::post('/{invitation:path_name}/invitados/login', [GuestController::class, 'login'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests.login');
        
        
        Route::middleware('auth', EnsureCorrectAuthModel::class.':guests')->group(function () {
            Route::get('/{invitation:path_name}/invitados', [GuestController::class, 'guest'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests');
            Route::post('/{invitation:path_name}/invitados/logout', [GuestController::class, 'logout'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.logout');
        });
    });

} else {
    Route::get('/{invitation:path_name}', [GuestController::class, 'index'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation');
    Route::get('/{invitation:path_name}/invitados/login', [GuestController::class, 'loginForm'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests.login');
    Route::post('/{invitation:path_name}/invitados/login', [GuestController::class, 'login'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests.login');
    
    
    Route::middleware('auth', EnsureCorrectAuthModel::class.':guests')->group(function () {
        Route::get('/{invitation:path_name}/invitados', [GuestController::class, 'guest'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.guests');
        Route::post('/{invitation:path_name}/invitados/logout', [GuestController::class, 'logout'])->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+')->name('invitation.logout');
    });
}




require __DIR__.'/auth.php';
