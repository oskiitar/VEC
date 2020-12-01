<!-- Modal para insertar nuevos users -->
<div class="modal fade" id="modalAddClient" tabindex="-1" role="dialog" aria-labelledby="modalAddClient">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nuevo Cliente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="clientForm" method="POST" action="javascript:submitCreate('client')">

                    <div class="form-group row">
                        <label for="name-addClient"
                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name-addClient" type="text" maxlength="150" class="form-control" name="name"
                                required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname-addClient"
                            class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="surname-addClient" type="text" maxlength="255" class="form-control"
                                name="surname" required autocomplete="surname" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday-addClient"
                            class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birthday-addClient" type="date" class="form-control" name="birthday" required
                                autocomplete="birthday" autofocus onblur="validateBirthday(this.value, 'addClient')">
                            <span class="error text-danger" role="alert">
                                <strong id="birthday-addClient-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel-addClient" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel-addClient" type="tel" minlength="9" maxlength="12" class="form-control"
                                name="tel" required autocomplete="tel" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email-addClient"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email-addClient" type="email" maxlength="255" class="form-control" name="email"
                                required autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address-addClient"
                            class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input id="address-addClient" type="text" maxlength="255" class="form-control"
                                name="address" required autocomplete="address" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-addClient"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-addClient" type="password" minlength="8" maxlength="20"
                                class="form-control" name="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-addClient-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-addClient-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                onblur="validatePassword($('#password-addClient').val(), this.value, 'addClient')">
                            <span class="error text-danger" role="alert">
                                <strong id="password-addClient-error"></strong>
                            </span>
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
