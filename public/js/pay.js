async function getReserve() {
    let url = 'pagar/' + reserve[0][1];
    var data = null;
    let total = 0; // precio total de la reserva
    data = await $.ajax({
        type: "GET",
        url: url,
        success: function (res) {
            return res;
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    });

    reserve.forEach(item => {
        let date = new Date(item[0]);
        total += data.price;
        let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        let text = '<p>Sala: ' + item[1] + ' -- Fecha: ' + date.toLocaleDateString('es-ES', options);
        text += ' -- Hora: ' + ('00' + date.getHours()).slice(-2) + ':' + ('00' + date.getMinutes()).slice(-2);
        text += '-- Precio: ' + data.price.toFixed(2) + '€</p>';
        $('#data-pay').append(text);
    });
    let text = '<p>Total a pagar..... ' + total.toFixed(2) + '€</p>'

    $('#total-pay').append(text);
}

function pay(){
    alertify.success('La reserva ha sido pagada');
}