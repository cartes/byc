<li class="nav-item">
    <a href="#" class="nav-link">
        {{ __('Administrar Avisos') }}
    </a>
</li>
<li class="nav-item">
    <a href="{{ route('category.show') }}" class="nav-link">
        {{ __('Administrar Categorías') }}
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        {{ __('Administrar Usuarios') }}
    </a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        {{ __('Configuración') }}
    </a>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropDown" class="dropdown-toggle nav-link" href="#" role="button"
       data-toggle="dropdown"
       aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropDown">
        <a class="dropdown-item" href="#">
            {{ __('Mi Perfil') }}
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#"
           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
            {{ __('Cerrar sesión') }}
        </a>

        <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display: none;">
            @csrf
        </form>
    </div>
</li>