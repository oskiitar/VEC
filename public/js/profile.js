// Carga del token de session en cabecera AJAX

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () { // Funcion que se ejecuta cuando carga el documento
    let id = $('#user-id').val();
    findUser(id);
});

function setUser(data) {
    $('#name').val(data.name);
    $('#surname').val(data.surname);
    $('#birthday').val(data.birthday);
    $('#tel').val(data.tel);

    if (data.client.address){
        $('#address').val(data.client.address);
    }
    
    if (data.client.address){
        $('#address').val(data.client.address);
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

async function updateUser() {

}