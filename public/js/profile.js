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

function update(data){
    console.log(data);
}