<?php
  include_once('utilities.php');
  include_once('../models/db/database_utilities.php');

  $id = isset( $_GET['id'] ) ? $_GET['id'] : '';

  if( $_POST )
  {
    header('Location: index.php');
    //die();
    $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
    $mail = isset( $_POST['correo'] ) ? $_POST['correo'] : '';
    $pass = isset( $_POST['contrasena'] ) ? $_POST['contrasena'] : '';
    $adress = isset( $_POST['direccion'] ) ? $_POST['direccion'] : '';

    echo $mail;
    updateC( $id, $nombre, $mail, $pass, $adress );
    die();

  }

  $cliente = get_client_by_id( $id );
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detalles</title>
    <link rel="stylesheet" href="css/foundation.css"/>
    <link rel="stylesheet" href="css/main.css"/>
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Modifica registro</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post">
                
              <div class="row">
                  <div class="large-12 columns">
                    <label>Nombre y Apellido
                      <input type="text" name="nombre" value="<?php echo $cliente['nombre'];?>" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Correo
                      <input type="text" name="correo" value="<?php echo $cliente['correo'];?>" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Contraseña
                      <input type="text" name="contrasena" value="<?php echo $cliente['contrasena'];?>" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Dirección
                      <textarea name="direccion" rows="3" type="text" value="" placeholder=""><?php echo $cliente['direccion'];?></textarea>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-4 columns">
                    <label>
                      <input type="submit" class="button success" value="MODIFICAR" />
                    </label>
                  </div>
                </div>

              </form>
            </div>
          </section>
        </div>
      </div>
      <?php require_once('footer.php'); ?>