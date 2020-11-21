<!-- ***** Header Inicio ***** -->
<header class="container-fluid p-0">

    <!-- Barra de navegacion -->
    <nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-dark bg-dark">

        <!-- Logo de la empresa -->
        <a class="navbar-brand" href="/"><img src="{{ asset('img/vec.png') }}" class="w-auto"
                alt="Nombre de la empresa"></a>

        <!-- Boton para dispositivos moviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Barra de navegacion -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item active mr-3">
                    <a class="nav-link" href="/">Inicio</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/instalaciones">Instalaciones</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="#">Tarifas</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="#">Reservar</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="#">Contacto</a>
                </li>
                @if (Route::has('login'))
                    <li class="nav-item">
                        @guest
                            <a href="{{ route('login') }}" class="nav-link"><i
                                    class="fas fa-user mr-2"></i>{{ __('Login') }}</a>
                        @else

                            @auth('admin')

                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endauth

                    @endguest
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<!-- ***** Header Fin ***** -->
