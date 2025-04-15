<?php

use App\Http\Controllers\Admin\Invitation\InvitationController;
use App\Http\Controllers\Admin\User\RegisteredUserController;
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


Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/users', [RegisteredUserController::class, 'index'])->name('users.index');
    Route::get('/invitations', [InvitationController::class, 'index'])->name('invitations.index');
    Route::get('/invitations/{invitation}/edit', [InvitationController::class, 'edit'])->name('invitations.edit');
});


Route::get('/inspinia/footable', function () {
    return view('inspinia.footable');
});


Route::get('/{invitation:path_name}', function (Invitation $invitation) {
    return view('invitation-template', ['invitation', $invitation]);
})->where('invitation', '^(?!login$|logout$)[a-zA-Z0-9_-]+');;

require __DIR__.'/auth.php';
