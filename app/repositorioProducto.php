<?php

class repositorioProducto 
{
	public static function obtenerTodo($conexion){
	$productoObtenidos = [];
	if (isset($conexion)) {
		include_once 'app/producto.php';
		$sql="SELECT * FROM producto";
		$resultado = $conexion->query($sql);
			while($fila = $resultado->fetch_assoc()) {
				$productoObtenidos [] = new producto($fila['id_producto'],$fila['nombre'],$fila['fecha_vec'],$fila['stock'],$fila['descripcion'],$fila['precio_venta'],$fila['marca'],$fila['estado']);
		}
		}
		return $productoObtenidos;
}
	public static function obtenerPrductoId($conexion,$id){
	$producto=[];
	if (isset($conexion)) {
		include_once 'app/producto.php';
		$sql="SELECT * FROM producto WHERE id_producto=$id LIMIT 1";
		$resultado = $conexion->query($sql);
		$fila = $resultado->fetch_assoc();
		$producto = new producto($fila['id_producto'],$fila['nombre'],$fila['fecha_vec'],$fila['stock'],$fila['descripcion'],$fila['precio_venta'],$fila['marca'],$fila['estado']);
		}
		return $producto;
}

public static function ActualizarStock($conexion,$cantidad,$id){
	$resultado;
	if (isset($conexion)) {
		$sql="UPDATE producto SET stock = stock-$cantidad WHERE id_producto = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}

public static function ActualizarProducto($conexion,$producto){
	$resultado;
	if (isset($conexion)) {
		$id = $producto->getId();
		$nombre = $producto->getNombre();
		$fecha_vec = $producto->getFechaVec();
		$stock = $producto->getStock();
		$descripcion = $producto->getDescripcion();
		$precio_venta = $producto->getPrecioVenta();
		$marca = $producto->getMarca();
		$estado = $producto->getEstado();
		$sql="UPDATE producto SET nombre='$nombre' , fecha_vec='$fecha_vec', stock =$stock , descripcion='$descripcion', precio_venta=$precio_venta, marca='$marca', estado=$estado WHERE id_producto = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}

public static function insertarProducto($conexion,$producto){
	$resultado;
	if (isset($conexion)) {
		$nombre = $producto->getNombre();
		$fecha_vec = $producto->getFechaVec();
		$stock = $producto->getStock();
		$descripcion = $producto->getDescripcion();
		$precio_venta = $producto->getPrecioVenta();
		$marca = $producto->getMarca();
		$estado = $producto->getEstado();
		$sql="INSERT INTO producto(nombre,fecha_vec,stock,descripcion,precio_venta,marca,estado)VALUES('$nombre','$fecha_vec',$stock,'$descripcion',$precio_venta,'$marca',$estado)";
		$resultado = $conexion->query($sql);
		if ($resultado) {

			$resultado = true;
		}
		}
		return $resultado;
}

public static function eliminarProducto($conexion,$id){
	$resultado;
	if (isset($conexion)) {
		$sql="DELETE from producto WHERE id_producto = $id;";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
		}
		return $resultado;
}
}
 ?>