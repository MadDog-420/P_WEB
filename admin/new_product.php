<?php
include_once('utilities.php');
include_once('../models/db/database_utilities.php');

if( $_POST )
{
  header('Location: index.php');
  //die();
  $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
  $precio = isset( $_POST['precio'] ) ? $_POST['precio'] : '';
  $description = isset( $_POST['description'] ) ? $_POST['description'] : '';
  $stock = isset( $_POST['stock'] ) ? $_POST['stock'] : '';

  $statusMsg = '';
  $photo="40022.png";
  $targetDir = "../views/uploads/";

  if(!empty($_FILES["file"]["name"])){
      // Allow certain file formats
      $allowTypes = array('jpg','png','jpeg','gif','pdf');
      // File upload path
      $fileName = basename($_FILES["file"]["name"]);
      $targetFilePath = $targetDir . $fileName;
      $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

      if(in_array($fileType, $allowTypes)){
            // Upload file to server
          if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
              $photo=$fileName;
          }else{
                $statusMsg = "Sorry, there was an error uploading your file.";
          }
      }else{
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
      }
  }else{
    $statusMsg = 'Please select a file to upload.';
  }

  // Display status message
  echo $statusMsg;

  addP( $nombre, $precio, $description, $stock, $photo );
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
                    <label>Nombre*
                      <input type="text" name="nombre" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Precio*
                      <input type="text" name="precio" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Stock*
                      <input type="text" name="stock" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Descripción*
                      <textarea name="description" rows="10" type="text" value="" placeholder=""></textarea>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns"  id="upload">
                      <label>Foto del producto
                        <input type="file" name="file" id="fileInput" />
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