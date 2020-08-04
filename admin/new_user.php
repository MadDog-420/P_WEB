<?php
include_once('utilities.php');
include_once('../models/db/database_utilities.php');

if( $_POST )
{

  header('Location: index.php');
  //die();
  $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
  $mail = isset( $_POST['correo'] ) ? $_POST['correo'] : '';
  $pass = isset( $_POST['contrasena'] ) ? $_POST['contrasena'] : '';
  $adress = isset( $_POST['direccion'] ) ? $_POST['direccion'] : '';

  addC( $nombre, $mail, $pass, $adress );
  die();

}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Agregar</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/main.css" />
    <script src="./js/vendor/modernizr.js"></script>
  </head>
  <body>
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Agregar nuevo registro</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post" enctype="multipart/form-data">
                
                <div class="row">
                  <div class="large-12 columns">
                    <label>Nombre y Apellido*
                      <input type="text" name="nombre" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Correo*
                      <input type="text" name="correo" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Contraseña*
                      <input type="text" name="contrasena" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Dirección*
                      <textarea name="direccion" rows="3" type="text" value="" placeholder=""></textarea>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-4 columns">
                    <label>
                      <input type="submit" class="button success" value="AGREGAR" />
                    </label>
                  </div>
                </div>

              </form>
            </div>
          </section>
        </div>
      </div>
      <?php require_once('footer.php'); ?>