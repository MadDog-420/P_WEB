<?php
if( $_POST )
  {
    if (isset($_POST["logout"])) {
      unset($_SESSION['USER'][0]);
      unset($_SESSION['CARRITO']);
      print "<script>window.location.replace('login.php');</script>";
      session_destroy();
      die();
    }
    if (isset($_POST["updatepass"])) {
      if(!empty($_POST['contrasena_O']) && !empty($_POST['contrasena_N']))
      {
        $contrasena_O=openssl_encrypt( $_POST['contrasena_O'],COD,KEY );
        $contrasena_N=openssl_encrypt( $_POST['contrasena_N'],COD,KEY );

        updatePass( $id, $contrasena_O, $contrasena_N);
      }
    }
    if (isset($_POST["save"])) {
        //die();
        $nombre = isset( $_POST['nombre'] ) ? $_POST['nombre'] : '';
        $direccion = isset( $_POST['direccion'] ) ? $_POST['direccion'] : '';
        
        $photo = isset( $_POST['photo'] ) ? $_POST['photo'] : '';

        $statusMsg = '';
        $targetDir = "uploads/";

        if(!empty($_FILES["img"]["name"])){
        // Solo permite estos tipos
        $allowTypes = array('jpg','png','jpeg','gif','pdf');
        // Ruta de guardado del archivo
        $fileName = basename($_FILES["img"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(in_array($fileType, $allowTypes)){
            // Cargar archivo al servidor
            if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
                // Define el nombre del archivo en la bd
                $photo=$fileName;
            }else{
                $statusMsg = "Ups. Ocurrió un problema al cargar tu archivo.";
                print "<script>alert('".$statusMsg."')</script>";
            }
        }else{
            $statusMsg = 'Solo formatos JPG, JPEG, PNG, GIF, & PDF están permitidos';
            print "<script>alert('".$statusMsg."')</script>";
        }
        } else {
            $statusMsg = 'Por favor, seleccione un archivo.';
        }
        updateAccount( $id, $nombre, $direccion, $photo );
    }
  }