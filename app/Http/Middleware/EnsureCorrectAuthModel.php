<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate;

class EnsureCorrectAuthModel extends Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        return $next($request);
    }


    protected function unauthenticated($request, array $guards)
    {
        if (in_array('guests', $guards)) {
            $invitation = $request->route('invitation');

            throw new AuthenticationException(
                'Unauthenticated.', $guards, route('invitation.guests.login', ['invitation' => $invitation])
            );
        }elseif(in_array('web', $guards)){

            throw new AuthenticationException(
                'Unauthenticated.', $guards, $this->redirectTo($request)
            );
        }
    }
}
