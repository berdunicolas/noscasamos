<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="h-100 d-flex">
        <nav class="navbar">
            <div class="navbar-logo">
                <img src="{{asset('miscellaneous/Marca-Nos-Casamos.svg')}}" alt="noscasamos logo">
            </div>
            <ul class="nav navbar-nav flex-column pt-2 font-size-2">
                <li class="nav-item selected">
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
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link text-dark btn btn-light rounded-0">
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
            <h1>Dashboard</h1>
            <p>Resumen de cantidad de invitaciones Activas / Inactivas</p>
            <p>Acceso directo a crear nueva invitación</p>
        </main>
    </div>
</body>
</html>