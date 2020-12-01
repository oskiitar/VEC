<!-- Modal para edicion -->
<div class="modal fade" id="modalEditClient" tabindex="-1" role="dialog" aria-labelledby="modalEditClient">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Actualizar Cliente</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i
                        class="far fa-window-close"></i></button>
            </div>
            <div class="modal-body">
                <form id="editClientForm" method="POST" action="javascript:submitEdit('client')">

                    <input id="id-client" type="hidden" name="id">

                    <div class="form-group row">
                        <label for="name-client" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name-client" type="text" maxlength="150" class="form-control"
                                name="name" required autocomplete="name" autofocus> 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname-client" class="col-md-4 col-form-label text-md-right">{{ __('Surname') }}</label>

                        <div class="col-md-6">
                            <input id="surname-client" type="text" maxlength="255" class="form-control"
                                name="surname" required autocomplete="surname" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="birthday-client" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                        <div class="col-md-6">
                            <input id="birthday-client" type="date"
                                class="form-control" name="birthday"
                                required autocomplete="birthday" autofocus onblur="validateBirthday(this.value, 'client')">
                                <span class="error text-danger" role="alert">
                                    <strong id="birthday-client-error"></strong>
                                </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tel-client" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                        <div class="col-md-6">
                            <input id="tel-client" type="tel" minlength="9" maxlength="12" class="form-control"
                                name="tel" required autocomplete="tel" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address-client" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input id="address-client" type="text" maxlength="255" class="form-control"
                                name="address" required autocomplete="address" autofocus>
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
