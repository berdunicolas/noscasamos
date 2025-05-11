<nav class="navbar navbar-bg position-relative">
    <div class="navbar-logo">
        <img src="{{asset('miscellaneous/Marca-Nos-Casamos.svg')}}" alt="noscasamos logo">
    </div>
    <ul class="nav navbar-nav flex-column pt-2 font-size-2">
        <li class="nav-item {{ ($selected == 'dashboard') ? 'selected' : '' }}">
            <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'dashboard') ? '<i class="fa-solid fa-house me-2">' : '<i class="fa-light fa-house me-2"></i>' !!}</i>Dashboard</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'invitations') ? 'selected' : '' }}">
            <a href="{{route('invitations.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'invitations') ? '<i class="fa-solid fa-envelope-open me-2"></i>' : '<i class="fa-light fa-envelope-open me-2"></i>' !!}Invitaciones</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'statistics') ? 'selected' : '' }}">
            <a href="" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'statistics') ? '<i class="fa-solid fa-chart-mixed me-2"></i>' : '<i class="fa-light fa-chart-mixed me-2"></i>' !!}Estadisticas</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'users') ? 'selected' : '' }}">
            <a href="{{route('users.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'users') ? '<i class="fa-solid fa-user me-2"></i>' : '<i class="fa-light fa-user me-2"></i>' !!}Usuarios</span>
            </a>
        </li>
    </ul>
    <ul class="nav navbar-nav flex-column mt-auto mb-4 font-size-2">
        <li class="nav-item {{ ($selected == 'sellers') ? 'selected' : '' }}">
            <a href="{{route('sellers.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'sellers') ? '<i class="fa-solid fa-user-tie me-2"></i>' : '<i class="fa-light fa-user-tie me-2"></i>' !!}Sellers</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'settings') ? 'selected' : '' }}">
            <a href="{{route('settings.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'settings') ? '<i class="fa-solid fa-gears me-2"></i>' : '<i class="fa-light fa-gears me-2"></i>' !!}Ajustes</span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'settings') ? 'selected' : '' }}">
            <a href="{{route('users.show', auth()->user()->id)}}" class="nav-link text-bg-dark btn btn-light rounded-0">
                <span>{!! ($selected == 'settings') ? '<i class="fa-solid fa-circle-user me-2"></i>' : '<i class="fa-light fa-circle-user me-2"></i>' !!} {{auth()->user()->name}}</span>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button  class="nav-link text-dark btn btn-white rounded-0 w-100">
                    <span><i class="fa-light fa-arrow-left-from-bracket me-2"></i> Salir</span>
                </button>
            </form>
        </li>
    </ul>
</nav>