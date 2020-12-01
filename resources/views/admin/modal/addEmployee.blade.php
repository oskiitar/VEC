<!-- Modal para insertar nuevos users -->
<div class="modal fade" id="modalAddEmployee" tabindex="-1" role="dialog" aria-labelledby="modalAddEmployee">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Nuevo Empleado</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="employeeForm" method="POST" action="javascript:submitCreate('employee')">

                    <div class="form-group row">
                        <label for="name-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name-addEmployee" type="text" maxlength="150" class="form-control" name="name"
                                required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="surname-addEmployee" type="text" maxlength="255" class="form-control"
                                name="surname" required autocomplete="surname" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birthday-addEmployee" type="date" class="form-control" name="birthday" required
                                autocomplete="birthday" autofocus onblur="validateBirthday(this.value, 'addEmployee')">
                                <span class="error text-danger" role="alert">
                                <strong id="birthday-addEmployee-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel-addEmployee" type="tel" minlength="9" maxlength="12" class="form-control"
                                name="tel" required autocomplete="tel" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email-addEmployee" type="email" maxlength="255" class="form-control" name="email"
                                required autocomplete="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-addEmployee" type="password" minlength="8" maxlength="20"
                                class="form-control" name="password" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-addEmployee-confirm"
                            class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-addEmployee-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                onblur="validatePassword($('#password-addEmployee').val(), this.value, 'addEmployee')">
                                <span class="error text-danger" role="alert">
                                <strong id="password-addEmployee-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract_start-addEmployee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_start') }}</label>

                        <div class="col-md-6">
                            <input id="contract_start-addEmployee" type="date" class="form-control"
                                name="contract_start" required autocomplete="contract_start" autofocus onblur="validateContract_start(this.value, 'addEmployee')">
                                <span class="error text-danger" role="alert">
                                <strong id="contract_start-addEmployee-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_admin-addEmployee" class="col-md-4 col-form-label text-md-right">{{ __('Is_Admin') }}</label>

                        <div class="col-sm-1">
                            <label class="switcher">
                                <input id="is_admin-addEmployee" type="checkbox">
                                <span class="sliderer rounder"></span>
                            </label>
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
