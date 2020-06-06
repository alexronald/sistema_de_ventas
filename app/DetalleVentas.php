<?php
class DetalleVentas 
{
	private $id;	
	private $cantidad;
	private $precio;
	private $descuento;
	private $sub_precio;
	private $num_venta;
	private $id_producto;


	public function __construct($id, $cantidad, $precio, $descuento,$sub_precio,$num_venta,$id_producto)
	{
		$this->id = $id;
		$this->cantidad = $cantidad;
		$this->precio = $precio;
		$this->descuento = $descuento;
		$this->sub_precio = $sub_precio;
		$this->num_venta = $num_venta;
		$this->id_producto = $id_producto;
	}

	public function getId(){
		return $this->id;
	}
	public function getCantidad(){
		return $this->cantidad;
	}
	public function getPrecio(){
		return $this->precio;
	}
	public function getDescuento(){
		return $this->descuento;
	}
	public function getSubPrecio(){
		return $this->sub_precio;
	}
	public function getNumVenta(){
		return $this->num_venta;
	}
	public function getIdProducto(){
		return $this->id_producto;
	}



	public function setId($id){
		$this->id = $id;
	}
	public function setCantidad($cantidad){
		$this->cantidad = $cantidad;
	}
	public function setPrecio($precio){
		$this->precio = $precio;
	}
	public function setDescuento($descuento){
		$this->descuento = $descuento;
	}
	public function setSubPrecio($sub_precio){
		$this->sub_precio = $sub_precio;
	}
	public function setNumVenta($num_venta){
		$this->num_venta = $num_venta;
	}
	public function setIdProducto($id_producto){
		$this->id_producto = $id_producto;
	}	
}
?>