@extends('layouts.master')
@section('titulo', 'Mi perfil')
@section('content')
    <div class="m-default">
        <div class="container emp-profile">
            <form method="POST" action="{{ route('profile_update') }}">
                @csrf
                <div class="row">
                    <div class="col-md-4">

                        <div class="profile-img">
                            <img src="{{ asset('img/profile/user-default.png') }}" alt="Imagen de perfil" />
                            <div class="file btn btn-lg btn-primary">
                                Cambiar foto
                                <input type="file">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6 mt-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="profile-head text-right mb-5">
                            <h5>
                                Mi perfil
                            </h5>
                            <h6>
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </h6>
                        </div>

                        <input id="user-id" type="number" name="id" value="{{ Auth::user()->id }}" hidden>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror"
                                    name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="text"
                                    class="form-control @error('birthday') is-invalid @enderror"
                                    value="{{ old('birthday') }}" autocomplete="birthday" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                    name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="address-group" class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('js/session.js') }}" type="text/javascript"></script>
    <script src="{{ asset('alertify/alertify.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/profile.js') }}" type="text/javascript"></script>
@endsection
@section('footer')
@endsection
