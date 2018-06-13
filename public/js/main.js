$(".btn-desactive").click(function(){
	swal({
	  title: "¡ Atención !",
	  text: "Estas a punto de desactivar tu cuenta ¿Realmente quieres desactivarla?",
	  icon: "warning",
	  buttons: ["Cancelar", "Si, estoy seguro"],
	  dangerMode: true,
	}).then((willDelete) => {
	  if (willDelete) {
    	

	  		$('.input-disabled').removeAttr('disabled', 'disabled');

	  } else {
    	demo.showNotification('top','right', 'El usuario ha cancelado la acción', 'primary');
  	  }
});
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
