<?php

class repositorioVenta 
{
public static function insertarVenta($conexion, $ventas){
	$resultado;
	if (isset($conexion)) {
		$fecha = $ventas->getFecha();
		$total = $ventas->getTota();
		$id_cliente = $ventas->getIdCliente();
		$id_usuario = $ventas->getIdUsuario();
		$sql="INSERT INTO venta (fecha,total,id_cliente,id_usuario) VALUE('$fecha',$total,$id_cliente,$id_usuario)";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
	}
	return $resultado;
}
public static function obtenerId($conexion){
	$id = 0;
	if (isset($conexion)) {
		$sql="SELECT num_venta FROM venta ORDER BY num_venta DESC LIMIT 1;";
		$resultado=$conexion->query($sql);
		$fila = $resultado->fetch_assoc();
		$id = $fila['num_venta'];
	}
	return $id;
}
}
?>