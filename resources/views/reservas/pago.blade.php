@extends('layouts.master')
@section('titulo', 'Pago')
@section('content')
@section('content')
    <div class="m-default">
        <div class="container-md h-50">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Pago') }}</div>

                        <div class="card-body pb-5 mb-5">
                            <p id="data-pay"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('alertify/alertify.js') }}"></script>
    <script type="text/javascript">
        // Carga del token de session en cabecera AJAX

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let data = Object.entries(sessionStorage);

        data.forEach(item => {
            $('#data-pay').append(item +'<br/>')
        });

    </script>
@endsection
