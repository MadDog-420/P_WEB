<?php
/* Agrega conexion a la base de datos*/
include_once('utilities.php');
include_once('../models/db/database_utilities.php');

// datos enviados desde el formulario de inicio de sesion
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));

// asegúrese de que el nombre de usuario y la contraseña es en forma de letras o números.
if (!ctype_alnum($username) OR !ctype_alnum($password)) {
	header("Location: login.php?alert=1");
}
else {
	// comprobación de los datos
	$query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE username='$username' AND password='$password'")
									or die('Error identificando al usuario: '.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	// Si los datos estan correctos, entonces inicio sesion
	if ($rows > 0) {
		$current_user  = mysqli_fetch_assoc($query);

		session_start();
		
		$_SESSION['USER'][0]=$current_user;
		
		// Redirecciona a la pagina principal
		header("Location: index.php");
	}

	// Sino existen los datos entonces envio de nuevo al login mostrando un error alert=1
	else {
		header("Location: login.php?alert=1");
	}
}
?>