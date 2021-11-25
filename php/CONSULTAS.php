<?php
	include 'default/dbconnect.php';
	if(isset($_POST["a0"])){$ACTION = $_POST["a0"];}else{if(isset($_GET["a0"])){$ACTION = $_GET["a0"];}else{exit();};}
	switch($ACTION){
		case 1:	//CONTEO DE DATOS //
			$USUARIOS = read("SELECT COUNT(ID_USUARIO) AS CONTEO FROM USUARIO WHERE USUARIO.FK_ESTADO NOT IN(2)", $IpDB);
			$INSTITUCIONES = read("SELECT COUNT(ID_INSTITUCION) AS CONTEO  FROM INSTITUCION WHERE INSTITUCION.FK_ESTADO NOT IN(2)", $IpDB);
			$EVENTOS = read("SELECT COUNT(ID_EVENTO) AS CONTEO FROM EVENTO WHERE EVENTO.FK_ESTADO NOT IN(2)", $IpDB);
			
			$DATA[] = array(
				'USUARIOS'=> $USUARIOS[0]['CONTEO'],
				'INSTITUCION'=>$INSTITUCIONES[0]['CONTEO'],
				'EVENTOS'=>$EVENTOS[0]['CONTEO'],
			);
			echo json_encode($DATA);
			break;
			
	}
?>