<?php

class repositorioDetalleVenta 
{

public static function insertarDetalleVenta($conexion, $detalleVentas){
	$resultado;
	if (isset($conexion)) {
		$cantidad = $detalleVentas->getCantidad();
		$precio = $detalleVentas->getPrecio();
		$descuento = $detalleVentas->getDescuento();
		$sub_precio = $detalleVentas->getSubPrecio();
		$num_venta = $detalleVentas->getNumVenta();
		$id_producto = $detalleVentas->getIdProducto();

		$sql="INSERT INTO detalle_venta(cantidad,precio,descuento,sub_total,num_venta,id_producto)VALUES($cantidad,$precio,$descuento,$sub_precio,$num_venta,$id_producto);";
		$resultado = $conexion->query($sql);
		if ($resultado) {
			$resultado = true;
		}
	}
	return $resultado;
}
}
 ?>