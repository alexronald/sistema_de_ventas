	<?php
include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';
include_once 'app/conexion.php';

?>
<section class="panel panel-default container">
	<header class="panel-heading">
		<h3><i class="fas fa-laptop"></i> Escritorio</h3>
	</header>
	<nav class="panel-body">
		<nav class="row">
		<div class="col-md-1"></div>
			<nav class="col-md-5">
				<nav class="panel panel-default text-center compras">
					<nav class="panel-body">
						<p>S/ 0.00</p>
						<p>Compras</p>
					</nav>
					<footer class="panel-footer compras-foot">
						<a href="<?PHP ECHO RUTA_REGISTRO_COMPRA?>">Compras <i class="fas fa-arrow-alt-circle-right"></i></a>
					</footer>
				</nav>
			</nav>
			<nav class="col-md-5">
				<nav class="panel panel-default text-center ventas">
					<nav class="panel-body">
						<p>S/ 0.00</p>
						<p>Ventas</p>
					</nav>
					<footer class="panel-footer ventas-foot"">
						<a href="<?PHP ECHO RUTA_REGISTRO_VENTA?>">Ventas <i class="fas fa-arrow-alt-circle-right"></i></a>
					</footer>
				</nav>
			</nav>
		</nav>
	</nav>
</section>
<section class="panel panel-default container">
	<header class="panel-heading">
		<h5><i class="fas fa-bars"></i> Enlases Rapidos</h5>
	</header>
	<div class="panel-body">
		<section class="row" id="enlace">
			<div class="col-md-1"></div>
			<div class="col-md-5 text-center">
				<button class="form-control panel0">Registrar Proveedor</button>
				<button class="form-control panel1">Lista de productos</button>
			</div>
			<div class="col-md-5 text-center">
				<button class="form-control panel4">Lista de Ventas</button>
				<button class="form-control panel5">Lista de usuarios</button>
			</div>
		</section>
	</div>
	<nav class="panel-body">
		
	</nav>
	</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>