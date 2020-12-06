var reserve = Object.entries(sessionStorage);
var basket = [];
var user = $('#user_id').val();

$(function () {

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