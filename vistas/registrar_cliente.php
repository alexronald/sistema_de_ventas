<?php

include_once 'app/Cliente.php';
include_once 'app/repositorioCliente.php';
include_once 'app/conexion.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';


if(isset($_POST['guardarCliente'])){
	conexion::abrirConexion();
	$cliente = new Cliente('',$_POST['tipo_persona'],$_POST['nombre_Cliente'],$_POST['tipo_documento'],$_POST['num_documento'],$_POST['direccion'],$_POST['celular'],$_POST['email'],1);
	repositorioCliente::InsertarCliente(conexion::obtenerConexion(),$cliente);
	?>
	<script>
	alert('Cliente Insertado Corectamente');
	</script>
	<?php
}

?>
<section class="panel panel-default container">
	<div class="panel-heading">
		<h4><i class="fas fa-cart-plus"></i> Registrar Cliente:</h4>
	</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-1"></div>
	<form method="post" action="<?php echo RUTA_REGISTRO_CLIENTE;?>">
	<div class="col-md-5">
		<label>Tipo De Persona(*):</label><br>
		<input class="form-control" type="text" name="tipo_persona"><br>
		<label>Nombre(*):</label><br>
		<input class="form-control" type="text" name="nombre_Cliente" placeholder="Nombre"><br>
		<label>Tipo De Documento(*):</label><br>
		<input class="form-control" type="text" name="tipo_documento"  placeholder="la cantidad de producto"><BR>
		<label>Numero De Documento(*):</label><br>
		<input class="form-control" type="number" name="num_documento"  placeholder="la cantidad de producto">
	</div>
	<div class="col-md-5">
		<label>Direccion(*):</label><br>
		<input class="form-control" type="text" name="direccion"  placeholder="la cantidad de producto"><BR>
		<label>celular(*):</label><br>
		<input class="form-control" type="number" name="celular" placeholder="+51 000 000 000"><br>
		<label>email(*):</label><br>
		<input class="form-control" type="email" name="email"><br><BR>
		<div class="text-right">
			<button class="btn btn-primary" name="guardarCliente">Guardar</button>
			<button class="btn btn-primary">eliminar</button>
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