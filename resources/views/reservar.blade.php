@extends('layouts.master')
@section('titulo', 'Reservar')
@section('head')
    <link rel="stylesheet" href="alertify/css/alertify.css">
@endsection
@section('content')
@section('content')
    <div class="m-default">
        <div class="container-md h-50">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Reserve') }}</div>

                        <div class="card-body pb-5 mb-5">
                            <div class="form-group row">
                                <label for="reserve-date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date-reserve') }}</label>

                                <div class="col-md-3">
                                    <input id="reserve-date" type="date" class="form-control" name="date" required
                                        autocomplete="date" onchange="validateDate()">
                                    <span class="error text-danger" role="alert">
                                        <strong id="reserve-date-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div id="schedules" class="form-group row" hidden>
                                <label for=""
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date-schedule') }}</label>

                                <div class="col-md-8">
                                    <button id="btn17" type="button" class="btn btn-secondary mb-2"
                                        onclick="selectSchedule(17)">17:00 - 18:00</button>
                                    <button id="btn18" type="button" class="btn btn-secondary mb-2"
                                        onclick="selectSchedule(18)">18:00 - 19:00</button>
                                    <button id="btn19" type="button" class="btn btn-secondary mb-2"
                                        onclick="selectSchedule(19)">19:00 - 20:00</button>
                                    <button id="btn20" type="button" class="btn btn-secondary mb-2"
                                        onclick="selectSchedule(20)">20:00 - 21:00</button>
                                    <button id="btn21" type="button" class="btn btn-secondary mb-2"
                                        onclick="selectSchedule(21)">21:00 - 22:00</button>
                                    <button id="btn22" type="button" class="btn btn-secondary mb-2" hidden
                                        onclick="selectSchedule(22)">22:00 - 23:00</button>
                                </div>
                                <div class="col-md-8 mx-auto mt-5">
                                    <a id="btn-reserve" href="{{ route('pago') }}" class="btn btn-outline-secondary" disabled>{{ __('Reserve') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="loading" class="d-flex justify-content-center mt-5"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('alertify/alertify.js') }}"></script>
    <script src="{{ asset('js/reserve.js') }}"></script>
    <script type="text/javascript">
        // Carga del token de session en cabecera AJAX

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
@endsection
