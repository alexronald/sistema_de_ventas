<?php
include_once 'app/conexion.php';
include_once 'app/repositorioProducto.php';
include_once 'app/Redireccion.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';
conexion::abrirConexion();
$productos = repositorioProducto::obtenerTodo(conexion::obtenerConexion());

if(isset($_POST['eliminar'])){
	$id = $_POST['idProducto'];
	$resultado = repositorioProducto::eliminarProducto(conexion::obtenerConexion(),$id);
}

if(isset($_POST['ActualizarProducto'])){
	$producto = new producto($_POST['idProducto'],$_POST['nombre_producto'],$_POST['fecha_venc'],$_POST['stock'],$_POST['descripcion'],$_POST['precio'],$_POST['marca'],$_POST['Estado']);
	repositorioProducto::ActualizarProducto(conexion::obtenerConexion(),$producto);

	$productos = repositorioProducto::obtenerTodo(conexion::obtenerConexion());
	?>
	<script>
	alert('Se Actualizo Correctamente');
	</script>
	<?php

}
?>
<section class="panel panel-default container">
<div class="row"><br>
	<div class="col-md-10 text-right">
		<form>
			<label>Buscar(*)</label>
			<input type="text" name="nombre">
			<button type="submit" class="btn btn-primary" name="buscar">buscar</button>
		</form>
		<br>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3><i class="fas fa-clipboard-list"></i> Lista de productos</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Fecha Vencimiento</th>
					<th>Stock</th>
					<th>Descripcion</th>
					<th>precio</th>
					<th>marca</th>
					<th>Opcines</th>
				</tr>
			</thead>
			<tbody>
			<?php
                if (count($productos)) {
                    foreach ($productos as $producto) {
                        ?>
				<tr>
					<td><label><?php echo $producto->getId();?></td>
					<td><label><?php echo $producto->getNombre();?></label></td>
                    <td><label><?php echo $producto->getFechaVec();?></label></td>
                    <td><label><?php echo $producto->getStock();?></td>
                    <td><label><?php echo $producto->getDescripcion();?></label></td>
                    <td><label><?php echo $producto->getPrecioVenta();?></label></td>
                    <td><label><?php echo $producto->getMarca();?></label></td>
                    <td>
                   <form method="POST" acction="<?php echo RUTA_LISTA_PRODUCTO;?>">
                    <input name ="idProducto" type="hidden" value="<?php echo $producto->getId(); ?>">
                    <button type="submit" class="btn btn-success" name="editar" ><a data-toggle="collapse" href="#avanzada"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger" name="eliminar"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
				</tr>
                        <?php
                    }
				
                }?>			
			</tbody>
		</table>
		<a class="btn btn-primary" name="buscar" href="<?php echo RUTA_REPORTE_PRODUCTO;?>">Generar Reporte PDF</a>
	</div>
</div>
<?php if(isset($_POST['editar'])){
	$id = $_POST['idProducto'];
	$productoRecuperado=repositorioProducto::obtenerPrductoId(conexion::obtenerConexion(),$id);

	echo $id;?>

<div class="panel-collapse collapse panel panel-default contenido_articulo1" id="avanzada">
		<div class="panel-heading">
			<h3>Editar</h3>
		</div>
        <div class="row panel-body">
        <form role="form" method="post" action="<?php echo RUTA_LISTA_PRODUCTO;?>">
        <div class="col-md-1"></div>
        <div class="col-md-5">
		<label>Nombre(*):</label><br>
		<input class="form-control" type="text" name="nombre_producto" placeholder="Nombre" value="<?php echo $productoRecuperado->getNombre();?>"><br>
		<label>Fecha De Vencimiento(*):</label><br>
		<input class="form-control" type="date" name="fecha_venc" value="<?php echo $productoRecuperado->getFechaVec();?>"><br>
		<label>Stock(*):</label><br>
		<input class="form-control" type="number" name="stock"  placeholder="la cantidad de producto" value="<?php echo $productoRecuperado->getStock();?>"><br>
		<label>Estado(*):</label><br>
		<input class="form-control" type="text" name="Estado"   value="<?php echo $productoRecuperado->getEstado();?>"><br>
	</div>
	<div class="col-md-5">
		<label>Precio(*):</label><br>
		<input class="form-control" type="number" name="precio" placeholder="s/. 0.00" value="<?php echo $productoRecuperado->getPrecioVenta();?>"><br>
		<label>Descripcion(*):</label><br>
		<input class="form-control" type="text" name="descripcion" value="<?php echo $productoRecuperado->getDescripcion();?>"><br>
		<label>Marca(*):</label><br>
		<input class="form-control" type="text" name="marca"  placeholder="la marca del producto" value="<?php echo $productoRecuperado->getMarca();?>"><br>
		<div class="text-right">
			<input type="hidden" name="idProducto" value="<?php echo $productoRecuperado->getId();?>"><br>
			<button class="btn btn-primary" name="ActualizarProducto">Actualizar</button>
		</div>
	</div>
        </form>
    </div>
</div><?php
}
?>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>