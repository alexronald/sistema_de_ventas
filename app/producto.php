<?php
class producto
{

	private $id;
	private $nombre;
	private $fecha_vec;
	private $stock;
	private $descripcion;
	private $precio_venta;
	private $marca;
	private $estado;
	
	 public function __construct($id,$nombre,$fecha_vec, $stock, $descripcion, $precio_venta, $marca, $estado)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->fecha_vec = $fecha_vec;
		$this->stock = $stock;
		$this->descripcion = $descripcion;
		$this->precio_venta = $precio_venta;
		$this->marca = $marca;
		$this->estado = $estado;	
	}

	public function getId(){
		return $this->id;
	}
	public function getNombre(){
		return $this->nombre;
	}

	public function getFechaVec(){
		return $this->fecha_vec;
	}

	public function getStock(){
		return $this->stock;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}
		public function getPrecioVenta(){
		return $this->precio_venta;
	}
	public function getMarca(){
		return $this->marca;
	}
	public function getEstado(){
		return $this->estado;
	}


	public function setId($id){
		$this->id = $id;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setFechaVec($fecha_vec){
		$this->fecha_vec = $fecha_vec;
	}
	public function setStock($stock){
		$this->stock = $stock;
	}
	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function setPrecioVenta($celular){
		$this->precio_venta = $precio_venta;
	}
	public function setMarca($marca){
		$this->marca = $marca;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}	
}
?>