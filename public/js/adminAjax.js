async function loadData(model, callback) {
	let url = 'admin/' + model;

	await $.ajax({
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

async function saveData(model, data, update) {	
	let url = 'admin/' + model;
	var res = null;

	if (update){
		url = 'admin/' + model +'/update';
	}

	await $.ajax({
		type: "POST",
		url: url,
		data: data,
		success: function () {
			alertify.success('Datos guardados');			
			res = true;
		},
		error: function (e) {
			console.log(e.responseText);
			alertify.error("Fallo el servidor");
		}
	});

	if (res) {
		switch(model){
			case 'client':
				selectClients();
				break;
			case 'employee':
				selectEmployees();
		}
	}
}

function confirmDelete(model, id) {
	alertify.confirm('Eliminar', '¿Eliminar estos datos?'
		, function () { deleteData(model, id) }
		, function () { alertify.error('Cancelado') });
}

async function deleteData(model, id) {
	let url = 'admin/user/' + id;
	var res = null;

	await $.ajax({
		type: "GET",
		url: url,
		success: function () {
			alertify.success('Datos eliminados');
			res = true;
		},
		error: function (e) {
			console.log(e.responseText);
			alertify.error("Fallo el servidor");
		}
	});

	if (res) {
		switch(model){
			case 'client':
				selectClients();
				break;
			case 'employee':
				selectEmployees();
		}
	}
}