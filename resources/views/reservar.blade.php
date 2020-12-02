@extends('layouts.master')
@section('titulo', 'Reservar')
@section('content')
@section('content')
    <div class="m-default">
        <div class="container-md h-50">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Reserve') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

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

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('alertify/alertify.js') }}"></script>
<script src="{{ asset('js/reservar.js') }}"></script>

