<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestLoginRequest;
use App\Http\Requests\StoreGuestRequest;
use App\Models\Guest;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{
    public function index(Invitation $invitation) {

        if ($invitation->stillValid() || $invitation->stillValid() === null) {
            Log::info('Invitación ' . $invitation->path_name . ' con no vigente o sin fecha');
            abort(404);
        }
        
        if(!$invitation->active) {
            Log::info('Invitación ' . $invitation->path_name . ' no activa');
            abort(404);
        }

        $invitation->load(['modules' => fn ($q) => $q->where('active', 1)->orderBy('index')]);

        return view('invitations.invitation', [
            'invitation' => $invitation,
        ]);
    }

    public function store(Invitation $invitation, StoreGuestRequest $request) {

        if ($invitation->stillValid() || $invitation->stillValid() === null) {
            abort(404);
        }
        $data = $request->validated();

        Guest::create([
            'invitation_id' => $invitation->id,
            'nombre' => $data['nombre'] ?? '',
            'asiste' => $data['asiste'] ?? '',
            'nombre_a' => $data['nombre_a'] ?? '',
            'alimento' => $data['alimento'] ?? '',
            'mail' => $data['mail'] ?? '',
            'telefono' => $data['telefono'] ?? '',
            'traslado' => $data['traslado'] ?? '',
            'comentarios' => $data['comentarios'] ?? '',
        ]);

        return response()->json(['message' => 'Guest created successfully'], Response::HTTP_CREATED);
    }

    public function guest(Invitation $invitation) {
        if ($invitation->stillValid() || $invitation->stillValid() === null) {
            abort(404);
        }

        $con = Guest::where('invitation_id', $invitation->id)->orderBy('created_at', 'desc')->get();
        $con2 = Guest::where('invitation_id', $invitation->id)->where('asiste', 'si')->get();
        $con3 = Guest::where('invitation_id', $invitation->id)->where('asiste', 'no')->get();
        
        $total = $con->count();
        $asisten = $con2->count();
        $faltan = $con3->count();

        return view('invitations.guests-panel', [
            'invitation' => $invitation,
            'total' => $total,
            'asisten' => $asisten,
            'faltan' => $faltan,
            'con' => $con,
        ]);
    }



    public function loginForm(Invitation $invitation) {

        if ($invitation->stillValid() || $invitation->stillValid() === null) {
            abort(404);
        }

        return view('invitations.guests-panel-login', [
            'invitation' => $invitation,
        ]);
    }

    public function login(Invitation $invitation, GuestLoginRequest $request) {
        $data = $request->validated();
        
        if ($invitation->stillValid() || $invitation->stillValid() === null) {
            abort(404);
        }

        if (!Hash::check($data['password'], $invitation->password)) {
            return back()->withErrors([
                'password' => 'La contraseña es incorrecta.',
            ]);
        }

        Auth::guard('guests')->attempt(['path_name' => $invitation->path_name, 'password' => $data['password']]);
        //Auth::guard('guests')->login($invitation);

        return redirect()->route('invitation.guests', ['invitation' => $invitation->path_name]);
    }

    public function logout(Request $request) {
        Auth::guard('guests')->logout();
/*
        $request->session()->invalidate();

        $request->session()->regenerateToken();*/

        return redirect()->route('invitation.guests.login', ['invitation' => $request->route('invitation')]);
    }
    
}
