<?php 
	include 'php/default/login_functions.php';
	sec_session_start();
	if(!isset($_SESSION['user_id'])){header("Location: logout.php");}
	//if(pwd_change_check() != 1){header("Location: logout.php");}	
?>	

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>FAST |PASSWORD CHANGE</title>

	<link href="css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">2IP | CAMBIO DE CONTRASEÑA</h1>
							<p class="lead">
								Recuerde ingresar una contraseña segura
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="img/avatars/SIEfondo.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="250" height="140" />
									</div>
									<form action="php\default\password_change.php" method="post">
										<div class="form-group has-feedback pt-2">
										  <input name="password1" id="new_Password" type="password" class="form-control" placeholder="Nueva Contraseña">
										</div>
										<div class="form-group has-feedback pt-2">
										  <input name="password2" id="new_Password_Comfirm" type="password" class="form-control" placeholder="Ingrese Nuevamente">
										</div>
										<div class="row">
										  <div class="m-sm-4 text-center" >
											<button type="submit"  onclick="validatePassword(this.form)" class="btn btn-primary btn-lg btn-block">Cambiar Contraseña</button>
										  </div>
										  <!-- /.col -->
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/app.js"></script>
<script>	
	function validatePassword(form) {
		var p1 = document.getElementById('new_Password').value;
		var p2 = document.getElementById('new_Password_Comfirm').value;
		var errors = [];
		if(p1 == p2){
			if (p1.length >= 8) {
				var min = (p1.match(/[a-z]/g) || []).length;
				var may = (p1.match(/[A-Z]/g) || []).length;
				var num = (p1.match(/[0-9]/g) || []).length;
				var esp = (p1.match(/[\.!#%&@~\|]/g) || []).length;
				
				if(min == 0){errors.push("Su contraseña debe contener al menos 1 letra minúscula");}
				if(may == 0){errors.push("Su contraseña debe contener al menos 1 letra mayúscula");}
				if(num == 0){errors.push("Su contraseña debe contener al menos 1 número");}
				if(esp == 0){errors.push("Su contraseña debe contener al menos 1 caracter especial .!@#%&~|");}
				
			} else {
				errors.push("Su contraseña debe tener al menos 8 caracteres");
			}
		} else {
			errors.push("Las contraseñas no son iguales");
		}
			

		if (errors.length > 0) {
			alert(errors.join("\n"));
			return false;
		}
		var p = document.createElement("input");
		form.appendChild(p);
		p.name = "p";
		p.type = "hidden";	
		p.value = hex_sha512(p1);
		document.getElementById('new_Password').value = "";
		document.getElementById('new_Password_Comfirm').value = "";

		form.submit();
	}
</script>

</body>

</html>