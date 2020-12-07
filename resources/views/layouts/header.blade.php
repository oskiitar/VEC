<!-- ***** Header Inicio ***** -->
<header class="container-fluid p-0">

    <!-- Barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="/">
            <!-- Logo de la empresa -->
            <img id="logo-brand" src="{{ asset('img/logo.png') }}" class="w-auto" alt="Logo de la empresa">

            <!-- Nombre de la empresa -->
            <img id="name-brand" src="{{ asset('img/vec.png') }}" class="w-auto" alt="Nombre de la empresa">
        </a>

        <!-- Boton para dispositivos moviles -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Barra de navegacion -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item active mr-3">
                    <a class="nav-link" href="/instalaciones">Instalaciones</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/tarifas">Tarifas</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/reservar">Reservar</a>
                </li>
                <li class="nav-item mr-3">
                    <a class="nav-link" href="/contacto">Contacto</a>
                </li>
                @if (Route::has('login'))
                    <li class="nav-item">
                        @guest
                            <a href="{{ route('login') }}" class="nav-link"><i
                                    class="fas fa-user mr-2"></i>{{ __('Login') }}</a>
                        @endguest

                        @auth
                            <input id="user_id" value="{{ Auth::user()->id }}" hidden>
                            <li class="nav-item dropdown">                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>                                       
                                    <span><img class="border border-light bg-light avatar rounded-circle mt-n2" alt="Imagen de perfil" src="{{ asset('img/profile/user-default.png') }}"></span>                                                                                  
                                    <span class="badge badge-light"></span> 
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <h5 class="ml-4">{{ Auth::user()->name }}</h5>

                                    @if (Auth::user()->isAdmin())
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                            Administracion
                                        </a>
                                    @endif                                  

                                    <a class="dropdown-item" href="/perfil">Mi perfil</a>

                                    <a class="dropdown-item" href="{{ route('pago') }}">Mi carrito<span class="badge badge-light"></span></a>

                                    <a class="dropdown-item" href="/reservas">Mis reservas</a>

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
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>

<!-- ***** Header Fin ***** -->
