<?php

include_once 'app/Usuario.php';
include_once 'app/repositorioUsuario.php';
include_once 'app/conexion.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';


if(isset($_POST['guardarUsuario'])){
	conexion::abrirConexion();
	$usuario = new Usuario('',$_POST['nombre_Usuario'],$_POST['tipoUsuario'],$_POST['password'],$_POST['celular'],$_POST['email'],1);
	repositorioUsuario::InsertarUsuario(conexion::obtenerConexion(),$usuario);
	?>
	<script>
	alert('Usuario Insertado Corectamente');
	</script>
	<?php
}

?>
<section class="panel panel-default container">
	<div class="panel-heading">
		<h4><i class="fas fa-cart-plus"></i> Registrar Usuario:</h4>
	</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-1"></div>
	<form method="post" action="<?php echo RUTA_REGISTRO_USUARIO;?>">
	<div class="col-md-5">
		<label>Nombre(*):</label><br>
		<input class="form-control" type="text" name="nombre_Usuario" placeholder="Nombre"><br>
		<label>Tipo De Usuario(*):</label><br>
		<input class="form-control" type="text" name="tipoUsuario"><br>
		<label>Contraseña(*):</label><br>
		<input class="form-control" type="password" name="password"  placeholder="la cantidad de producto">
	</div>
	<div class="col-md-5">
		<label>celular(*):</label><br>
		<input class="form-control" type="number" name="celular" placeholder="+51 000 000 000"><br>
		<label>email(*):</label><br>
		<input class="form-control" type="text" name="email"><br><br>
		<div class="text-right">
			<button class="btn btn-primary" name="guardarUsuario">Guardar</button>
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