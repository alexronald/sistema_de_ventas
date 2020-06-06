<?php

include_once 'app/Proveedor.php';
include_once 'app/repositorioProveedor.php';
include_once 'app/conexion.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';

conexion::abrirConexion();
$proveedores = repositorioProveedor::obtenerTodo(conexion::obtenerConexion());

if(isset($_POST['guardarProveedor'])){
	conexion::abrirConexion();
	$proveedor = new Proveedor('',$_POST['compania'],$_POST['contacto'],1);
	repositorioProveedor::InsertarPreoveedor(conexion::obtenerConexion(),$proveedor);
	?>
	<script>
	alert('hola');
	</script>
	<?php
}

if(isset($_POST['eliminar'])){
	$id = $_POST['idProveedor'];
	$resultado = repositorioProveedor::eliminarPreoveedor(conexion::obtenerConexion(),$id);
	$proveedores = repositorioProveedor::obtenerTodo(conexion::obtenerConexion());
}

if(isset($_POST['ActualisarProveedor'])){
	$proveedor = new Proveedor($_POST['idProveedor'],$_POST['compania'],$_POST['contacto'],$_POST['estado']);
	repositorioProveedor::ActualizarProveedor(conexion::obtenerConexion(),$proveedor);

	$proveedores = repositorioProveedor::obtenerTodo(conexion::obtenerConexion());
	?>
	<script>
	alert('Se Actualizo Correctamente');
	</script>
	<?php

}
?>
<section class="panel panel-default container">
	<div class="panel-heading">
		<h4><i class="fas fa-cart-plus"></i> Registrar Proveedor:</h4>
	</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-1"></div>
	<form method="post" action="<?php echo RUTA_REGISTRO_PROVEEDOR;?>">
	<?php
	if(isset($_POST['editarProveedor'])){
	$id = $_POST['idProveedor'];
	$proveedorRecuperado=repositorioProveedor::obtenerProveedorId(conexion::obtenerConexion(),$id);
?>
	<div class="col-md-5">
		<label>Compañia(*):</label><br>
		<input class="form-control" type="text" name="compania" placeholder="Nombre" value="<?php echo $proveedorRecuperado->getCompania();?>"><br>
		<label>Estado(*):</label><br>
		<input class="form-control" type="text" name="estado" value="<?php echo $proveedorRecuperado->getEstado();?>"><br>
	</div>
	<div class="col-md-5">
		<label>Contacto(*):</label><br>
		<input class="form-control" type="text" name="contacto" value="<?php echo $proveedorRecuperado->getContacto();?>"><br>
		<div class="text-right">
		<input  type="hidden" name="idProveedor" value="<?php echo $proveedorRecuperado->getId();?>"><br>
			<button class="btn btn-primary" name="ActualisarProveedor">Actualisar</button>
		</div>
	</div>
	<?php
}else{
	?>
	<div class="col-md-5">
		<label>Compañia(*):</label><br>
		<input class="form-control" type="text" name="compania" placeholder="Nombre"><br>
	</div>
	<div class="col-md-5">
		<label>Contacto(*):</label><br>
		<input class="form-control" type="text" name="contacto"><br>
		<div class="text-right">
			<button class="btn btn-primary" name="guardarProveedor">Guardar</button>
		</div>
	</div>
	<?php
}
	?>
</form>
	</div>
</div>
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
		<h3><i class="fas fa-clipboard-list"></i> Lista de Proveedor</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Compania</th>
					<th>Contacto</th>
					<th>Opcines</th>
				</tr>
			</thead>
			<tbody>
			<?php
                if (count($proveedores)) {
                    foreach ($proveedores as $proveedor) {
                        ?>
				<tr>
					<td><label><?php echo $proveedor->getId();?></td>
					<td><label><?php echo $proveedor->getCompania();?></td>
					<td><label><?php echo $proveedor->getContacto();?></label></td>
					<td>
                   <form method="POST" acction="<?php echo RUTA_REGISTRO_PROVEEDOR;?>">
                    <input name ="idProveedor" type="hidden" value="<?php echo $proveedor->getId(); ?>">
                    <button type="submit" class="btn btn-success" name="editarProveedor" ><a data-toggle="collapse" href="#avanzada"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger" name="eliminar"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
				</tr>
                        <?php
                    }
				
                }?>			
			</tbody>
		</table>
		<a class="btn btn-primary" name="buscar" href="<?php echo RUTA_REPORTE_PROVEEDOR;?>">Generar Reporte PDF</a>
	</div>
</div>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>