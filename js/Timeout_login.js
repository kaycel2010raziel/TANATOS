$(document).ready(function(){
	
	TiempoActividad();
});
	function TiempoActividad(){
		setTimeout("DestruirSesion()", 600000);
	}
	function DestruirSesion(){
		location.href = "../logout.php";
	}