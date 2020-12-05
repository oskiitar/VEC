// Carga del token de session en cabecera AJAX

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function setCookie(cname, cvalue, exdays) { // Funcion que guarda cookies
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) { // Funcion que recupera cookies
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function delete_cookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }

var reserve = Object.entries(sessionStorage); // Array que contiene toda la reserva

var payment = null; // Metodo de pago

var total = 0; // Total del pago

$(function () { // Funcion que se ejecuta cuando carga el documento
    if (reserve.length > 0) {
        $('.badge').html(reserve.length);

        if (!reserve.find(array => typeof array === 'object')) {
            reserve.push(new Date());
        }

        if (!getCookie('reserva')) {
            let date = moment().format('YYYY-MM-DD HH:mm');
            setCookie('reserva', date, 1);
        }

        getReserve();
        getPayment();

    } else {
        $('#btn-pay').attr('hidden', true);
        $('#selectPay').attr('hidden', true);
        $('#noReserves').html('No hay nada por aqui...');
    }
});

async function getReserve() {
    let url = 'room/' + reserve[0][1];
    total = 0; // precio total de la reserva
    let data = await $.ajax({
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

async function getPayment() {
    let data = await $.ajax({
        type: "GET",
        url: "/reservar/metodos",
        success: function (res) {
            return res;
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    });

    payment = data[0].id;

    data.forEach(item => {
        let html = '<option value="' + item.id + '">' + item.name + '</option>'
        $('#payment').append(html);
    });
}

function selectPay(value) {
    payment = value;
}

/**
 * 
 * @param {*} user 
 */
async function pay(user) {
    let data = {
        client: user,
        payway: payment,
        total: total,
        rentings: reserve,
        dateReserve: getCookie('reserva')
    }

    console.log(data);

    await $.ajax({
        type: "POST",
        url: "/reservar/pagar",
        data: data,
        success: function (res) {
            console.log(res);
            alertify.success('La reserva se realizado con exito');
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    });
}