<?php
class Proveedor
{
	private $id;	
	private $compania;
	private $contacto;
	private $estado;

	public function __construct($id, $compania, $contacto, $estado)
	{
		$this->id = $id;
		$this->compania = $compania;
		$this->contacto = $contacto;
		$this->estado = $estado;
	}

	public function getId(){
		return $this->id;
	}
	public function getCompania(){
		return $this->compania;
	}
	public function getContacto(){
		return $this->contacto;
	}
	public function getEstado(){
		return $this->estado;
	}


	public function setId($id){
		$this->id = $id;
	}
	public function setCompania($compania){
		$this->compania = $compania;
	}
	public function setContacto($contacto){
		$this->contacto = $contacto;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}	
}
?>