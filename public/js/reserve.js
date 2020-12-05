// Carga del token de session en cabecera AJAX

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () { // Funcion que se ejecuta cuando carga el documento
    getRooms();
});

roomSelected = null;

rooms = null;

function selectRoom(id) {
    roomSelected = parseInt(id);

    let room = rooms.find(obj => obj.id === roomSelected);
    let html = '<cite>' + room.description + '</cite><span class="ml-3">--- Precio / hora --- ' + room.price.toFixed(2) + '€</span>';

    $('#room-specs').html(html);
    validate();
}

function clean() {
    $('#btn-reserve').attr('disabled', true).removeClass('btn-success').addClass('btn-outline-secondary'); // Restaura boton
    $('.btn-secondary').removeClass('btn-danger').removeClass('btn-success').removeAttr('disabled'); // Restaura botones
    $('#schedules').attr('hidden', true); // Oculta el horario
    $('#reserve-date-error').empty(); // Limpia los errores
}

function showEr(value) {
    selectRoom(value);
    $('#list-er-room').removeAttr('hidden');
    $('#list-vr-room').attr('hidden', true);
}

function showVr(value) {
    selectRoom(value);
    $('#list-er-room').attr('hidden', true);
    $('#list-vr-room').removeAttr('hidden');
}

function loadRooms(data) {
    let html_er = "";
    let html_vr = "";

    rooms = data;

    selectRoom(rooms[0].id);

    rooms.forEach(item => {
        if (!item.type) {
            html_er += "<option value='" + item.id + "'>" + item.name + "</option>";
        } else {
            html_vr += "<option value='" + item.id + "'>" + item.name + "</option>";
        }
    });
    $('#er-room').append(html_er);
    $('#vr-room').append(html_vr);
}

function validate() {
    clean();

    sessionStorage.clear(); // Vacia la variable de session

    let dateForm = $('#reserve-date').val();

    if (dateForm) {

        let date = new Date(dateForm); // Fecha seleccionada
        let lastDate = new Date();
        lastDate.setDate(lastDate.getDate() - 1); // ayer

        if (date < lastDate) { // A partir de hoy
            $('#reserve-date-error').html('La fecha debe ser posterior al dia de ayer');
            $('#schedules').attr('hidden', true);

        } else if (date.getDay() !== 1) { // Todos excepto los lunes
            $('#reserve-date-error').empty();
            $('#schedules').removeAttr('hidden');

            if (date.getDay() == 0 || date.getDay() == 5 || date.getDay() == 6) {
                $('#btn22').removeAttr('hidden');
            } else {
                $('#btn22').attr('hidden', true); // Solo fines de semana
            }

            getSchedule(date.getDate()); // Obtiene el horario

        } else {
            $('#reserve-date-error').html('Lunes cerrado por descanso');
            $('#schedules').attr('hidden', true);
        }
    }
}

function changeButtons(data) {
    $.each(data, function (key, value) {
        if (value.start) {
            let hour = new Date(value.start).getHours();
            $('#btn' + hour).addClass('btn-danger').attr('disabled', true);
        }
    });
}

function selectSchedule(n) {
    dateForm = $('#reserve-date').val();

    if (dateForm) {        
        let date = moment(dateForm + ' ' + n + ':00').format('YYYY-MM-DD HH:mm'); // Fecha seleccionada        

        if ($('#btn' + n).hasClass('btn-success')) {
            $('#btn' + n).removeClass('btn-success');
            if (sessionStorage.getItem(date)) {
                sessionStorage.removeItem(date);
            }

        } else {
            $('#btn' + n).addClass('btn-success');
            sessionStorage.setItem(date, roomSelected);
        }

        if (sessionStorage.length > 0) {
            $('#btn-reserve').removeAttr('disabled').removeClass('btn-outline-secondary').addClass('btn-success');
        } else {
            $('#btn-reserve').attr('disabled', true).removeClass('btn-success').addClass('btn-outline-secondary');
        }
    }
}

async function getSchedule(date) {
    let data = { day: date }

    await $.ajax({
        type: "POST",
        url: "reservar/horario",
        data: data,
        success: function (res) {
            changeButtons(res);
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error("Fallo el servidor");
        }
    });
}

async function getRooms() {
    await $.ajax({
        type: "GET",
        url: "reservar/room",
        success: function (res) {
            loadRooms(res);
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    });


}