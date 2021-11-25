<?php 
	include '../php/default/login_functions.php';
	include '_sidemenu.php';
	sec_session_start();
	if (isset($_SESSION['user_id'])){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		$rol_id = get_rol_id();
		if($rol_id==1){
			$user_id = get_eid();
			$name_query = read("SELECT concat(persona.NOMBRE,' ',persona.APELLIDO) as USUARIO, rol.FOTO, rol.NOMBRE as ROL FROM usuario AS US join rol on rol.IDROL=US.FKROL join persona on persona.IDPERSONA=US.FKPERSONA WHERE US.FKPERSONA=$user_id",$IpDB);
			$name = (sizeof($name_query) > 0 ? $name_query[0]['USUARIO'] : 'undefined');
			$rol = (sizeof($name_query) > 0 ? $name_query[0]['ROL'] : 'undefined');
			$foto = (sizeof($name_query) > 0 ? "../img/user/".$name_query[0]['FOTO'] : '../img/user/AdminLTELogo.png');
			//echo json_encode($user_id);
		
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php echo header_style();?>
		<script src="../js/app.js"></script>
		<script type="text/javascript" src="../js/2IP_ADMIN_USER.js"></script>
	</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="2IP_ADMIN_VIEWS.php">
					<!--<img src="../img/logos/logoFast.jpg" class="avatar img-fluid rounded me-1 img-circle elevation-3" alt="Charles Hall" />--><span class="align-middle">2IP | <span><?php echo $rol;?></span>
				</a>
				<?php echo get_sidemenu_admin();?>
			</div>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
					<i class="hamburger align-self-center"></i>
				</a>
				<a class="" id='nav_button'>
					<!-- BUTTONS NAVS-->
				</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator"></span>
								</div>
							</a>
							<div class="dropdown-menu p-4 text-muted" style="width: 250px;">
								<div class="dropdown-menu-header">
									<label id='show_notification'></label> Nueva Notificacion
								</div>
								<ul class="list-group" id='list_Notification_data'>
									
								</ul>
							
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Mostar notificaciones</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="<?php echo $foto; ?>" class="avatar img-fluid rounded me-1" alt="Charles Hall" /> <span class="text-dark"><?php echo $name; ?></span>
							</a>
							<?php echo get_side_logout();?>
						</li>
					</ul>
				</div>
			</nav>
			<main class="content">
				<div class="container-fluid p-0" id="table_User">
					<!--TABLE USER-->
				</div>
				<div class="container-fluid p-0" id="modals">
				 <?php echo Modals();?>
				</div>
				<!-- Modal -->
			</main>
			<footer class="footer">
				<?php echo Footer_style();?>
			</footer>
		</div>
	</div>
	<?php echo library();?>
</body>
</html>
<?php 
	}else{
		$rol_id = get_rol_id();
		switch ($rol_id){
			case 0:
					header("Location: ../index.php");
					exit();
					break;
			case 1: 
					header("Location: pages/2IP_ADMIN_VIEWS.php");
					exit();
					break;
			case 2:
					header("Location: ../index.php");
					exit();
					break;
			case 3:
					header("Location: ../index.php");
					exit();
					break;
			default:header("Location: ../index.php");
					exit();
			
		}
	}
}else{
	header("Location: ../index.php");
}

?>