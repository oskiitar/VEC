// Carga del token de session en cabecera AJAX

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function() { // Funcion que se ejecuta cuando carga el documento
    selectClients();
});

/* LLamadas AJAX con callback de funcion que carga los modelos
   en tablas */

function selectClients() {
    loadData('client', htmlData);
}

function selectEmployees() {
    loadData('employee', htmlData);
}

function selectReservations() {
    loadData('reservation', htmlData);
}

/******************** Creacion ********************************/

// Envio del form por post mediante AJAX

function submitCreate(model) {

    switch (model) {
        case 'client':
            let client = {
                name: $('#name-addClient').val(),
                surname: $('#surname-addClient').val(),
                birthday: $('#birthday-addClient').val(),
                tel: $('#tel-addClient').val(),
                email: $('#email-addClient').val(),
                address: $('#address-addClient').val(),
                password: $('#password-addClient').val(),
                password_confirmation: $('#password-addClient-confirm').val()
            }
            if (validate('addClient', client)) {
                $('#modalAddClient').modal('toggle');
                saveData('client', client);
            }
            break;

        case 'employee':
            let employee = {
                name: $('#name-addEmployee').val(),
                surname: $('#surname-addEmployee').val(),
                birthday: $('#birthday-addEmployee').val(),
                tel: $('#tel-addEmployee').val(),
                email: $('#email-addEmployee').val(),
                contract_start: $('#contract_start-addEmployee').val(),
                contract_end: $('#contract_end-addEmployee').val(),
                password: $('#password-addEmployee').val(),
                password_confirmation: $('#password-addEmployee-confirm').val(),
                is_admin: $('#is_admin-addEmployee').is(':checked') ? 1 : 0,
            }
            console.log(employee);
            $('#modalAddEmployee').modal('toggle');
            saveData('employee', employee);
    }
}

/************************ Edicion *******************************/

// Se recogen los valores de la tabla para editar en el form

function editClient(client) {
    $('#id-client').val(client.id);
    $('#name-client').val(client.name);
    $('#surname-client').val(client.surname);
    $('#birthday-client').val(client.birthday);
    $('#tel-client').val(client.tel);
    $('#address-client').val(client.client.address);
}

function editEmployee(employee) {
    $('#id-employee').val(employee.id);
    $('#name-employee').val(employee.name);
    $('#surname-employee').val(employee.surname);
    $('#birthday-employee').val(employee.birthday);
    $('#tel-employee').val(employee.tel);
    $('#contract_start-employee').val(employee.employee.contract_start);
    $('#contract_end-employee').val(employee.employee.contract_end);            
    $('#is_admin-employee').prop('checked', employee.is_admin == 1 ? true : false);
}

function submitEdit(model) {
    switch (model) {
        case 'client':
            let client = {
                id: $('#id-client').val(),
                name: $('#name-client').val(),
                surname: $('#surname-client').val(),
                birthday: $('#birthday-client').val(),
                tel: $('#tel-client').val(),
                address: $('#address-client').val()
            }
            $('#modalEditClient').modal('toggle');
            saveData('client', client, true);
            break;
        case 'employee':
            let employee = {
                id: $('#id-employee').val(),
                name: $('#name-employee').val(),
                surname: $('#surname-employee').val(),
                birthday: $('#birthday-employee').val(),
                tel: $('#tel-employee').val(),
                contract_start: $('#contract_start-employee').val(),
                contract_end: $('#contract_end-employee').val(),
                is_admin: $('#is_admin-employee').is(':checked') ? 1 : 0,
            }
            $('#modalEditEmployee').modal('toggle');
            saveData('employee', employee, true);
    }
}

/**************** Borrado ****************************/

function deleteUser(model, id) {
    confirmDelete(model, id);
}

/************** Validaciones *************************/

function validate(model, obj) {
    let $passed = true;
    switch (model) {
        case 'addClient':
            if (!validateBirthday(obj.birthday, model)) {
                $passed = false;
            }
            if (!validatePassword(obj.password, obj.password_confirmation, model)) {
                $passed = false;
            }
            break;
        case 'addEmployee':
            if (!validateBirthday(obj.birthday, model)) {
                $passed = false;
            }
            if (!validatePassword(obj.password, obj.password_confirmation, model)) {
                $passed = false;
            }
            break;
    }

    return $passed;
}

function validateBirthday(data, model) {
    let passed = true;
    let date = new Date(data);
    let tempDate = new Date(date.getFullYear() + 18, date.getMonth(), date.getDate());

    if (tempDate > new Date()) {
        $('#birthday-' + model + '-error').html('Debe tener +18 años');
        passed = false;
    } else {
        $('#birthday-' + model + '-error').empty();
    }

    return passed;
}

function validatePassword(pass, pass_confirm, model) {
    let passed = true;

    if (pass !== pass_confirm) {
        $('#password-' + model + '-error').html('La contraseña no coincide');
        passed = false;
    } else {
        $('#password-' + model + '-error').empty();
    }

    return passed;
}

function validateContract_start(data, model) {
    let passed = true;
    let date = new Date(data);
    let tempDate = new Date(date.getFullYear(), date.getMonth() + 6, date.getDate());

    if (tempDate < new Date()) {
        $('#contract_start-' + model + '-error').html('El período anterior permitido es de 6 meses');
        passed = false;
    } else {
        $('#contract_start-' + model + '-error').empty();
    }

    return passed;
}

function validateContract_end(dataStart, dataEnd, model) {
    let passed = true;
    let start = new Date(dataStart);
    let end = new Date(dataEnd);

    if (end && end < start) {
        $('#contract_end-' + model + '-error').html('Debe ser superior a la fecha de inicio');
        passed = false;
    } else {
        $('#contract_end-' + model + '-error').empty();
    }

    return passed;
}