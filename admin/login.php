<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login | Pear Store</title>
    <link rel="shortcut icon" type="image/png" href="../IMG/pear.png"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Perfil de la empresa">
    <meta name="keywords" content="PearStore.com" />

    <!-- Bootstrap 3.3.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="css/login_style.css" rel="stylesheet" type="text/css" />
    <!-- Font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/b7cb90495e.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  </head>
  <body class="login-page bg-login">
    <div class="login-box">
      <div style="color:#00a65a" class="login-logo">
      <img style="margin: 0 auto" width="100" src="../views/IMG/pear.png">
      </div><!-- /.login-logo -->
      
      <?php
      if (empty($_GET['alert'])) {
        echo "";
      } 
      // alert = 1
      // tampilkan pesan Gagal "usuario con contraseña incorrectos"
      elseif ($_GET['alert'] == 1) {
        echo "<div class='alert alert-danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-times-circle'></i>Error en el ingreso</h4>
                Nombre de usuario o contraseña incorrectos, vuelva a comprobar su nombre de usuario o contraseña.
              </div>";
      }
      // jika alert = 2
      // tampilkan pesan Sukses "Cierre de sesión"
      elseif ($_GET['alert'] == 2) {
        echo "<div class='alert alert-success alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4>  <i class='icon fa fa-check-circle'></i> Bien hecho!</h4>
                Sesión cerrada con éxito.
              </div>";
      }
      ?>
        
      <div class="login-box-body">
        <p class="login-box-msg"><i class="fa fa-user icon-title"></i> Inicio de sesión</p>
        <br/>
        <form action="login_check.php" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Usuario" required />
            <span class="far fa-user form-control-feedback" style="line-height: 34px;"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
            <span class="fas fa-lock form-control-feedback" style="line-height: 34px;"></span>
          </div>
          <br/>
          <div class="row">
            <div class="col-xs-12">
              <input type="submit" class="btn btn-lg btn-block btn-flat" name="login" style="color: #fff; background-color:#015360" value="Ingresar al sistema" />
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>