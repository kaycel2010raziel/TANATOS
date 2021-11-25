<?php
include 'login_functions.php';

sec_session_start();

if(isset($_POST['p'])) {
	$p1 = $_POST['p'];
	$uid = get_eid($IpDB);	
	$pf = password_hash($p1, PASSWORD_BCRYPT);	
	$MOD_PASSWORD = write("UPDATE usuario AS US SET US.PASSWORD='$pf',US.PASSWORD_CHANGE=0 WHERE US.IDUSUARIO=$uid", $IpDB);
	header("Location: ../../index.php");
}

?>