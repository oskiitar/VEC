/**
 * @description JS reserves VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 23.11.2020
 */

$(function () { // Funcion que se ejecuta cuando carga el documento
    loadReserves(user);
});

function setTable(table) {
    $('#reserves-table').html(table);
}

function downloadFile(response) {
    var blob = new Blob([response], { type: 'application/pdf' })
    var url = URL.createObjectURL(blob);
    location.assign(url);
}

async function loadReserves(user) {

    await $.ajax({
        type: "GET",
        url: "reservas/" + user,
        success: function (res) {
            setTable(res);
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    });
}

async function pdf(reserva) {
    await $.ajax({
        type: "POST",
        url: "reservas/pdf",
        data: reserva,
        success: function (res) {
            console.log(res);
            alertify.success('Descarga realizada')
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    }).done(downloadFile);
}