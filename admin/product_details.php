<?php
  include_once('utilities.php');
  include_once('../models/db/database_utilities.php');
  $id = isset( $_GET['id'] ) ? $_GET['id'] : '';
  if( $_POST )
  {
    header('Location: index.php');
    //die();
    $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
    $precio = isset( $_POST['precio'] ) ? $_POST['precio'] : '';
    $description = isset( $_POST['description'] ) ? $_POST['description'] : '';
    $stock = isset( $_POST['stock'] ) ? $_POST['stock'] : '';
    $photo = isset( $_POST['photo'] ) ? $_POST['photo'] : '';

    $statusMsg = '';
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
    }

    // Display status message
    echo $statusMsg;
    echo $photo;

    updateP( $id, $nombre, $precio, $description, $stock, $photo);
    die();

  }

  $producto = get_product_by_id( $id );
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
              <form method="post" enctype="multipart/form-data">
                
                <div class="row">
                  <div class="large-12 columns">
                    <label>Nombre
                      <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Precio
                      <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Stock
                      <input type="text" name="stock" value="<?php echo $producto['stock']; ?>" placeholder="" />
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns">
                    <label>Descripción
                      <textarea name="description" rows="10" type="text" value="" placeholder=""><?php echo $producto['descripcion']; ?></textarea>
                    </label>
                  </div>
                </div>

                <div class="row">
                  <div class="large-12 columns"  id="upload">
                      <label>Foto del producto
                        <input type="hidden" name="photo" value="<?php echo $producto['photo']; ?>" placeholder="" />
                        <input type="file" name="file" id="fileInput" />
                      </label>
                  </div>
                  <img class="photo" src="../views/uploads/<?php echo $producto['photo']; ?>">
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