<?php
if (isset($_POST["registry"])) {
    if(!empty($_POST['correo']) && !empty($_POST['contrasena']))
    {
        //die();
        $nombre=openssl_encrypt( $_POST['nombre'],COD,KEY );
        $correo=openssl_encrypt( $_POST['correo'],COD,KEY );
        $pass=openssl_encrypt( $_POST['contrasena'],COD,KEY );
        $direc=openssl_encrypt( $_POST['direccion'],COD,KEY );
        
        if(signIn( $nombre, $correo, $pass, $direc ))
            echo "<script>$(document).ready(function(){
                    Swal.fire({
                    icon: 'success',
                    title: 'Usuario registrado correctamente!'
                }) })
                </script>";
        else
            echo "<script>$(document).ready(function(){
                    Swal.fire({
                    icon: 'error',
                    title: 'Error en el registro de usuario!'
                }) })
                </script>";
    }
}

if (isset($_POST["entrar"])) {
    if(!empty($_POST['correo_l']) && !empty($_POST['contrasena_l']))
    {
        $correo=openssl_encrypt( $_POST['correo_l'],COD,KEY );
        $pass=openssl_encrypt( $_POST['contrasena_l'],COD,KEY );
        
        if(entrar($correo, $pass)){
            $current_user=$_SESSION['USER'][0];
            $current_user_id=openssl_encrypt( $current_user['id_cliente'],COD,KEY );
            print "<script>Swal.fire('Ingreso exitoso. Bienvenido de nuevo ".$current_user['nombre']."');</script>";
            print "<script>window.location.replace('profile.php?id=".$current_user_id."');</script>";
        } else {
            print "<script>Swal.fire('Usuario o contraseña incorrectos');</script>";
        }
    }
}
?>