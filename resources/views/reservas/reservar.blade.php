@extends('layouts.master')
@section('titulo', 'Reservar')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('alertify/css/alertify.css') }}">
@endsection
@section('content')
@section('content')
    <div class="m-min">
        <div class="container h-50">
            <div class="row justify-content-center">
                <div class="col-lg-3">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-er-list" data-toggle="list"
                            href="#list-er" role="tab" aria-controls="er" onclick="showEr($('#er-room').val())">Sala
                            Escape Room</a>
                        <a class="list-group-item list-group-item-action" id="list-vr-list" data-toggle="list"
                            href="#list-vr" role="tab" aria-controls="vr" onclick="showVr($('#vr-room').val())">Sala
                            Realidad Virtual</a>
                    </div>
                    <div id="list-er-room" class="list-group mt-4">
                        <select id="er-room" class="custom-select" onchange="selectRoom(this.value)">
                        </select>
                    </div>
                    <div id="list-vr-room" class="list-group mt-4" hidden>
                        <select id="vr-room" class="custom-select" onchange="selectRoom(this.value)">
                        </select>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Reserve') }}</div>

                        <div class="card-body pb-3">
                            <div id='room-specs' class="col-lg-12 mt-3 mb-5"></div>
                            <div class="form-group row">
                                <label for="reserve-date"
                                    class="col-lg-4 col-form-label text-md-right">{{ __('Date-reserve') }}</label>

                                <div class="col-lg-4">
                                    <input id="reserve-date" type="date" class="form-control" name="date" required
                                        autocomplete="date" onchange="validate()">
                                    <span class="error text-danger" role="alert">
                                        <strong id="reserve-date-error"></strong>
                                    </span>
                                </div>
                            </div>
                            <div id="schedules" class="form-group row" hidden>
                                <label for=""
                                    class="col-lg-4 col-form-label text-lg-right">{{ __('Date-schedule') }}</label>

                                <div class="col-lg-8">
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
                                <div class="col-lg-8 mx-auto mt-5">
                                    <a id="btn-reserve" href="{{ route('pago') }}" class="btn btn-outline-secondary"
                                        disabled>{{ __('Reserve') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @section('script')
        <script src="{{ asset('alertify/alertify.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/reserve.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/moment.js') }}"></script>
    @endsection
@endsection
@section('footer')
@endsection
