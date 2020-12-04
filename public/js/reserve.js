var roomSelected = 1;

function val(value){
    roomSelected = value;
}

function clean() {
    $('#btn-reserve').attr('disabled', true).removeClass('btn-success').addClass('btn-outline-secondary'); // Restaura boton
    $('.btn-secondary').removeClass('btn-danger').removeClass('btn-success').removeAttr('disabled'); // Restaura botones
    $('#schedules').attr('hidden', true); // Oculta el horario
    $('#reserve-date-error').empty();
}

function showEr(value) {
    roomSelected = value;
    $('#list-er-room').removeAttr('hidden');
    $('#list-vr-room').attr('hidden', true);
    $('#reserve-date').val('');
    clean();
}

function showVr(value) {
    roomSelected = value;
    $('#list-er-room').attr('hidden', true);
    $('#list-vr-room').removeAttr('hidden');
    $('#reserve-date').val('');
    clean();
}

function validate() {
    console.log(roomSelected);
    clean();

    sessionStorage.clear(); // Vacia la variable de session

    let date = new Date($('#reserve-date').val()); // Fecha seleccionada
    let lastDate = new Date();
    lastDate.setDate(lastDate.getDate() - 1); // ayer

    if (date < lastDate) { // A partir de hoy
        $('#reserve-date-error').html('La fecha debe ser posterior al dia de ayer');
        $('#schedules').attr('hidden', true);

    } else if (date.getDay() !== 1) { // Excepto los lunes
        $('#reserve-date-error').empty();
        $('#schedules').removeAttr('hidden');

        if (date.getDay() == 0 || date.getDay() == 5 || date.getDay() == 6) {
            $('#btn22').removeAttr('hidden');
        } else {
            $('#btn22').attr('hidden', true);
        }

        getSchedule(date.getDate());

    } else {
        $('#reserve-date-error').html('Lunes cerrado por descanso');
        $('#schedules').attr('hidden', true);
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
    let date = new Date($('#reserve-date').val()); // Fecha seleccionada
    date.setHours(n);

    if ($('#btn' + n).hasClass('btn-success')) {
        $('#btn' + n).removeClass('btn-success');
        if (sessionStorage.getItem(date)) {
            sessionStorage.removeItem(date);
        }

    } else {
        $('#btn' + n).addClass('btn-success');
        sessionStorage.setItem(date, 'room_' + roomSelected);
    }

    if (sessionStorage.length > 0) {
        $('#btn-reserve').removeAttr('disabled').removeClass('btn-outline-secondary').addClass('btn-success');
    } else {
        $('#btn-reserve').attr('disabled', true).removeClass('btn-success').addClass('btn-outline-secondary');
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