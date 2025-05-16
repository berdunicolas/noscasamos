<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Invitation $invitation) {

        if ($invitation->isExpired() || $invitation->isExpired() === null) {
            abort(404);
        }

        return view('invitations.invitation', [
            'invitation' => $invitation,
        ]);
    }

    public function loginForm(Invitation $invitation) {

        if ($invitation->isExpired() || $invitation->isExpired() === null) {
            abort(404);
        }

        return view('invitations.guests-panel-login', [
            'invitation' => $invitation,
        ]);
    }

    public function login(Invitation $invitation, Request $request) {
        if ($invitation->isExpired() || $invitation->isExpired() === null) {
            abort(404);
        }
    }

    public function guest() {
        return "hola mundo";
    }
}
