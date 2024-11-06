<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Inventarios</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <!-- Libreria Sweetallert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

    <!-- /.login-logo -->
    <body class="hold-transition login-page">
    <div class="login-box">
    <div style="text-align: center;">
    <img width="200" src="https://www.der-windows-papst.de/wp-content/uploads/2019/03/Windows-Change-Default-Avatar.png" alt="imagen_logo";>
    </div>
            
    <br>
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../public/templeates/AdminLTE-3.2.0/index2.html" class="h1"><b>AREA DE </b>INVENTARIOS</a>
            </div>
    <div class="card-body">
      <p class="login-box-msg">USUARIO</p>
      
      <form action="../APP/controllers/login/ingreso.php" method="post">
        <div class="input-group mb-3">
        <input type="email" name = 'email' class="form-control" placeholder="introduzca su Usuario-Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <p class="login-box-msg">CONTRASEÑA</p>
        <div class="input-group mb-3">
        <input type="password" name= 'password_user' class="form-control" placeholder="introduzca su contraseña">
          
            <div class="input-group-text">
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
                       
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <!-- /.col -->
          <div class="col-20">
            <button type="submit" class="btn btn-primary btn-block">ACCEDER</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="card-body">
      <p class="login-box-msg">
        <a href="/APP/public/templeates/AdminLTE-3.2.0/forgot-password.html">olvide mi contraseña</a>
</div>
      </div>
  </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../APP/public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../APP/public/templeates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../APP/public/templeates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>
