<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Proyecto fin de ciclo Desarrollo de aplicaciones web realizado en Laravel/Bootstrap">
    <meta name="author" content="Oscar Rodriguez Sedes">

    <!-- Titulo  -->
    <title>VEC - @yield('titulo')</title>

    <!-- Icono  -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <!-- Hoja de estilos -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/estilo.css') }}">


</head>

<body>

    <!-- ============= Header ============= -->

    @include('layouts.header')



    <!-- ============= Contenido principal ============= -->

    <main>
        @yield('content')
    </main>


    
    <!-- ============= Footer ============= -->

    @include('layouts.footer')


    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <!-- popper -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>
