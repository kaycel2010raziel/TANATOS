<?php
	include 'login_functions.php';
	sec_session_start();
	if(isset($_POST['email'], $_POST['p'])) {
		$username = $_POST['email'];
		$password = $_POST['p'];
		$result = login($username, $password, $IpDB);
		
		switch ($result){
			case 0:
					header("Location: ../../index.php");
					exit();
					break;
			//ADMINISTRADOR DEL SISTEMA 2IP//		
			case 1: 
					header("Location: ../../pages/2IP_ADMIN_VIEWS.php");
					exit();
					break;
			case 2:
					header("Location: ../../index.php");
					exit();
					break;
			case 3:
					header("Location: ../../index.php");
					exit();
					break;
			case 4:
				header("Location: ../../password_change.php?e=$result");
				break;
			default:header("Location: ../../index.php");
					exit();
			
		}
	}
	
//header(($result == "" || $result == 2 ? "Location: ../../pages/TOWER_OPERADOR.html" : "Location: ../../pages/TOWER_ADMIN.html"));
?>