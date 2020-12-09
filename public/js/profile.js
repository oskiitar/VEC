/**
 * @description JS profile VEC
 * @author Oscar Rodriguez Sedes
 * @version 1.0
 * @date 03.12.2020
 */

$(function () { // Funcion que se ejecuta cuando carga el documento
    findUser(user);
});

function setUser(data) {
    let options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

    $('#name').val(data.name);
    $('#surname').val(data.surname);
    $('#birthday').val(new Date(data.birthday).toLocaleDateString('es-ES', options));
    $('#tel').val(data.tel);

    if (data.client !== undefined){        
        $('#address').val(data.client.address);
    } else {
        $('#address-group').empty();
    }
}

async function findUser(id) {
    await $.ajax({
        type: "GET",
        url: "perfil/user/" + id,
        success: function (res) {
            setUser(res)
        },
        error: function (e) {
            console.log(e.responseText);
            alertify.error('Fallo el servidor');
        }
    });
}
