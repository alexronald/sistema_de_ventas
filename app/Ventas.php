<?php
class Ventas 
{
	private $id;	
	private $fecha;
	private $total;
	private $idCliente;
	private $idUsuario;

	public function __construct($id, $fecha, $total, $idCliente,$idUsuario)
	{
		$this->id = $id;
		$this->fecha = $fecha;
		$this->total = $total;
		$this->idCliente = $idCliente;
		$this->idUsuario = $idUsuario;
	}

	public function getId(){
		return $this->id;
	}
	public function getFecha(){
		return $this->fecha;
	}
	public function getTota(){
		return $this->total;
	}
	public function getIdCliente(){
		return $this->idCliente;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function setId($id){
		$this->id = $id;
	}
	public function setFecha($fecha){
		$this->fecha = $fecha;
	}
	public function setTota($total){
		$this->total = $total;
	}
	public function setIdCliente($idCliente){
		$this->idCliente = $idCliente;
	}
	public function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}	
}
?>