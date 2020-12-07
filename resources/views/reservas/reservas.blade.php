@extends('layouts.master')
@section('titulo', 'Mis reservas')
@section('content')
    <div class="m-default">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2 align-content-center">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            {{ __('Mis reservas') }}
                        </div>
                        <div class="card-body text-center">
                            <p class="card-description"></p>
                            <table id="reserves-table" class="table">                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/reserves.js') }}" type="text/javascript"></script>
@endsection
@section('footer')
@endsection
