$(document).ready(function(){
	CargarConteos();
	CargarNotificaciones();
	setInterval(
		function(){
			CargarConteos();
			CargarNotificaciones();
		},8000
	);
});

function CargarConteos(){
	$.ajax({type: "POST", url: "../php/2IP_ADMIN_VIEWS.php", async: true , data: {'a0': 1}})
	.done(function(stream) {	
		data = jQuery.parseJSON(stream);
		console.log(data);
		$('.indicator').html(data[0]['NOTIFICACIONES']);
		$('#enviosG').html(data[0]['ORDENES_GENERADAS']);
		$('#enviosA').html(data[0]['ORDENES_ASIGNADAS']);
		$('#enviosR').html(data[0]['ORDENES_EN_RUTA']);
		$('#enviosE').html(data[0]['ORDENES_ENTREGADAS']);
		$('#show_notification').html(data[0]['NOTIFICACIONES']);
	}); 
}

function CargarNotificaciones(){
	$.ajax({type: "POST", url: "../php/2IP_ADMIN_VIEWS.php", async: true , data: {'a0': 2}})
	.done(function(stream) {	
		data = jQuery.parseJSON(stream);
		//console.log(data);
		$("#list_Notification_data").empty();
		data.forEach(function(element, index, array){
			$("#list_Notification_data").append(""+
			"<li class='list-group-item'>"+
			"	<div class='card'>"+
			"		<div class='card-body'>"+
			"			<h5 class='card-title'>"+element['HEADER']+"</h5>"+
			"			<p class='card-text'>"+element['BODY']+"</p>"+
			"			<div class='d-grid gap-2'>"+
			"				<button class='btn btn-danger close' type='button'  idnotificacion="+element['IDNOTIFICACION']+">Cerrar</button>"+
			"			</div>"+
			"		</div>"+
			"	</div>"+
			
			"</li>");
		});
		
		$('.close').click(function(){
			var idnotificacion = $(this).attr("idnotificacion");
			$.ajax({type: "POST", url: "../php/2IP_ADMIN_VIEWS.php.php", async: true , data: {'a0': 3,idnotificacion:idnotificacion}})
			.done(function(stream) {	
				location.reload();
			}); 
		}); 
	}); 
}

	