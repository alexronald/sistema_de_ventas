<?php
class repositorioUsuario
{
public static function obtenerTodo($conexion){
	$usuarioObtenidos = [];
	if (isset($conexion)) {
		include_once 'app/usuario.php';
		$sql="SELECT * FROM usuario";
		$resultado = $conexion->query($sql);
			while($fila = $resultado->fetch_assoc()) {
				$usuarioObtenidos [] = new usuario($fila['id_usuario'],$fila['nombre'],$fila['tipo_usuario'],$fila['PASSWORD'],$fila['celular'],$fila['email'],$fila['estado']);
		}
		}
		return $usuarioObtenidos;
}

public static function obtenerUsuarioNombrePassword($conexion,$nombre,$password){
	$usuario = [];
	if (isset($conexion)) {
		include_once 'app/usuario.php';
		$sql="SELECT * FROM usuario where nombre = '$nombre' and PASSWORD = '$password' LIMIT 1;";
		$resultado = $conexion->query($sql);
		$fila = $resultado->fetch_assoc();
		$usuario = new usuario($fila['id_usuario'],$fila['nombre'],$fila['tipo_usuario'],$fila['PASSWORD'],$fila['celular'],$fila['email'],$fila['estado']);
}
return $usuario;
}

public static function InsertarUsuario($conexion,$usuario){
	$resultado;
	if (isset($conexion)) {
		$nombre = $usuario->getNombre();
		$tipo_usuario = $usuario->getTipoUsuario();
		$password = $usuario->getPassword();
		$celular = $usuario->getCelular();
		$email = $usuario->getEmail();
		$estado = $usuario->getEstado();
		$sql="INSERT INTO usuario(nombre,tipo_usuario,PASSWORD,celular,email,estado)VALUES('$nombre','$tipo_usuario','$password','$celular','$email',$estado);";
		$resultado = $conexion->query($sql);
		if ($resultado) {

			$resultado = true;
		}
		}
		return $resultado;
}
public static function eliminarUsuario($conexion,$id){
	$resultado;
	if (isset($conexion)) {
		$sql="DELETE from usuario WHERE id_usuario = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}

public static function obtenerUsuarioId($conexion,$id){
	$usuario=[];
	if (isset($conexion)) {
		include_once 'app/usuario.php';
		$sql="SELECT * FROM usuario WHERE id_usuario=$id LIMIT 1";
		$resultado = $conexion->query($sql);
		$fila = $resultado->fetch_assoc();
		$usuario = new usuario($fila['id_usuario'],$fila['nombre'],$fila['tipo_usuario'],$fila['PASSWORD'],$fila['celular'],$fila['email'],$fila['estado']);
		}
		return $usuario;
}

public static function ActualizarUsuario($conexion,$usuario){
	$resultado;
	if (isset($conexion)) {
		$id = $usuario->getId();
		$nombre = $usuario->getNombre();
		$tipo_usuario = $usuario->getTipoUsuario();
		$password = $usuario->getPassword();
		$celular = $usuario->getCelular();
		$email = $usuario->getEmail();
		$estado = $usuario->getEstado();
		$sql="UPDATE usuario SET nombre='$nombre', tipo_usuario ='$tipo_usuario' , PASSWORD='$password', celular='$celular', email='$email', estado=$estado WHERE id_usuario = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}
}
?>