<?php
include 'dbconnect.php';

function sec_session_start() {
	date_default_timezone_set('America/Guatemala');	
	$session_name = '2IP_SESSION';
	$secure = false;
	$httponly = true;
	$expiration_time = 43200;
	ini_set('session.use_only_cookies', 1);
	$cookieParams = session_get_cookie_params();
	session_set_cookie_params($expiration_time, $cookieParams["path"], $cookieParams["domain"], $secure, $httponly); 
	session_name($session_name);
	session_start();    
}
function login($username, $password, $conn) {
	if ($stmt = $conn->query("SELECT us.IDUSUARIO,us.CORREO,us.PASSWORD,us.FKESTADO,us.PASSWORD_CHANGE,us.FKROL FROM usuario as us WHERE us.CORREO='$username' and us.FKESTADO in(2) limit 1")) {   
		if($stmt->rowCount() == 1) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$user_id = $result['IDUSUARIO'];
			$username = $result['CORREO'];
			$db_password = $result['PASSWORD'];
			$active = $result['FKESTADO'];
			$ROL = $result['FKROL'];
			$PASSWORD_CHANGE = $result['PASSWORD_CHANGE'];
			$Pages = ($PASSWORD_CHANGE =='1') ? 4 : $ROL;
			if(checkbrute($user_id, $conn) == true) { 
				// Account is locked
				return false;
			} else {				
				if(password_verify($password, $db_password)) {
					//if($active == 1){
					if(true){
						$ip_address = $_SERVER['REMOTE_ADDR'];
						$user_browser = $_SERVER['HTTP_USER_AGENT'];
						$_SESSION['user_id'] = $user_id; 
						$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
						$_SESSION['username'] = $username;
						$_SESSION['FKROL'] = $ROL;
						$_SESSION['login_string'] = hash('sha512', $db_password.$ip_address.$user_browser);
						$conn->query("insert into login_access (user_id,remote_ip,status,login_string)values('$user_id', '$ip_address', 1, '".$_SESSION['login_string']."')");				
						#VERIFICADO EL USUARIO REDIRIGIMOS SEGUN SU ROL
						return intval($Pages); 
					} else {
						// User is not active
						// We record this attempt in the database
						$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
						$conn->query("insert into login_access (user_id,remote_ip,status) values ('$user_id', '$ip_address', 2)");
						return -1;				
					}					
				} else {
					// Password is not correct
					// We record this attempt in the database
					$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
					$conn->query("insert into login_access (user_id,remote_ip,status) values ('$user_id', '$ip_address', 3)");
					return -2;
				}
			}
		} else {
			// No user exists.
			// We record this attempt in the database
			$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
			$conn->query("insert into login_access (user_id,remote_ip,status) values ('$username', '$ip_address', 4)");
			return -3;
		}
	} else {
		return -4;
	}
}

function checkbrute($user_id, $conn) {				/////////TODO
	return false;
}
function get_webbrowser(){
	if(isset($_SERVER['HTTP_USER_AGENT'])){
		return $_SERVER['HTTP_USER_AGENT'];
	}	
}
function get_username() {
	if(isset($_SESSION['username'])){
		return $_SESSION['username'];
	}
}
function get_uid() {
	if(isset($_SESSION['user_id'])){
		return $_SESSION['user_id'];
	}
}
function get_rol_id() {
	if(isset($_SESSION['FKROL'])){
		return $_SESSION['FKROL'];
	}
}
function get_eid() {
	global $IpDB;
	if(isset($_SESSION['user_id'])){
		$eid = read("SELECT IDUSUARIO  FROM usuario where IDUSUARIO='".$_SESSION['user_id']."'", $IpDB);
		if(sizeof($eid) > 0){
			return $eid[0]['IDUSUARIO'];
		} else {
			return 0;
		}
	} else {
		return -1;
	}
}
function login_check() {
	global $IpDB;
	// Check if all session variables are set
	if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {
		$user_id = $_SESSION['user_id'];
		$login_string = $_SESSION['login_string'];
		$username = $_SESSION['username'];
		$ip_address = $_SERVER['REMOTE_ADDR']; // Get the IP address of the user. 
		$user_browser = $_SERVER['HTTP_USER_AGENT']; // Get the user-agent string of the user.
		if ($stmt = $siedb->query("SELECT PASSWORD, ACTIVE FROM GENERAL_MEMBER WHERE USER_ID = '$user_id' LIMIT 1")) {
			if($stmt->rowCount() == 1) { // If the user exists
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				$password = $result['PASSWORD']; // get variables from result.
				$active = $result['ACTIVE'];
				if($active == 1){
					$stmt->fetch();
					$login_check = hash('sha512', $password.$ip_address.$user_browser);
					if($login_check == $login_string) {
					// Logged In!!!!
						return 1;
					} else {
						// Login string doesnt match
						return -10;
					}
				} else {
					// User not active
					return -20;
				}
			} else {
				// User doesnt exist
				return -30;
			}
		} else {
			// System error
			return -40;
		}
	} else {
		// Session not set
		return -50;
	}
}


?>