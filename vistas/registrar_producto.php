<?php

include_once 'app/producto.php';
include_once 'app/repositorioProducto.php';
include_once 'app/conexion.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';


if(isset($_POST['guardarProducto'])){
	conexion::abrirConexion();
	$producto = new producto('',$_POST['nombre_producto'],$_POST['fecha_venc'],$_POST['stock'],$_POST['descripcion'],$_POST['precio'],$_POST['marca'],1);
	repositorioProducto::insertarProducto(conexion::obtenerConexion(),$producto);
	?>
	<script>
	alert('hola');
	</script>
	<?php
}
?>
<section class="panel panel-default container">
	<div class="panel-heading">
		<h4><i class="fas fa-cart-plus"></i> Registrar producto:</h4>
	</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-1"></div>
	<form method="post" action="<?php echo RUTA_REGISTRO_PRODUCTO;?>">
	<div class="col-md-5">
		<label>Nombre(*):</label><br>
		<input class="form-control" type="text" name="nombre_producto" placeholder="Nombre"><br>
		<label>Fecha De Vencimiento(*):</label><br>
		<input class="form-control" type="date" name="fecha_venc"><br>
		<label>Stock(*):</label><br>
		<input class="form-control" type="number" name="stock"  placeholder="la cantidad de producto">
	</div>
	<div class="col-md-5">
		<label>Precio(*):</label><br>
		<input class="form-control" type="number" name="precio" placeholder="s/. 0.00"><br>
		<label>Descripcion(*):</label><br>
		<input class="form-control" type="text" name="descripcion"><br>
		<label>marca(*):</label><br>
		<input class="form-control" type="text" name="marca"  placeholder="la marca del producto"><br>
		<div class="text-right">
			<button class="btn btn-primary" name="guardarProducto">Guardar</button>
		</div>
	</div>
</form>
	</div>
</div>
</div>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>