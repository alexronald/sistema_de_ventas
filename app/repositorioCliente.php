<?php
class repositorioCliente
{
public static function obtenerTodo($conexion){
	$clienteObtenidos = [];
	if (isset($conexion)) {
		include_once 'app/cliente.php';
		$sql="SELECT * FROM cliente";
		$resultado = $conexion->query($sql);
			while($fila = $resultado->fetch_assoc()) {
				$clienteObtenidos [] = new Cliente($fila['id_cliente'],$fila['tipo_persona'],$fila['nombre'],$fila['tipo_documento'],$fila['num_documento'],$fila['direccion'],$fila['celular'],$fila['email'],$fila['estado']);
		}
		}
		return $clienteObtenidos;
}

public static function Insertarcliente($conexion,$cliente){
	$resultado;
	if (isset($conexion)) {
		$tipo_persona = $cliente->getTipoPersona();
		$nombre = $cliente->getNombre();
		$tipo_documento = $cliente->getTipoDocumento();
		$num_documento = $cliente->getNumeroDocumento();
		$direccion = $cliente->getDireccion();
		$celular = $cliente->getCelular();
		$email = $cliente->getEmail();
		$estado = $cliente->getEstado();
		$sql="INSERT INTO cliente(tipo_persona,nombre,tipo_documento,num_documento,direccion,celular,email,estado)VALUES('$tipo_persona','$nombre','$tipo_documento','$num_documento','$direccion','$celular','$email',$estado);";
		$resultado = $conexion->query($sql);
		if ($resultado) {

			$resultado = true;
		}
		}
		return $resultado;
}


public static function eliminarCliente($conexion,$id){
	$resultado;
	if (isset($conexion)) {
		$sql="DELETE from cliente WHERE id_cliente = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}


public static function ActualizarCliente($conexion,$cliente){
	$resultado;
	if (isset($conexion)) {
		$id = $cliente->getId();
		$tipo_persona = $cliente->getTipoPersona();
		$nombre = $cliente->getNombre();
		$tipo_documento = $cliente->getTipoDocumento();
		$num_documento = $cliente->getNumeroDocumento();
		$direccion = $cliente->getDireccion();
		$celular = $cliente->getCelular();
		$email = $cliente->getEmail();
		$estado = $cliente->getEstado();
		$sql="UPDATE cliente SET tipo_persona='$tipo_persona' , nombre='$nombre', tipo_documento ='$tipo_documento' , num_documento='$num_documento', direccion='$direccion', celular='$celular', email='$email', estado=$estado WHERE id_cliente = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}

public static function obtenerClienteId($conexion,$id){
	$cliente=[];
	if (isset($conexion)) {
		include_once 'app/Cliente.php';
		$sql="SELECT * FROM cliente WHERE id_cliente=$id LIMIT 1";
		$resultado = $conexion->query($sql);
		$fila = $resultado->fetch_assoc();
		$cliente = new Cliente($fila['id_cliente'],$fila['tipo_persona'],$fila['nombre'],$fila['tipo_documento'],$fila['num_documento'],$fila['direccion'],$fila['celular'],$fila['email'],$fila['estado']);
		}
		return $cliente;
}

}
?>