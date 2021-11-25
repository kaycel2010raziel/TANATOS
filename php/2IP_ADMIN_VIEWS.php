<?php
	include '../php/default/login_functions.php';
	sec_session_start();
	$user_id = intval(get_eid());
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//CONTEO DE DATOS //
			$NOTIFICACIONES = read("SELECT COUNT(IDNOTIFICACION) AS CONTEO FROM notificacion WHERE FKESTADO IN(11) AND FKUSUARIO_DESTINO=$user_id", $IpDB);
			$CARTEROS = read("SELECT COUNT(IDUSUARIO) AS CONTEO FROM usuario WHERE FKESTADO IN(2) AND FKROL IN(3)", $IpDB);
			$ORDENES_GENERADAS = read("SELECT COUNT(IDORDEN) AS CONTEO FROM orden WHERE FKESTADO IN(6)", $IpDB);
			$ORDENES_ASIGNADAS = read("SELECT COUNT(IDORDEN) AS CONTEO FROM orden WHERE FKESTADO IN(7)", $IpDB);
			$ORDENES_EN_RUTA = read("SELECT COUNT(IDORDEN) AS CONTEO FROM orden WHERE FKESTADO IN(8)", $IpDB);
			$ORDENES_ENTREGADAS = read("SELECT COUNT(IDORDEN) AS CONTEO FROM orden WHERE FKESTADO IN(9)", $IpDB);
			//$SALDO = read("SELECT count(idpedido) as conteo FROM pedido where fkestado in(2);", $IpDB);
			
			$DATA[] = array(
				'NOTIFICACIONES'=> $NOTIFICACIONES[0]['CONTEO'],
				'CARTEROS'=>$CARTEROS[0]['CONTEO'],
				'ORDENES_GENERADAS'=>$ORDENES_GENERADAS[0]['CONTEO'],
				'ORDENES_ASIGNADAS'=>$ORDENES_ASIGNADAS[0]['CONTEO'],
				'ORDENES_EN_RUTA'=>$ORDENES_EN_RUTA[0]['CONTEO'],
				'ORDENES_ENTREGADAS'=>$ORDENES_ENTREGADAS[0]['CONTEO'],
				//'user_id'=>$user_id,
				
			);
			echo json_encode($DATA);
			break;
			
		case 2: //CARGAR LAS NOTIFICACIONES//
			echo json_encode($NOTIFICACIONES = read("SELECT IDNOTIFICACION,HEADER,BODY,FECHA_CREACION,FKESTADO FROM notificacion WHERE FKESTADO IN(11) AND FKUSUARIO_DESTINO=$user_id", $IpDB));
			break;
			
		case 3: //CAMBIAR ESTADO NOTIFICACIONES//
			if(isset($_POST["idnotificacion"])){ $idnotificacion = $_POST["idnotificacion"];}
			$ESTADO_NOTIFICACION = 12;
			$NOTIFICACIONES_UPDATE = write("UPDATE notificacion set FKESTADO=$ESTADO_NOTIFICACION,FECHA_VIEW=CURRENT_TIMESTAMP() WHERE IDNOTIFICACION=$idnotificacion", $IpDB);
			break;
			
	}
?>