<?php
require_once('database_credentials.php');
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
$result = '';
if( $mysqli->connect_errno )
{
	echo 'Error en la conexión';
	exit;
}

//Mostrar tablas
function run_query($tab)
{
	global $mysqli, $result;
	$sql = "SELECT * FROM {$tab}";
	return $mysqli->query($sql);
}
//Mostrar tablas con parámetros
function run_query_esp($tab,$param1,$param2,$param3,$param4)
{
	global $mysqli, $result;
	$sql = "SELECT * FROM {$tab} {$param1} {$param2} {$param3} {$param4}";
	return $mysqli->query($sql);
}
//Añadir producto
function addP( $nombre, $precio, $description, $stock, $photo )
{
	global $mysqli;
	$sql = "INSERT INTO productos (id_producto, nombre, precio, descripcion, stock, photo) VALUES (null, '{$nombre}','{$precio}', '{$description}','{$stock}','{$photo}')";
	if($mysqli->query($sql)){
		return true;
	} else {
		return false;
	}

}
//Añadir cliente
function addC( $nombre, $correo, $contrasena, $direccion )
{
	global $mysqli;
	$sql = "INSERT INTO clientes (id_cliente, nombre, correo, contrasena, direccion) VALUES (null, '{$nombre}','{$correo}', '{$contrasena}','{$direccion}')";
	if($mysqli->query($sql)){
		return true;
	} else {
		return false;
	}

}
//Login clientes
function entrar($email, $pass)
{
	$email=openssl_decrypt( $email,COD,KEY );
	$pass=openssl_decrypt( $pass,COD,KEY );
	global $mysqli;
	$sql="SELECT * FROM `clientes` WHERE `correo` LIKE '{$email}' AND `contrasena` LIKE '{$pass}'";
	$result = $mysqli->query($sql);
	
	if( $result->num_rows ){

		if(!isset($_SESSION['USER'])){

			$user=$result->fetch_assoc();

			$_SESSION['USER'][0]=$user;
			return true;
		} else {

			$user=$result->fetch_assoc();
	
			$_SESSION['USER'][0]=$user;
			return true;
		}
	} else {
		return false;
	}

}
//Nueva cuenta clientes
function signIn( $nombre, $correo, $contrasena, $direccion )
{
	$nombre=openssl_decrypt( $nombre,COD,KEY );
	$correo=openssl_decrypt( $correo,COD,KEY );
	$contrasena=openssl_decrypt( $contrasena,COD,KEY );
	$direccion=openssl_decrypt( $direccion,COD,KEY );
	global $mysqli;
	$sql = "INSERT INTO clientes (id_cliente, nombre, correo, contrasena, direccion) VALUES (null, '{$nombre}','{$correo}', '{$contrasena}','{$direccion}')";
	if($mysqli->query($sql)){
		return true;
	} else {
		return false;
	}

}
//Actualizar cuenta
function updateAccount( $id, $nombre, $direccion, $photo){
	global $mysqli;
	$sql = "UPDATE clientes SET nombre = '{$nombre}', direccion = '{$direccion}', photo = '{$photo}' WHERE `clientes`.`id_cliente` = {$id}";
	$mysqli->query( $sql );
}
//Actualizar contraseña
function updatePass( $id, $contrasena_O, $contrasena_N){
	$contrasena_O=openssl_decrypt( $contrasena_O,COD,KEY );
    $contrasena_N=openssl_decrypt( $contrasena_N,COD,KEY );
	global $mysqli;
	$sql="SELECT * FROM `clientes` WHERE `id_cliente` LIKE '{$id}' AND `contrasena` LIKE '{$contrasena_O}'";
	$result = $mysqli->query($sql);
	if( $result->num_rows ){
		$sql = "UPDATE clientes SET contrasena = '{$contrasena_N}' WHERE `clientes`.`id_cliente` = {$id}";
		$mysqli->query( $sql );
		echo "<script>Swal.fire('Contraseña actualizada');</script>";
	} else {
		echo "<script>Swal.fire('Contraseña incorrecta');</script>";
	}
}
//Actualizar producto
function updateP( $id, $nombre, $precio, $description, $stock, $photo )
{
	global $mysqli;
	$sql = "UPDATE productos SET nombre = '{$nombre}', precio = '{$precio}', descripcion = '{$description}', stock = '{$stock}', photo = '{$photo}' WHERE `productos`.`id_producto` = {$id}";
	$mysqli->query( $sql );
}
//Actualizar cliente
function updateC( $id, $nombre, $correo, $contrasena, $direccion )
{
	global $mysqli;
	$sql = "UPDATE clientes SET nombre = '{$nombre}', correo = '{$correo}', contrasena = '{$contrasena}', direccion = '{$direccion}', photo = '{$photo}' WHERE `clientes`.`id_cliente` = {$id}";
	$mysqli->query( $sql );
}
//Eliminar objeto de cualquier tabla
function delete( $id, $db )
{
	global $mysqli;

	switch ($db){
		case "productos":	$sql = "DELETE FROM productos WHERE id_producto = {$id}";
		break;
		case "clientes":	$sql = "DELETE FROM clientes WHERE id_cliente = {$id}";
		break;
		case "ventas":		$sql = "DELETE FROM ventas WHERE id_venta = {$id}";
		break;
	}

	$mysqli->query($sql);
}
//Obtener producto por ID
function get_product_by_id( $id )
{
	global $mysqli;
	echo "ID: $id";
	$sql = "SELECT * FROM `productos` WHERE `id_producto` = {$id}";
	$result = $mysqli->query($sql);
	if( $result->num_rows )
		return $result->fetch_assoc();
	else
		echo "<script>Swal.fire('Error de identificación');</script>";
}
//Obtener cliente por ID
function get_client_by_id( $id )
{
	global $mysqli;
	$sql = "SELECT * FROM `clientes` WHERE `id_cliente` = {$id}";
	$result = $mysqli->query($sql);
	if( $result->num_rows )
		return $result->fetch_assoc();
	else
	 	echo "<script>Swal.fire('Error de identificación');</script>";
}
//Obtener ventas por ID
function get_sale_by_id( $id )
{
	global $mysqli;
	$sql = "SELECT c.correo, p.nombre, v.cantidad, v.total_neto, v.total_final, v.fecha_vent, p.photo
				FROM `ventas` AS v
				INNER JOIN `clientes` AS c
    			ON v.id_cliente = c.id_cliente
				INNER JOIN `productos` AS p
    			ON v.id_producto = p.id_producto
				WHERE `id_venta` = {$id}";
	$result = $mysqli->query($sql);
	if( $result->num_rows )
		return $result->fetch_assoc();
	else
	 	echo "<script>Swal.fire('Error de identificación');</script>";
}
//Realizar compra
function comprar(){
	$user=$_SESSION['USER'][0];
	foreach($_SESSION['CARRITO'] as $indice=>$producto){
		global $mysqli;
		$total_f=$producto['PRECIO']*$producto['CANTIDAD'];
		$sql = "INSERT INTO `ventas`(`id_cliente`, `id_producto`, `cantidad`, `total_neto`, `total_final`, `fecha_vent`, `id_venta`) 
		VALUES ('{$user['id_cliente']}','{$producto['ID']}', '{$producto['CANTIDAD']}', '{$producto['PRECIO']}', '{$total_f}', NOW(), null )";
		$mysqli->query($sql);
	}
	echo "<script>
		Swal.fire({
			icon: 'success',
			title: 'Compra realizada con éxito',
		  })
		;</script>";
	unset($_SESSION['CARRITO']);
}