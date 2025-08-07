

<div class="shadow bg-light bg-dark d-flex justify-content-between align-items-center d-md-none container-fluid" style=" height: 60px !important">
    <div class="h-100">
        <img src="{{asset('miscellaneous/sec-minimalist-logo.svg')}}" 
            alt="noscasamos logo"
            style="max-height: 100%; max-width: 100%; object-fit: contain;"
             >
    </div>
    <div>
        <button class="btn btn-dark" 
            data-bs-toggle="offcanvas" 
            data-bs-target="#offcanvasDarkNavbar" 
            aria-controls="offcanvasDarkNavbar" 
            aria-label="Toggle navigation"
        >
            <i class="fa-light fa-bars"></i>
        </button>
    </div>

    <div class="offcanvas offcanvas-end navbar-bg" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel"><b>Menú</b></h5>
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column px-0">
            <ul class="nav navbar-nav flex-column pt-2 font-size-2">
                <li class="nav-item {{ ($selected == 'dashboard') ? 'selected' : '' }}">
                    <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-white rounded-0">
                        <span>{!! ($selected == 'dashboard') ? '<i class="fa-solid fa-house me-2"></i>' : '<i class="fa-light fa-house me-2"></i>' !!}<span class="text-nav-link">Dashboard</span></span>
                    </a>
                </li>
                <li class="nav-item {{ ($selected == 'invitations') ? 'selected' : '' }}">
                    <a href="{{route('invitations.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                        <span>{!! ($selected == 'invitations') ? '<i class="fa-solid fa-envelope-open me-2"></i>' : '<i class="fa-light fa-envelope-open me-2"></i>' !!}<span class="text-nav-link">Invitaciones</span></span>
                    </a>
                </li>
                <li class="nav-item {{ ($selected == 'templates') ? 'selected' : '' }}">
                    <a href="{{route('templates.index')}}" class="nav-link text-dark btn btn-light rounded-0">
                        <span>{!! ($selected == 'templates') ? '<i class="fa-solid fa-files me-2"></i>' : '<i class="fa-light fa-files me-2"></i>' !!}<span class="text-nav-link">Plantillas</span></span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())
                <li class="nav-item {{ ($selected == 'metrics') ? 'selected' : '' }}">
                    <a href="{{route('metrics.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                        <span>{!! ($selected == 'metrics') ? '<i class="fa-solid fa-chart-mixed me-2"></i>' : '<i class="fa-light fa-chart-mixed me-2"></i>' !!}<span class="text-nav-link">Estadisticas</span></span>
                    </a>
                </li>
                <li class="nav-item {{ ($selected == 'users') ? 'selected' : '' }}">
                    <a href="{{route('users.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                        <span>{!! ($selected == 'users') ? '<i class="fa-solid fa-user me-2"></i>' : '<i class="fa-light fa-user me-2"></i>' !!}<span class="text-nav-link">Usuarios</span></span>
                    </a>
                </li>
                @endif
            </ul>

            <ul class="nav navbar-nav flex-column mt-auto mb-4 font-size-2">
                @if(auth()->user()->isAdmin())
                <li class="nav-item {{ ($selected == 'sellers') ? 'selected' : '' }}">
                    <a href="{{route('sellers.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                        <span>{!! ($selected == 'sellers') ? '<i class="fa-solid fa-user-tie me-2"></i>' : '<i class="fa-light fa-user-tie me-2"></i>' !!}<span class="text-nav-link">Sellers</span></span>
                    </a>
                </li>
                <li class="nav-item {{ ($selected == 'settings') ? 'selected' : '' }}">
                    <a href="{{route('settings.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                        <span>{!! ($selected == 'settings') ? '<i class="fa-solid fa-gears me-2"></i>' : '<i class="fa-light fa-gears me-2"></i>' !!}<span class="text-nav-link">Ajustes</span></span>
                    </a>
                </li>
                @endif
                <li class="nav-item {{ ($selected == 'user') ? 'selected' : '' }}">
                    <a href="{{route('users.show', auth()->user()->id)}}" class="nav-link text-bg-dark btn btn-light rounded-0 user-nav-link">
                        <span>{!! ($selected == 'user') ? '<i class="fa-solid fa-circle-user me-2"></i>' : '<i class="fa-light fa-circle-user me-2"></i>' !!}<span class="text-nav-link">{{auth()->user()->name}}</span></span>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button  class="nav-link logout-link text-dark btn btn-white rounded-0 w-100">
                            <span><i class="fa-light fa-arrow-left-from-bracket me-2"></i><span class="text-nav-link">Salir</span></span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

</div>


<nav class="navbar navbar-bg d-none d-md-flex" id="navbar">
    <div class="navbar-logo w-100" id="logo">
        <img src="{{asset('miscellaneous/sec-logo.svg')}}" class="logo" alt="noscasamos logo">
        <img src="{{asset('miscellaneous/sec-minimalist-logo.svg')}}" class="minimalist-logo" alt="noscasamos logo">
    </div>
    <ul class="nav navbar-nav flex-column mb-4 font-size-2">
        <li class="nav-item">
            <a class="btn btn-secondary w-100 py-3 border-0 btn rounded-0" onclick="toggleSidebar(this)">
                <span><i class="fa-light fa-chevrons-left me-2"></i><span class="text-nav-link">Colapsar menu</span></span>
            </a>
        </li>
    </ul>
    <ul class="nav navbar-nav flex-column pt-2 font-size-2">
        <li class="nav-item {{ ($selected == 'dashboard') ? 'selected' : '' }}">
            <a href="{{route('dashboard')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'dashboard') ? '<i class="fa-solid fa-house me-2"></i>' : '<i class="fa-light fa-house me-2"></i>' !!}<span class="text-nav-link">Dashboard</span></span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'invitations') ? 'selected' : '' }}">
            <a href="{{route('invitations.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'invitations') ? '<i class="fa-solid fa-envelope-open me-2"></i>' : '<i class="fa-light fa-envelope-open me-2"></i>' !!}<span class="text-nav-link">Invitaciones</span></span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'templates') ? 'selected' : '' }}">
            <a href="{{route('templates.index')}}" class="nav-link text-dark btn btn-light rounded-0">
                <span>{!! ($selected == 'templates') ? '<i class="fa-solid fa-files me-2"></i>' : '<i class="fa-light fa-files me-2"></i>' !!}<span class="text-nav-link">Plantillas</span></span>
            </a>
        </li>
        @if(auth()->user()->isAdmin())
        <li class="nav-item {{ ($selected == 'metrics') ? 'selected' : '' }}">
            <a href="{{route('metrics.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'metrics') ? '<i class="fa-solid fa-chart-mixed me-2"></i>' : '<i class="fa-light fa-chart-mixed me-2"></i>' !!}<span class="text-nav-link">Estadisticas</span></span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'users') ? 'selected' : '' }}">
            <a href="{{route('users.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'users') ? '<i class="fa-solid fa-user me-2"></i>' : '<i class="fa-light fa-user me-2"></i>' !!}<span class="text-nav-link">Usuarios</span></span>
            </a>
        </li>
        @endif
    </ul>
    <ul class="nav navbar-nav flex-column mt-auto mb-4 font-size-2">
        @if(auth()->user()->isAdmin())
        <li class="nav-item {{ ($selected == 'sellers') ? 'selected' : '' }}">
            <a href="{{route('sellers.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'sellers') ? '<i class="fa-solid fa-user-tie me-2"></i>' : '<i class="fa-light fa-user-tie me-2"></i>' !!}<span class="text-nav-link">Sellers</span></span>
            </a>
        </li>
        <li class="nav-item {{ ($selected == 'settings') ? 'selected' : '' }}">
            <a href="{{route('settings.index')}}" class="nav-link text-dark btn btn-white rounded-0">
                <span>{!! ($selected == 'settings') ? '<i class="fa-solid fa-gears me-2"></i>' : '<i class="fa-light fa-gears me-2"></i>' !!}<span class="text-nav-link">Ajustes</span></span>
            </a>
        </li>
        @endif
        <li class="nav-item {{ ($selected == 'user') ? 'selected' : '' }}">
            <a href="{{route('users.show', auth()->user()->id)}}" class="nav-link text-bg-dark btn btn-light rounded-0 user-nav-link">
                <span>{!! ($selected == 'user') ? '<i class="fa-solid fa-circle-user me-2"></i>' : '<i class="fa-light fa-circle-user me-2"></i>' !!}<span class="text-nav-link">{{auth()->user()->name}}</span></span>
            </a>
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button  class="nav-link logout-link text-dark btn btn-white rounded-0 w-100">
                    <span><i class="fa-light fa-arrow-left-from-bracket me-2"></i><span class="text-nav-link">Salir</span></span>
                </button>
            </form>
        </li>
    </ul>
</nav>

<script>
    function toggleSidebar(toggle) {
        const sidebar = document.getElementById('navbar'); 
        const logo = document.getElementById('logo'); //
        const minimalLogo = document.getElementById('minimal-logo');

        sidebar.classList.toggle('collapsed');
        localStorage.setItem('sidebar-collapsed', sidebar.classList.contains('collapsed'));

        toggle = toggle.children[0].children[0];

        if(toggle.classList.contains('fa-chevrons-right')){
            toggle.classList.replace('fa-chevrons-right', 'fa-chevrons-left');
        }else{
            toggle.classList.replace('fa-chevrons-left', 'fa-chevrons-right');
        }

    }

    const sidebar = document.getElementById('navbar'); 

    // Restaurar estado
    if (localStorage.getItem('sidebar-collapsed') === 'true') {
        sidebar.classList.add('collapsed');
    }
</script>