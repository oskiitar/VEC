@extends('layouts.master')
@section('titulo', 'Pago')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('alertify/css/alertify.css') }}">
@endsection
@section('content')
@section('content')
    <div class="m-min">
        <div class="container-md h-50">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white">{{ __('Pay') }}</div>

                        <div class="card-body pb-5 mb-5">
                            <h3 class="mb-5 text-center">Mis reservas</h3>
                            <h6 class="text-center"><cite id="noReserves"></cite></h6>
                            <div id="data-pay" class="col-md-8 offset-1 text-right"></div>
                            <div id="total-pay" class="col-md-8 offset-1 text-right mb-3"></div>
                            <div id="selectPay" class="text-center">
                                <label for="payment" class="mt-3 mr-3">Selecciona el metodo de pago</label>
                                <select id="payment" class="custom-select w-25" onchange="selectPay(this.value)">                                    
                                </select>                                
                            </div>
                            <div class="col-md-8 offset-8 mt-3">
                                <button id="btn-pay" class="btn btn-success" onclick="pay({{ Auth::user()->id }})">{{ __('Pay') }}</button>
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
    <script src="{{ asset('js/moment.js') }}"></script>    
@endsection
@section('footer')
@endsection
