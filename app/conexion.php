<?php
include_once 'config.php';
class conexion
{
	private static $conexion;

	public static function abrirConexion(){
		self::$conexion = new mysqli(NOMBRE_SERVIDOR,NOMBRE_USUARIO,PASSWORD,NOMBRE_BD);
		if(self::$conexion->connect_error){
			die("fallo de conexion: ".self::$conexion->connect_error);
		}else{
			//echo "Conectado Corectamente";
		}
}
		public static function cerrarConexion(){

		if(isset(self::$conexion)){
			self::$conexion->close();
			//echo "Conexion cerrada";
		}
	}

	public static function obtenerConexion(){
		return self::$conexion;
	}
}
?>