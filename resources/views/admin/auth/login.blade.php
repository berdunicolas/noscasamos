<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'NosCasamos') }} | Admin</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">        
        <script src="{{ asset('js/bootstrap/bootstrap.js') }}"></script>

    </head>
    <body class="bg-light d-flex justify-content-center align-items-center">
        <div class="d-flex flex-col pt-6 card border-0 shadow rounded-4" style="width: 25rem">
            <div class="bg-dark p-5 text-center rounded-top-4">                
                <img src="{{asset('miscellaneous/sec-logo.svg')}}" class="img-fluid" alt="noscasamos logo">
            </div>
            <div class="mx-5 mt-4 mb-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailImput" class="form-label">Correo</label>
                        <input type="email" name="email" class="form-control" id="emailImput" aria-describedby="emailHelp">
                        <ul class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">
                            @foreach ((array) $errors->get('email') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-3">
                        <label for="passwordImput" class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" id="passwordImput">
                        <ul class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">
                            @foreach ((array) $errors->get('password') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4 form-check">
                      <input type="checkbox" name="remember" class="form-check-input" id="check">
                      <label class="form-check-label" for="check">Recordar sesión</label>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="mb-1 btn btn-outline-dark w-75">Iniciar sesión</button>
                    </div>
                    <div class="mt-3 text-end">
                        <a class="link-dark" href="{{-- route('password.request') --}}">
                            Olvide mi contraseña
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
