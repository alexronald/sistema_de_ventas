<?php
class Usuario
{
	private $id;	
	private $nombre;
	private $tipo_usuario;
	private $password;
	private $celular;	
	private $email;
	private $estado;

	public function __construct($id, $nombre, $tipo_usuario,$password, $celular, $email, $estado)
	{
		$this->id = $id;
		$this->nombre = $nombre;
		$this->tipo_usuario = $tipo_usuario;
		$this->password = $password;
		$this->celular = $celular;
		$this->email = $email;
		$this->estado = $estado;
	}

	public function getId(){
		return $this->id;
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getTipoUsuario(){
		return $this->tipo_usuario;
	}
	public function getPassword(){
		return $this->password;
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
	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
	public function setTipoUsuario($tipo_usuario){
		$this->tipo_usuario = $tipo_usuario;
	}
	public function setPassword($password){
		$this->password = $password;
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