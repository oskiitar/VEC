@extends('layouts.master')
@section('titulo', 'Inicio')
@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row">
            @include('layouts.carrusel')
        </div>
        <div id="bg-intro" class="row justify-content-center text-justify m-5 p-5">
            <div class="col-5 my-auto">
                <div id="card-intro" class="card">
                    <div class="card-header bg-primary text-white mb-5">
                        VIRTUAL ESCAPE CORUÑA
                    </div>
                    <div class="card-body m-2">
                        <div class="mb-5">
                            <h6><i class="fas fa-vr-cardboard mr-2"></i>HTC VIVE</h6>
                            <cite>Las gafas HTC Vive van más allá que el resto.
                                Te ofrecen la posibilidad de moverte físicamente por un
                                espacio para que sumergirte en el mundo virtual lo haga
                                prácticamente indistinguible del mundo real.</cite>
                        </div>
                        <div class="mb-5">
                            <h6><i class="fas fa-dice-d6 mr-2"></i>¿QUÉ PUEDO HACER EN EL MUNDO VIRTUAL?</h6>
                            <cite>Muévete entre dinosaurios, lucha en el espacio con sables láser, sobrevive a hordas de
                                zombies,
                                pelea contra gladiadores, desafía tus miedos, baila, corre, dispara, esquiva o simplemente
                                relájate
                                nadando entre corales entre otras muchas cosas, las posibilidades son inabarcables. Te llevamos
                                al
                                juego, donde tu cuerpo es el controlador y tu mente cree que es real. ¡Te
                                sorprenderá!</cite>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <video class="" width="auto" height="500px" muted autoplay loop>
                    <source src="{{ asset('mp4/vr1.mp4') }}" type="video/mp4">
                    El navegador no soporta el video
                </video>
            </div>
        </div>

        <div class="row bg-fixed justify-content-center text-center p-5"
            style="background-image: url({{ asset('img/360bground.jpg') }})">
            <div class="col">
                <img class="img-brand mt-5" src="{{ asset('img/360logo.png') }}">
            </div>
            <div class="col">
                <img class="img-brand" src="{{ asset('img/intelmsi.png') }}">
            </div>
            <div class="col">
                <img class="img-brand mt-5" src="{{ asset('img/4klogo.png') }}">
            </div>
        </div>
    </div>
@endsection
