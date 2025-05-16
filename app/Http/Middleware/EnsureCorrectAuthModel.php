<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCorrectAuthModel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $guard): Response
    {
        $user = auth($guard)->user();

        if (!$user) {
            
            if ($guard === 'guests') {
                // Obtené el parámetro 'invitation' de la URL
                $invitation = $request->route('invitation');

                return redirect()->route('invitation.guests.login', ['invitation' => $invitation]);
            }


            return response()->json(['error' => 'No autorizado'], 403);
        }

        return $next($request);
    
    }
    
}
