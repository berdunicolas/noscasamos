<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="h-100 d-flex">
        <nav class="navbar">
            <div class="navbar-logo">
                <img src="{{asset('miscellaneous/Marca-Nos-Casamos.svg')}}" alt="noscasamos logo">
            </div>
            <ul class="nav navbar-nav flex-column pt-2 font-size-2">
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-light rounded-0">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-light rounded-0">
                        <span>Invitaciones</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-light rounded-0">
                        <span>Estadisticas</span>
                    </a>
                </li>
                <li class="nav-item selected">
                    <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-light rounded-0">
                        <span>Usuarios</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav flex-column mt-auto mb-4 font-size-2">
                <li class="nav-item">
                    <a href="" class="nav-link text-dark btn btn-light rounded-0">
                        <span>Sellers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link text-dark btn btn-light rounded-0">
                        <span>Ajustes</span>
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button  class="nav-link text-dark btn btn-light rounded-0 w-100">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Salir</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
        <main class="content">
            <header class="">
                <h5 class="display-5 header-section">Usuarios</h5>
            </header>
            <div class="mt-5 container">
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark btn-lg rounded-1 font-size-1 font-bold my-2 ms-auto" data-bs-toggle="modal" data-bs-target="#create-product-modal">
                        Nuevo usuario
                    </button>
                </div>
                <div class="mt-1 rounded-1 p-3 shadow">
                    <table class="table table-hover table-sm table-borderless">
                        <thead class="">
                            <tr id="table-head">
                                <th scope="col" class="pb-3">#</th>
                                <th scope="col" class="pb-3">Nombre</th>
                                <th scope="col" class="pb-3">Correo</th>
                                <th scope="col" class="pb-3">Role</th>
                                <th scope="col" class="pb-3">Activo</th>
                                <th scope="col" class="pb-3">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->roles->first()->name}}</td>
                                    <td>{{($user->email_verified_at !== null) ? 'Activo' : 'No activo'}}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>