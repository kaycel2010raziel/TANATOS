<?php 
	include 'php/default/dbconnect.php';
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	
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
    <title>Sign In |2IP </title>
    <link href="css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="css/agency.min.css" rel="stylesheet">
	  <script src="plugins/jquery/jquery.min.js"></script>
	  <script type="text/javascript" src="js/login_sha512.js"></script>
	  <script type="text/javascript" src="js/login_forms.js"></script>
	  <script type="text/javascript" src="js/CONSULTAS.js"></script>
	  
  </head>

<body>
  <main class="d-flex w-100">
    <div class="container d-flex flex-column">
      <div class="row vh-100">
        <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
          <div class="d-table-cell align-middle">

            <div class="text-center mt-4">
              <h1 class="h2">Login | 2IP</h1>
              <p class="lead">
                Inicie sesión en su cuenta para continuar
              </p>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="m-sm-4">
                  <div class="text-center">
                    <img src="img/avatars/SIEfondo.jpg" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
                  </div>
                  <form action="php\default\login_process.php" method="post">
                      <div class="mb-3">
                         <label class="form-label">Email</label>
                          <input class="form-control form-control-lg" type="email" name="email" placeholder="Ingrese su Correo" />
                      </div>
                      <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control form-control-lg" type="password" name = "password" placeholder="Ingrese su Contraseña" />
                      </div>
                    <div>
                    </div>
                     <div class="row text-center">
                      <div class="col-12">
                        <button type="submit" onclick="formhash(this.form, this.form.password);" class="btn btn-info btn-block btn-flat">Ingresar</button>
                      </div>
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
</body>
</html>