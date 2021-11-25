<?php

function get_sidemenu_admin(){
	echo '
		<ul class="sidebar-nav">
			<li class="sidebar-header">
				<i class="align-middle" data-feather="home"></i> <span class="align-middle">Home</span>
				
			</li>
			<li class="sidebar-item active">
			
				<a class="sidebar-link" href="2IP_ADMIN_VIEWS.php">
					<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
				</a>
			</li>
			<li class="sidebar-item">
				<a class="sidebar-link" href="2IP_ADMIN_USER.php">
					<i class="align-middle" data-feather="user"></i> <span class="align-middle">Usuarios</span>
				</a>
			</li>
		</ul>
	';
}


function header_style(){
	echo '	<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
			<meta name="author" content="AdminKit">
			<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
			<link rel="shortcut icon" href="../img/icons/icon-48x48.png" />
			<title>2IP | ADMIN </title>
			<link href="../css/app.css" rel="stylesheet">
			<!-- encabezados -->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
			<script type="text/javascript" src="../plugins/datatable5/jquery-3.5.1.js"></script>
			
			<script type="text/javascript" src="../js/Timeout_login.js"></script>
			<script type="text/javascript" src="../js/2IP_ADMIN_VIEWS.js"></script>
			<!-- styles -->
			<link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
			<link rel="stylesheet" href="../plugins/datatable5/dataTables.bootstrap5.min.css">
			<!-- fullCalendar -->
			<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
			<link rel="stylesheet" href="../plugins/timepicker/jquery.timepicker.css">
			<link rel="stylesheet" href="../plugins/fullcalendar/3.10.0/fullcalendar.css">
			<link rel="stylesheet" href="../plugins/select2/css/select2.css">
			<link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.css">
			<link rel="stylesheet" href="../plugins/fpdf/fpdf.css">
			<link rel="stylesheet" href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css">
			
			';
}
function Footer_style(){
	echo '<div class="container-fluid">
				<div class="row text-muted">
					<div class="col-6 text-start">
						<p class="mb-0">
							<a class="text-muted" href="https://www.sie.gob.gt/portal/" target="_blank"><strong>SIE 2021</strong></a> &copy
						</p>
					</div>
					<div class="col-6 text-end">
						<ul class="list-inline">
							<li class="list-inline-item">
								<a class="text-muted" href="#" target="_blank">Support</a>
							</li>
							<li class="list-inline-item">
						</ul>
					</div>
				</div>
			</div>';
	
}

function library(){
	echo '	<!-- jQuery -->
			<script src="../plugins/html2canvas/html2canvas.min.js"></script>
			<script src="../plugins/html2canvas/html2canvas.js"></script>
			<script src="../plugins/daterangepicker/moment.min.js"></script>
			<script src="../plugins/datatable5/jquery.dataTables.min.js"></script>
			<!-- fullCalendar 2.2.5 -->
			<script src="../plugins/select2/js/select2.js"></script>
			<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
			<script src="../plugins/daterangepicker/daterangepicker.js"></script>
			<script src="../plugins/timepicker/jquery.timepicker.js"></script>
			<script src="../plugins/fullcalendar/moment.min.js"></script>
			<script src="../plugins/fullcalendar/3.10.0/fullcalendar.js"></script>
			<script src="../plugins/fullcalendar/3.10.0/locale/es.js"></script>
			';
}

function Modals(){
	echo '<!-- GENERIC MODAL LG-->
			<div class="modal fade" id="lg_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="lg_modal_title">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body" id="lg_modal_content">
		
						</div>
						<div class="modal-footer" id="lg_modal_footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-primary" id="lg_modal_apply_button"></button>
						</div>
					</div>
				</div>
			</div>
			<!-- GENERIC MODAL XL-->
			<div class="modal fade" id="lg_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="lg_modal_title">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body" id="xl_modal_content">
		
						</div>
						<div class="modal-footer" id="lg_modal_footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-primary" id="lg_modal_apply_button"></button>
						</div>
					</div>
				</div>
			</div>
			<!-- GENERIC MODAL SM-->
			<div class="modal fade" id="lg_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="lg_modal_title">Modal title</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body" id="sm_modal_content">
		
						</div>
						<div class="modal-footer" id="lg_modal_footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-primary" id="lg_modal_apply_button"></button>
						</div>
					</div>
				</div>
			</div>
			';
}

function get_side_logout(){
	echo '	<div class="dropdown-menu dropdown-menu-end">
				<a class="dropdown-item" href="../password_change.php"><i class="align-middle me-1" data-feather="user"></i> Cambiar contraseña</a>
				<a class="dropdown-item" href="../logout.php"><i class="align-middle me-1" data-feather="pie-chart"></i> Cerrar Sesión</a>
			</div>'
		;
}