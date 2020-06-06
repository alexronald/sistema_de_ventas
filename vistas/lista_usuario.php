<?php
include_once 'app/conexion.php';
include_once 'app/repositorioUsuario.php';

include_once 'plantilla/doc_declaracion_head.php';
include_once 'plantilla/navbar.php';
include_once 'plantilla/menu_lateral.php';
conexion::abrirConexion();
$usuarios = repositorioUsuario::obtenerTodo(conexion::obtenerConexion());

if(isset($_POST['eliminar'])){
	$id = $_POST['idUsuario'];
	$resultado = repositorioUsuario::eliminarUsuario(conexion::obtenerConexion(),$id);
	$usuarios = repositorioUsuario::obtenerTodo(conexion::obtenerConexion());
}
if(isset($_POST['actualizarUsuario'])){
	$usuario = new Usuario($_POST['idUsuario'],$_POST['nombre_Usuario'],$_POST['tipoUsuario'],$_POST['password'],$_POST['celular'],$_POST['email'],$_POST['estado']);
	repositorioUsuario::ActualizarUsuario(conexion::obtenerConexion(),$usuario);

	$usuarios = repositorioUsuario::obtenerTodo(conexion::obtenerConexion());
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
		<h3><i class="fas fa-clipboard-list"></i> Lista de usuarios</h3>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Id</th>
					<th>Nombre</th>
					<th>Tipo Usuario</th>
					<th>Password</th>
					<th>Celular</th>
					<th>Email</th>
					<th>Estado</th>
					<th>Opcines</th>
				</tr>
			</thead>
			<tbody>
			<?php
                if (count($usuarios)) {
                    foreach ($usuarios as $usuario) {
                        ?>
				<tr>
					<td><label><?php echo $usuario->getId();?></td>
					<td><label><?php echo $usuario->getNombre();?></label></td>
                    <td><label><?php echo $usuario->getTipoUsuario();?></label></td>
                    <td><label><?php echo $usuario->getPassword();?></td>
                    <td><label><?php echo $usuario->getCelular();?></label></td>
                    <td><label><?php echo $usuario->getEmail();?></label></td>
                    <td><label><?php echo $usuario->getEstado();?></label></td>
                    <td>
                   <form method="POST" acction="<?php echo RUTA_LISTA_USUARIO;?>">
                    <input name ="idUsuario" type="hidden" value="<?php echo $usuario->getId(); ?>">
                    <button type="submit" class="btn btn-success" name="editarusuario" ><a data-toggle="collapse" href="#avanzada"><i class="fa fa-edit"></i></a></button>
                    <button class="btn btn-danger" name="eliminar"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
				</tr>
                        <?php
                    }
				
                }?>			
			</tbody>
		</table>
		<a class="btn btn-primary" name="buscar" href="<?php echo RUTA_REPORTE_USUARIO;?>">Generar Reporte PDF</a>
	</div>

<?php 
	if(isset($_POST['editarusuario'])){
	$id = $_POST['idUsuario'];
	$usuarioRecuperado=repositorioUsuario::obtenerUsuarioId(conexion::obtenerConexion(),$id);

	echo $id;?>
<div class="panel-collapse collapse panel panel-default contenido_articulo1" id="avanzada">
	<div class="panel-heading">
		<h4><i class="fas fa-cart-plus"></i> Registrar Usuario:</h4>
	</div>
	<div class="panel-body">
	<div class="row">
	<div class="col-md-1"></div>
	<form method="post" action="<?php echo RUTA_LISTA_USUARIO;?>">
	<div class="col-md-5">
		<label>Nombre(*):</label><br>
		<input class="form-control" type="text" name="nombre_Usuario" placeholder="Nombre" value="<?php echo $usuarioRecuperado->getNombre();?>"><br>
		<label>Tipo De Usuario(*):</label><br>
		<input class="form-control" type="text" name="tipoUsuario" value="<?php echo $usuarioRecuperado->getTipoUsuario();?>"><br>
		<label>Contraseña(*):</label><br>
		<input class="form-control" type="password" name="password"  placeholder="la cantidad de producto" value="<?php echo $usuarioRecuperado->getPassword();?>">
	</div>
	<div class="col-md-5">
		<label>celular(*):</label><br>
		<input class="form-control" type="number" name="celular" placeholder="+51 000 000 000" value="<?php echo $usuarioRecuperado->getCelular();?>"><br>
		<label>email(*):</label><br>
		<input class="form-control" type="text" name="email" value="<?php echo $usuarioRecuperado->getEmail();?>"><br>

		<label>Estado(*):</label><br>
		<input class="form-control" type="text" name="estado" value="<?php echo $usuarioRecuperado->getEstado();?>"><br>
		<div class="text-right">
			<input  type="hidden" name="idUsuario" value="<?php echo $usuarioRecuperado->getId();?>"><br>
			<button class="btn btn-primary" name="actualizarUsuario">Actualizar</button>
		</div>
	</div>
</form>
	</div>
</div>
</div>

</div>
</div>
<?php
}
?>
</section>
<?php
include_once 'plantilla/doc_declaracion_foot.php';
?>