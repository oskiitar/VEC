function loadData(model, callback) {
	let url = 'admin/' + model;	
	$.ajax({
		type: "GET",
		url: url,
		success: function (res) {
			alertify.success('Datos cargados');
			callback(res);
		},
		error: function (e) {
			console.log(e.responseText);
			alertify.error("Fallo el servidor");
		}
	});	
}

function saveData(url, datos) {

	$.ajax({
		type: "POST",
		url: url,
		data: datos,
		success: function (res) {
			if (res == 1) {
				$('#table').load('admin/clients');
				alertify.success("Se ha guardado con exito");
			} else {
				alertify.error("Fallo el servidor");
			}
		}
	});

}

function updateData() {

	id = $('#idpersona').val();
	nombre = $('#nombreu').val();
	apellido = $('#apellidou').val();
	email = $('#emailu').val();
	telefono = $('#telefonou').val();

	cadena = "id=" + id +
		"&nombre=" + nombre +
		"&apellido=" + apellido +
		"&email=" + email +
		"&telefono=" + telefono;

	$.ajax({
		type: "POST",
		url: "php/actualizaDatos.php",
		data: cadena,
		success: function (r) {

			if (r == 1) {
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			} else {
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function confirmData(id, tabla) {
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
		function () { eliminarDatos(id, url) }
		, function () { alertify.error('Se cancelo') });
}

function deleteData(id, url) {

	let datos = "id=" + id;

	$.ajax({
		type: "POST",
		url: "php/eliminarDatos.php",
		data: datos,
		success: function (res) {
			if (res == 1) {
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Eliminado con exito!");
			} else {
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}