<?php
class repositorioProveedor
{
public static function obtenerTodo($conexion){
	$proveedorObtenidos = [];
	if (isset($conexion)) {
		include_once 'app/Proveedor.php';
		$sql="SELECT * FROM proveedor";
		$resultado = $conexion->query($sql);
			while($fila = $resultado->fetch_assoc()) {
				$proveedorObtenidos [] = new Proveedor($fila['id_proveedor'],$fila['compania'],$fila['contacto'],$fila['estado']);
		}
		}
		return $proveedorObtenidos;
}

public static function InsertarPreoveedor($conexion,$proveedor){
	$resultado;
	if (isset($conexion)) {
		$compania = $proveedor->getCompania();
		$contacto = $proveedor->getContacto();
		$estado = $proveedor->getEstado();
		$sql="INSERT INTO proveedor(compania,contacto,estado)VALUES('$compania','$contacto',$estado);";
		$resultado = $conexion->query($sql);
		if ($resultado) {

			$resultado = true;
		}
		}
		return $resultado;
}
public static function eliminarPreoveedor($conexion,$id){
	$resultado;
	if (isset($conexion)) {
		$sql="DELETE from proveedor WHERE id_proveedor = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}

public static function obtenerProveedorId($conexion,$id){
	$proveedor=[];
	if (isset($conexion)) {
		include_once 'app/Proveedor.php';
		$sql="SELECT * FROM proveedor WHERE id_proveedor=$id LIMIT 1";
		$resultado = $conexion->query($sql);
		$fila = $resultado->fetch_assoc();
		$proveedor = new Proveedor($fila['id_proveedor'],$fila['compania'],$fila['contacto'],$fila['estado']);
		}
		return $proveedor;
}
public static function ActualizarProveedor($conexion,$proveedor){
	$resultado;
	if (isset($conexion)) {
		$id = $proveedor->getId();
		$compania = $proveedor->getCompania();
		$contacto = $proveedor->getContacto();
		$estado = $proveedor->getEstado();
		$sql="UPDATE proveedor SET compania='$compania', contacto ='$contacto', estado=$estado WHERE id_proveedor = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}
}
?>