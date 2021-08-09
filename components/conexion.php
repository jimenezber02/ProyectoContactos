<?php
	/**
	 * 
	 */
	class conexion
	{
		private $servidor = "localhost";
		private $usuario = "root";
		private $contraseña = "";
		private $nombre_base = "proyectocontactos";
		private $nombre_tabla1 = "usuario";
		private $nombre_tabla2 = "contactos";

		public function conectar(){
			$conexion = mysqli_connect($this->servidor,$this->usuario,$this->contraseña,$this->nombre_base);

			return $conexion;
		}
	}
	$conn = new conexion();

	if(!($conn-> conectar())){
		echo "Error de conexion";
	}
?>