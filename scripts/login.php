<?php
include_once 'app/ControlSesion.php';
include_once 'app/repositorioUsuario.php';
include_once 'app/Usuario.php';
include_once 'app/conexion.php';
if(isset($_POST['iniciar'])){
	conexion::abrirConexion();
	$nombre = $_POST['usuario'];
	$password = $_POST['password'];
if (!empty($nombre)) {
	if (!empty($password)) {
		$usuario = repositorioUsuario::obtenerUsuarioNombrePassword(conexion::obtenerConexion(),$nombre,$password);
	if($usuario->getNombre() == $nombre and $usuario->getPassword() == $password){
		ControlSesion::iniciarSesion($usuario->getId(),$usuario->getNombre());
		header('location: '.RUTA_INICIO,true,301);
        exit();
	}else{
		header('location: '.SERVIDOR,true,301);
        exit();
	}
	}
}else {
	header('location: '.SERVIDOR,true,301);
        exit();
}

}
?>