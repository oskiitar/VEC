@extends('layouts.master')
@section('titulo', 'Pago')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('alertify/css/alertify.css') }}">
@endsection
@section('content')
@section('content')
    <div class="m-default">
        <div class="container-md h-50">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Pago') }}</div>

                        <div class="card-body pb-5 mb-5">
                            <h3 class="mb-5 text-center">Resumen de la reserva</h3>
                            <div id="data-pay" class="col-md-8 offset-1 text-right"></div>
                            <div id="total-pay" class="col-md-8 offset-1 text-right"></div>
                            <div class="col-md-8 mt-5 offset-1 text-right">
                                <div id="list-vr-room" class="list-group mt-4" hidden>
                                    <select id="vr-room" class="custom-select" onchange="val(this.value)">
                                        <option value="4">Sala Aventura</option>
                                    </select>
                                </div>
                                <a id="btn-reserve" class="btn btn-success" disabled onclick="pay()">{{ __('Pay') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('alertify/alertify.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/pay.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // Carga del token de session en cabecera AJAX

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let dataSession = Object.entries(sessionStorage);

        if (dataSession.length > 0) {

            var reserve = []; // Array que contiene toda la reserva

            dataSession.forEach(item => {
                reserve.push(item);
            });

            $(document).ready(function() {
                getReserve();
            });
        }

    </script>
@endsection
@section('footer')
@endSection
