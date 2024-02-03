new DataTable('#booksTable');


function editBook(id){
    fetch('/getBook/'+id, {
		method: "GET"
	  }).then(function (response) {
		if (response.ok) {
		  return response.json();
		} else {
		  console.log('Respuesta de red OK pero respuesta HTTP no OK');
		  return response.json();
		}
	  }).then(function (data) {
        let datos = JSON.parse(data);
        $('#title').val(datos.title);
        $('#year_publication').val(datos.year_publication);

        $('#author option[value='+datos.author_id+']').attr('selected','selected');
        $('#category option[value='+datos.category_id+']').attr('selected','selected');
        $('#editorial option[value='+datos.editorial_id+']').attr('selected','selected');

        $('#modalBooks').modal('show');
        $('#btnAdd').hide();
        $('#btnEdit').show();
        $('#formBook').prop('action', '/editItem/'+datos.id);
	  }).catch(function (error) {
		console.log('Hubo un problema con la petición Fetch:' + error.message);
	  });
}