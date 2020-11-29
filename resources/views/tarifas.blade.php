@extends('layouts.master')
@section('titulo', 'Tarifas')
@section('content')
    <div class="m-default">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <figcaption>Salas de Realidad Virtual</figcaption>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid rounded" src={{ asset('img/sala-vr.jpg') }}
                                title="Sala de realidad virtual" alt="Sala de realidad virtual" />
                        </div>
                        <div class="card-footer bg-primary text-white">
                            <p><strong>¡Oferta exclusiva!</strong></p>
                            <p>Disfruta de la máxima diversión de la mano de HTC Vive</p>
                            <p>1 hora para hasta 4 jugadores</p>
                            <p>Por tan sólo 60€</p>
                        </div>
                    </div>
                </div>
                <div class="col"></div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <figcaption>Sala de Escape Room</figcaption>
                        </div>
                        <div class="card-body">
                            <img class="img-fluid rounded" src={{ asset('img/escape-room.jpg') }}
                                title="Sala de escape room" alt="Sala de escape room" />
                        </div>
                        <div class="card-footer bg-primary text-white">
                            <p>¿Crees que puedes resolver el enigma?</p>
                            <p>1 hora para hasta 8 jugadores</p>
                            <p>Por tan sólo 50€</p>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
@endsection
