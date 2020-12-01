<!-- Modal para edicion -->
<div class="modal fade" id="modalEditEmployee" tabindex="-1" role="dialog" aria-labelledby="modalEditEmployee">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Actualizar Empleado</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="editEmployeeForm" method="POST" action="javascript:submitEdit('employee')">

                    <input id="id-employee" type="hidden" name="id">

                    <div class="form-group row">
                        <label for="name-employee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name-employee" type="text" maxlength="150" class="form-control" name="name"
                                required autocomplete="name" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname-employee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="surname-employee" type="text" maxlength="255" class="form-control" name="surname"
                                required autocomplete="surname" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday-employee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birthday-employee" type="date" class="form-control" name="birthday" required
                                autocomplete="birthday" autofocus onblur="validateBirthday(this.value, 'employee')">
                            <span class="error text-danger" role="alert">
                                <strong id="birthday-employee-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel-employee" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel-employee" type="tel" minlength="9" maxlength="12" class="form-control"
                                name="tel" required autocomplete="tel" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract_start-employee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_start') }}</label>

                        <div class="col-md-6">
                            <input id="contract_start-employee" type="date" class="form-control" name="contract_start"
                                required autocomplete="contract_start" autofocus
                                onblur="validateContract_start(this.value, 'employee')">
                            <span class="error text-danger" role="alert">
                                <strong id="contract_start-employee-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract_end-employee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_end') }}</label>

                        <div class="col-md-6">
                            <input id="contract_end-employee" type="date" class="form-control" name="contract_end"
                                autocomplete="contract_end" autofocus
                                onblur="validateContract_end($('#contract_start-employee').val(),this.value, 'employee')">
                            <span class="error text-danger" role="alert">
                                <strong id="contract_end-employee-error"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="is_admin-employee"
                            class="col-md-4 col-form-label text-md-right">{{ __('Is_Admin') }}</label>

                        <div class="col-sm-1">
                            <label class="switcher">
                                <input id="is_admin-employee" type="checkbox">
                                <span class="sliderer rounder"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group row mb-0 mt-5">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
