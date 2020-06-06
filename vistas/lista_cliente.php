<?php
include_once 'app/conexion.php';
include_once 'app/repositorioCliente.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';
conexion::abrirConexion();
$clientes = repositorioCliente::obtenerTodo(conexion::obtenerConexion());

if(isset($_POST['eliminar'])){
	$id = $_POST['idCliente'];
	$resultado = repositorioCliente::eliminarCliente(conexion::obtenerConexion(),$id);
	$clientes = repositorioCliente::obtenerTodo(conexion::obtenerConexion());
}

if(isset($_POST['ActualizarCliente'])){
	$cliente = new Cliente($_POST['idCliente'],$_POST['tipo_persona'],$_POST['nombre_Cliente'],$_POST['tipo_documento'],$_POST['num_documento'],$_POST['direccion'],$_POST['celular'],$_POST['email'],$_POST['Estado']);
	repositorioCliente::ActualizarCliente(conexion::obtenerConexion(),$cliente);

	$clientes = repositorioCliente::obtenerTodo(conexion::obtenerConexion());
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
		<h3><i class="fas fa-clipboard-list"></i> Lista de Cliente</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Tipo Persona</th>
					<th>Nombre</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Direccion</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Opcines</th>
				</tr>
			</thead>
			<tbody>
			<?php
                if (count($clientes)) {
                    foreach ($clientes as $cliente) {
                        ?>
				<tr>
					<td><label><?php echo $cliente->getId();?></td>
					<td><label><?php echo $cliente->getTipoPersona();?></td>
					<td><label><?php echo $cliente->getNombre();?></label></td>
                    <td><label><?php echo $cliente->getTipoDocumento();?></label></td>
                    <td><label><?php echo $cliente->getNumeroDocumento();?></td>
                    <td><label><?php echo $cliente->getDireccion();?></td>
                    <td><label><?php echo $cliente->getCelular();?></label></td>
                    <td><label><?php echo $cliente->getEmail();?></label></td>
                    <td>
                   <form method="POST" acction="<?php echo RUTA_LISTA_CLIENTE;?>">
                    <input name ="idCliente" type="hidden" value="<?php echo $cliente->getId(); ?>">
                    <button type="submit" class="btn btn-success" name="editarCliente" ><a data-toggle="collapse" href="#avanzada"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger" name="eliminar"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
				</tr>
                        <?php
                    }
				
                }?>			
			</tbody>
		</table>
		<a class="btn btn-primary" name="buscar" href="<?php echo RUTA_REPORTE_CLIENTE;?>">Generar Reporte PDF</a>
	</div>
</div>

<?php 
	if(isset($_POST['editarCliente'])){
	$id = $_POST['idCliente'];
	$clienteRecuperado=repositorioCliente::obtenerClienteId(conexion::obtenerConexion(),$id);

	echo $id;?>

<div class="panel-collapse collapse panel panel-default contenido_articulo1" id="avanzada">
		<div class="panel-heading">
			<h3>Editar</h3>
		</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-1"></div>
	<form method="post" action="<?php echo RUTA_LISTA_CLIENTE;?>">
	<div class="col-md-5">
		<label>Tipo De Persona(*):</label><br>
		<input class="form-control" type="text" name="tipo_persona" value="<?php echo $clienteRecuperado->getTipoPersona();?>"><br>
		<label>Nombre(*):</label><br>
		<input class="form-control" type="text" name="nombre_Cliente" placeholder="Nombre" value="<?php echo $clienteRecuperado->getNombre();?>"><br>
		<label>Tipo De Documento(*):</label><br>
		<input class="form-control" type="text" name="tipo_documento"  placeholder="la cantidad de producto" value="<?php echo $clienteRecuperado->getTipoDocumento();?>"><BR>
		<label>Numero De Documento(*):</label><br>
		<input class="form-control" type="number" name="num_documento"  placeholder="la cantidad de producto" value="<?php echo $clienteRecuperado->getNumeroDocumento();?>">
	</div>
	<div class="col-md-5">
		<label>Direccion(*):</label><br>
		<input class="form-control" type="text" name="direccion"  placeholder="la cantidad de producto" value="<?php echo $clienteRecuperado->getDireccion();?>"><BR>
		<label>celular(*):</label><br>
		<input class="form-control" type="number" name="celular" placeholder="+51 000 000 000" value="<?php echo $clienteRecuperado->getCelular();?>"><br>
		<label>email(*):</label><br>
		<input class="form-control" type="email" name="email" value="<?php echo $clienteRecuperado->getEmail();?>"><br>
		<label>Estado(*):</label><br>
		<input class="form-control" type="estado" name="Estado" value="<?php echo $clienteRecuperado->getEstado();?>"><br>
		<div class="text-right">
			<input class="form-control" type="hidden" name="idCliente" value="<?php echo $clienteRecuperado->getId();?>"><br>
			<button class="btn btn-primary" name="ActualizarCliente">Actualizar</button>
		</div>
	</div>
</form>
</div>
</div>
</div><?php
}
?>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>