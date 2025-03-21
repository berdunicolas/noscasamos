<nav class="navbar">
    <div class="navbar-logo">
        <img src="{{asset('miscellaneous/Marca-Nos-Casamos.svg')}}" alt="noscasamos logo">
    </div>
    <ul class="nav navbar-nav flex-column pt-2 font-size-2">
        <li class="nav-item {{ ($selected == 'dashboard') ? 'selected' : '' }}">
            <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-light rounded-0">
                <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'invitations') ? 'selected' : '' }}">
            <a href="" class="nav-link text-dark btn btn-light rounded-0">
                <span>Invitaciones</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'statistics') ? 'selected' : '' }}">
            <a href="" class="nav-link text-dark btn btn-light rounded-0">
                <span>Estadisticas</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'users') ? 'selected' : '' }}">
            <a href="{{route('users.index')}}" class="nav-link text-dark btn btn-light rounded-0">
                <span>Usuarios</span>
            </a>
        </li>
    </ul>
    <ul class="nav navbar-nav flex-column mt-auto mb-4 font-size-2">
        <li class="nav-item {{ ($selected == 'sellers') ? 'selected' : '' }}">
            <a href="" class="nav-link text-dark btn btn-light rounded-0">
                <span>Sellers</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'settings') ? 'selected' : '' }}">
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