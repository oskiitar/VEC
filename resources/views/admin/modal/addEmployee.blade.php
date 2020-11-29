<!-- Modal para insertar nuevos users -->
<div class="modal fade" id="modalAddEmployee" tabindex="-1" role="dialog" aria-labelledby="modalAddEmployee">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nuevo Empleado</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-window-close"></i></button>
            </div>
            <div class="modal-body ">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name-addEmployee" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name-addEmployee" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname-addEmployee" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="surname-addEmployee" type="text" class="form-control @error('surname') is-invalid @enderror"
                                name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday-addEmployee" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birthday-addEmployee" type="date"
                                class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                                value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel-addEmployee" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel-addEmployee" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>

                            @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email-addEmployee" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-addEmployee" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-addEmployee-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-addEmployee-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract_start"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_start') }}</label>

                        <div class="col-md-6">
                            <input id="contract_start" type="date"
                                class="form-control @error('contract_start') is-invalid @enderror" name="contract_start"
                                required autocomplete="contract_start" autofocus>

                            @error('contract_start')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract_end"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_end') }}</label>

                        <div class="col-md-6">
                            <input id="contract_end" type="date"
                                class="form-control @error('contract_end') is-invalid @enderror" name="contract_end"
                                required autocomplete="contract_end" autofocus>

                            @error('contract_end')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_admin" class="col-md-4 col-form-label text-md-right">{{ __('Is_Admin') }}</label>

                        <div class="col-sm-1">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="form-control btn btn-outline-info !active">
                                    <input id="is_admin" name="is_admin" type="checkbox" checked autocomplete="off">
                                    <i class="fas fa-user-shield"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0 mt-5">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                            <button type="reset" class="btn btn-secondary ml-2">
                                {{ __('reset') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
