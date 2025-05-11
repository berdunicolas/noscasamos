<?php

use App\Enums\ModuleTypeEnum;
use App\Http\Controllers\Admin\Invitation\InvitationController;
use App\Http\Controllers\Admin\Seller\SellerController;
use App\Http\Controllers\Admin\Settings\SettingsController;
use App\Http\Controllers\Admin\User\RegisteredUserController;
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


Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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


Route::get('/inspinia/footable', function () {
    return view('inspinia.footable');
});

Route::get('/modules', function () {
    return view('modules');
});

Route::get('/dev', function () {
    return view('test');
});
Route::post('/dev', function (Request $request) {
    dd($request);
});



Route::get('/{invitation:path_name}', function (Invitation $invitation) {
/*
    $modules = [];

    foreach($invitation->modules as $module) {
        $modules[] = ModuleTypeEnum::getModuleComponent($module['name']);
    }
*/
    if ($invitation->isExpired()) {
        return response()->isNotFound(); // PROBAR
    }
    return view('invitations.invitation', ['invitation' => $invitation]);
})->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+');

require __DIR__.'/auth.php';
