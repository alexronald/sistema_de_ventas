<?php
class Cliente
{
	private $id;	
	private $tipo_persona;
	private $nombre;
	private $tipo_documento;
	private $num_documento;
	private $direccion;	
	private $celular;
	private $email;
	private $estado;

	public function __construct($id, $tipo_persona, $nombre, $tipo_documento,$num_documento,$direccion, $celular, $email, $estado)
	{
		$this->id = $id;
		$this->tipo_persona = $tipo_persona;
		$this->nombre = $nombre;
		$this->tipo_documento = $tipo_documento;
		$this->num_documento = $num_documento;
		$this->direccion = $direccion;
		$this->celular = $celular;
		$this->email = $email;
		$this->estado = $estado;
	}

	public function getId(){
		return $this->id;
	}
	public function getTipoPersona(){
		return $this->tipo_persona;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getTipoDocumento(){
		return $this->tipo_documento;
	}
	public function getNumeroDocumento(){
		return $this->num_documento;
	}
		public function getDireccion(){
		return $this->direccion;
	}
	public function getCelular(){
		return $this->celular;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getEstado(){
		return $this->estado;
	}


	public function setId($id){
		$this->id = $id;
	}
	public function setTipoPersona($tipo_persona){
		$this->tipo_persona = $tipo_persona;
	}
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setTipoDocumento($tipo_documento){
		$this->tipo_documento = $tipo_documento;
	}
	public function setNumeroDocumento($num_documento){
		$this->num_documento = $num_documento;
	}
	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}
	public function setCelular($celular){
		$this->celular = $celular;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}	
}
?>