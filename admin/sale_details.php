<?php
  include_once('utilities.php');
  include_once('../models/db/database_utilities.php');
  $id = isset( $_GET['id'] ) ? $_GET['id'] : '';
  echo "ID:".$id;
  $venta = get_sale_by_id( $id );
  $query = "c.correo, p.nombre, v.cantidad, v.total_neto, v.total_final, v.fecha_vent, p.photo";
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
    <style>
      h4{
        font-size:  16px;
        margin-bottom:  20px;
      }
      img{
        margin-bottom:  20px;
      }
      a{
        color:  #fff;
      }
      a:hover{
        color:  #fff;
        text-decoration:  none;
      }
    </style>
    <div class="row">
 
      <div class="large-9 columns">
        <h3>Registro</h3>
        <div class="section-container tabs" data-section>
          <section class="section">
            <div class="content" data-slug="panel1">
              <form method="post" enctype="multipart/form-data">
                
                <div class="row">
                  <div class="large-12 columns">
                    <label>Cliente
                      <h4><?php echo $venta['correo']; ?></h4>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Producto
                      <h4><?php echo $venta['nombre']; ?></h4>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Cantidad
                      <h4><?php echo $venta['cantidad']; ?></h4>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Total Neto
                      <h4><?php echo $venta['total_neto']; ?></h4>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Total Final
                    <h4><?php echo $venta['total_final']; ?></h4>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Fecha de transacción
                    <h4><?php echo $venta['fecha_vent']; ?></h4>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns"  id="upload">
                      <label>Foto del producto
                      </label>
                  </div>
                  <img class="photo" src="../views/uploads/<?php echo $venta['photo']; ?>">
                </div>

                <div class="row">
                  <div class="large-4 columns">
                    <label>
                      <button class="button alert">
                        <a href="delete.php?id=<?php echo $id;?>&db=ventas">ELIMINAR</a>
                      </button>
                    </label>
                  </div>
                </div>

              </form>
            </div>
          </section>
        </div>
      </div>
      <?php require_once('footer.php'); ?>