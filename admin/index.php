<?php
	session_start();
	if(empty($_SESSION['USER'][0])){
		header('Location: login.php');
	}
	$current_user=$_SESSION['USER'][0];
	include_once('utilities.php');
	include_once('../models/db/database_utilities.php');
	$result = run_query('productos');
	$result2 = run_query('clientes');
	$result3 = run_query('ventas');
?>
<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<title>Administrador | Pear Store</title>
	<link rel="shortcut icon" type="image/png" href="../views/IMG/pear.png"/>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet'>
	<!-- Syntax Highlighter -->
	<link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shCore.css" media="all">
	<link rel="stylesheet" type="text/css" href="syntax-highlighter/styles/shThemeDefault.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/foundation.css">
	<!-- Bootstrap 3.3.2 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<!-- Font Awesome CSS-->
	<script src="https://kit.fontawesome.com/b7cb90495e.js" crossorigin="anonymous"></script>
	<!-- Normalize/Reset CSS-->
	<link rel="stylesheet" href="css/normalize.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>

<body id="welcome">
	
	<!-- modal logout-->
	<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
					<h4 class="modal-title">Cerrar sesión <i class="fa fa-sign-out"></i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que quieres cerrar la sesión? </p>
                </div>
                <div class="modal-footer">
                    <a type="button" class="btn btn-danger" href="logout.php">Sí, Salir</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
	</div>
		
<aside class="left-sidebar">
	<div class="logo">
		<a href="#welcome">
			<h1>Pear Store</h1>
		</a>
	</div>
	<nav class="left-nav">
		<ul id="nav">
			<li class="current"><a href="#welcome">Bienvenido</a></li>
			<li><a href="#vend">Ver ventas</a></li>
			<li><a href="#prod">Ver productos</a></li>
			<li><a href="#user">Ver usuarios</a></li>
			<li><a style="color: #f00;" type="button" data-target="#logout" data-toggle="modal"><strong>Salir <i class="fas fa-sign-out-alt"></i></a></li>
		</ul>
	</nav>
</aside>
<!-- Main Wrapper -->
<div id="main-wrapper">
<div class="main-content">
	<section id="welcome">
		<div class="content-header">
			<h1>Pear Store</h1>
		</div>
		<div class="welcome">
			<h2 class="twenty">Bienvenido admin!</h2>
			<p>Desde aquí podras ver y administrar el contenido de las bases de datos</p>
		</div>
		<div class="features">
			<h2 class="twenty">Logo</h2>
			<img style="width: 200px; margin: 0 auto" src="../views/IMG/pear.png">
			<h3 style="width: 100%; display: flex;"><a style="margin: auto;" href="../views/index.php">Ir al sitio</a></h3>
		</div>
	</section>

	<section id="vend">
		<div class="content-header">
			<h1>Pear Store</h1>
		</div>
		<h2 class="title">Ventas</h2>
		<div class="section-content">
			<div class="row">
				<div class="large-10 columns">
					<p>Listado</p>
					<div class="section-container tabs" data-section>
						<section class="section">
							<div class="content" data-slug="panel1">
								<table>
									<thead>
										<tr>
											<th width="200">ID Venta</th>
											<th width="200">ID Cliente</th>
											<th width="200">ID Producto</th>
											<th width="50">Cantidad</th>
											<th width="100">Total neto</th>
											<th width="100">Total final</th>
											<th width="200">Fecha</th>
											<th width="100">Acción</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										while($vend = $result3->fetch_assoc())
										{
									?>
										<tr>
											<td><?php echo $vend['id_venta']; ?></td>
											<td><?php echo $vend['id_cliente']; ?></td>
											<td><?php echo $vend['id_producto']; ?></td>
											<td><?php echo $vend['cantidad']; ?></td>
											<td><?php echo $vend['total_neto']; ?></td>
											<td><?php echo $vend['total_final']; ?></td>
											<td><?php echo $vend['fecha_vent']; ?></td>
											<td>
												<a href="sale_details.php?id=<?php echo $vend['id_venta'];?>" class="button tiny secondary">Detalles</a>
												<a href="delete.php?id=<?php echo $vend['id_venta']; ?>&db=ventas" class="button tiny alert">Eliminar</a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="prod">
		<div class="content-header">
			<h1>Pear Store</h1>
		</div>
		<h2 class="title">Productos</h2>
		<div class="section-content">
			<div class="row">
				<div class="large-10 columns">
					<p>Listado</p>
					<div class="section-container tabs" data-section>
						<section class="section">
							<div class="content" data-slug="panel1">
								<div class="row">
									<a href="./new_product.php" class="button tiny success">Nuevo</a>
								</div>
								<table>
									<thead>
										<tr>
											<th width="100">ID Producto</th>
											<th>Nombre</th>
											<th width="100">Precio</th>
											<th>Descripción</th>
											<th width="100">Stock</th>
											<th width="100">Acción</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										while($prod = $result->fetch_assoc())
										{
									?>
										<tr>
											<td><?php echo $prod['id_producto']; ?></td>
											<td><?php echo $prod['nombre']; ?></td>
											<td><?php echo $prod['precio']; ?></td>
											<td><?php echo $prod['descripcion']; ?></td>
											<td><?php echo $prod['stock']; ?></td>
											<td>
												<a href="product_details.php?id=<?php echo $prod['id_producto']; ?>" class="button tiny secondary">Detalles</a>
												<a href="delete.php?id=<?php echo $prod['id_producto']; ?>&db=productos" class="button tiny alert">Eliminar</a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="user">
		<div class="content-header">
			<h1>Pear Store</h1>
		</div>
		<h2 class="title">Usuarios</h2>
		<div class="section-content">
			<div class="row">
				<div class="large-10 columns">
					<p>Listado</p>
					<div class="section-container tabs" data-section>
						<section class="section">
							<div class="content" data-slug="panel1">
								<div class="row">
									<a href="./new_user.php" class="button tiny success">Nuevo</a>
								</div>
								<table>
									<thead>
										<tr>
											<th width="100">ID Usuario</th>
											<th>Nombre</th>
											<th>Direccion</th>
											<th>Correo</th>
											<th>Contraseña</th>
											<th width="100">Acción</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										while($user = $result2->fetch_assoc())
										{
									?>
										<tr>
											<td><?php echo $user['id_cliente']; ?></td>
											<td><?php echo $user['nombre']; ?></td>
											<td><?php echo $user['direccion']; ?></td>
											<td><?php echo $user['correo']; ?></td>
											<td><?php echo $user['contrasena']; ?></td>
											<td>
												<a href="./user_details.php?id=<?php echo $user['id_cliente']; ?>" class="button tiny secondary">Detalles</a>
												<a href="./delete.php?id=<?php echo $user['id_cliente']; ?>&db=clientes" class="button tiny alert">Eliminar</a>
											</td>
										</tr>
									<?php
										}
									?>
									</tbody>
								</table>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>
<?php require_once('footer.php'); ?>

