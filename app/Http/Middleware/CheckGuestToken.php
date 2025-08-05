<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGuestToken
{
    public function handle(Request $request, Closure $next): Response
    {
        $invitation = $request->route('invitation');

        // Si no requiere token, continuar
        if (!$invitation->enable_guest_token) {
            return $next($request);
        }

        // Si tiene la cookie válida, continuar
        $cookieKey = 'guest_token_' . $invitation->id;
        if ($request->cookie($cookieKey) === $invitation->guest_token) {
            return $next($request);
        }

        // Redirigir al formulario de token
        return redirect()->route('guest-token.form', ['invitation' => $invitation->path_name]);
    }
}
