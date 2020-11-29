@extends('layouts.master')
@section('titulo', 'Contacto')
@section('content')
    <div class="m-default">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header bg-primary text-white"><i
                                class="fa fa-envelope mr-2"></i>{{ __('Contact_us') }}
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('email') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        aria-describedby="emailHelp" placeholder="Introduce tu nombre" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail Address') }}</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        aria-describedby="emailHelp" placeholder="Introduce tu email" required>
                                    <small id="emailHelp"
                                        class="form-text text-muted">{{ __("We'll never share your email with anyone else.") }}</small>
                                </div>
                                <div class="form-group">
                                <label for="message">{{__('message')}}</label>
                                    <textarea class="form-control" id="message" name="msg" rows="6" required></textarea>
                                </div>
                                <div class="mx-auto">
                                    <button type="submit" class="btn btn-primary">{{ __('submit') }}</button>
                                    <button type="reset" class="btn btn-secondary ml-2">{{ __('reset') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="card bg-light mb-3">
                        <div class="card-header bg-success text-white"><i class="fa fa-home mr-2"></i>{{ __('Address') }}
                        </div>
                        <div class="card-body">
                            <p>Avenida Finisterre 99</p>
                            <p>15004 A Coruña</p>
                            <p>España</p>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
