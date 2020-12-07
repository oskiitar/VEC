var reserve = Object.entries(sessionStorage);
var basket = [];
var user = $('#user_id').val();

// Carga del token de session en cabecera AJAX

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {

    var url = location.pathname;
    $('.nav-item.active').removeClass('active');
    $('.nav-item a[href="' + url + '"]').parent().addClass('active');
    $(this).parent().addClass('active').siblings().removeClass('active');

    if (reserve.length > 0) {

        reserve.forEach(item => {
            let split = item[0].split('/');
            if (split[0] === String(user)) {
                item[0] = split[1];
                basket.push(item);
            }
        });
    }

    if (basket.length > 0) {
        $('.badge').html(basket.length);
    }
});