$(".form-delete").on('submit', function(ev){
	ev.preventDefault();

	var $form = $(this);
	var $button = $form.find("[type='submit']");
	var $icon = $form.find("#icon");
	var $row = $form.parents('tr');
	//Petición AJAX

	swal({
	  title: "¡ Atención !",
	  text: "¿Esta seguro que desea eliminar este elemento?",
	  icon: "warning",
	  buttons: ["Cancelar", "Eliminar"],
	  dangerMode: true,
	}).then((willDelete) => {
	  if (willDelete) {
	   		ajax($form,$icon,$row);
	  } else {
    	demo.showNotification('top','right', 'El usuario ha cancelado la acción', 'primary');
  	  }
});
return false;
});


function ajax($form, $icon, $row)
{
	$.ajax({

		url: $form.attr('action'),
		method: $form.attr('method'),
		data: $form.serialize(),
		dataType:"JSON",
		beforeSend: function(){
			$icon.attr('class','fas fa-spinner fa-spin');
		},
		success: function(data){
			setTimeout(function(){
				$row.fadeOut('slow');
				demo.showNotification('top','right', data.flash, 'success');
			},2000);
		},
		error: function(){
			console.log();
			$icon.attr('class', 'fab fa-times');
		},

	});
}



/*Revocar permisos*/
$(".form-revoke").on('submit', function(ev){
	ev.preventDefault();

	var $form = $(this);
	var $button = $form.find("[type='submit']");
	var $icon = $form.find(".icon");
	var $checkbox = $form.parents('checkbox');
	//Petición AJAX

	swal({
	  title: "¡ Atención !",
	  text: "¿Esta seguro que desea revocar estos permisos?",
	  icon: "warning",
	  buttons: ["Cancelar", "Eliminar"],
	  dangerMode: true,
	}).then((willDelete) => {
	  if (willDelete) {
	   		
	  	$.ajax({
	  		url: $form.attr('action'),
			method: $form.attr('method'),
			data: $form.serialize(),
			dataType:"JSON",
	  		beforeSend: function(){
				$icon.attr('class','fas fa-spinner fa-spin');
			},
			success: function(data){
				setTimeout(function(){
					demo.showNotification('top','right', data.flash, 'success');
				},2000);

				setTimeout(function(){

					location.reload();
					
				},5000);

			},
			error: function(){
				console.log();
				$icon.attr('class', 'fab fa-times');
			},
	  	});

	  } else {
    	demo.showNotification('top','right', 'El usuario ha cancelado la acción', 'primary');
  	  }
});
return false;
});