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
                <form>
                    
                    <input id="id-employee" type="hidden" name="id">

                    <div class="form-group row">
                        <label for="name-employee" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name-employee" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" required autocomplete="name" autofocus>

                            @error('name-employee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname-employee" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="surname-employee" type="text" class="form-control @error('surname') is-invalid @enderror"
                                name="surname" required autocomplete="surname" autofocus>

                            @error('surname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday-employee" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birthday-employee" type="date"
                                class="form-control @error('birthday') is-invalid @enderror" name="birthday" required
                                autocomplete="birthday" autofocus>

                            @error('birthday')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel-employee" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel-employee" type="tel" class="form-control @error('tel') is-invalid @enderror"
                                name="tel" required autocomplete="tel" autofocus>

                            @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contract_start-edit"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_start') }}</label>

                        <div class="col-md-6">
                            <input id="contract_start-edit" type="date"
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
                        <label for="contract_end-edit"
                            class="col-md-4 col-form-label text-md-right">{{ __('Contract_end') }}</label>

                        <div class="col-md-6">
                            <input id="contract_end-edit" type="date"
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
                        <label for="is_admin-edit" class="col-md-4 col-form-label text-md-right">{{ __('Is_Admin') }}</label>

                        <div class="col-sm-1">
                            <div class="btn-group-toggle" data-toggle="buttons">
                                <label class="form-control btn btn-outline-info !active">
                                    <input id="is_admin-edit" name="is_admin" type="checkbox" checked autocomplete="off">
                                    <i class="fas fa-user-shield"></i>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0 mt-5">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary" onclick="submitEdit()">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
