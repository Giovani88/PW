
function notificar(id) {
  
    var opcion = confirm("Seguro de eliminar el perfil?");
  if (opcion == true) {
    var liga = 'eliminar_user.php?s='+id ;
    location.href = liga;
	} else {
	    
	}
}