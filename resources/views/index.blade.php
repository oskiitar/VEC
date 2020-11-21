@extends('layouts.master')
@section('titulo', 'Inicio')
@section('content')
@include('layouts.carrusel')
    <video class="vw-100" muted autoplay loop>
        <source src="{{ asset('mp4/vr1.mp4') }}" type="video/mp4">
        El navegador no soporta el video
    </video>
@endsection
