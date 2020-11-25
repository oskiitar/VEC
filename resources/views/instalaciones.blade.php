@extends('layouts.master')
@section('titulo', 'Instalaciones')
@section('content')
    <div class="m-default">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <figure>
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <figcaption>Ubicacion de las instalaciones</figcaption>
                            </div>
                            <div class="card-body">
                                <img class="img-fluid rounded" src={{ asset('img/ubicacion.png') }}
                                    title="Ubicacion de las instalaciones" alt="Ubicacion de las instalaciones" />
                            </div>
                            <div class="card-footer bg-secondary text-white">
                                <p>En la avenida Finisterre, próximo al palacio de la Opera</p>
                            </div>
                        </div>
                    </figure>
                </div>
                <div class="col-12 col-lg-6">
                    <figure>
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <figcaption>Plano del local</figcaption>
                            </div>
                            <div class="card-body">
                                <img class="img-fluid rounded" src={{ asset('img/plano.png') }}
                                    title="Plano del local" alt="Plano del local" />
                            </div>
                        </div>                        
                    </figure>
                </div>
            </div>
        </div>
    </div>
@endsection
