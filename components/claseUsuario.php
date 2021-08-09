<?php 
	/**
	 * 
	 */
	include("conexion.php");
	class claseUsuario
	{
		private $conexion;
		private $conn;

		function __construct()
		{
			# code...
			$this->conexion = new conexion();
			$this->conn = $this->conexion->conectar();
		}

		public function registrar($user,$pass){
			$sentencia= "INSERT into usuario (nombreUser,contrasena) 
						values ('$user','$pass')";

			return mysqli_query($this->conn,$sentencia);
		}

		public function iniciar_sesion($user,$pass){
			
			$i = mysqli_fetch_array($this->busca_usuario($user,$pass));

			if ($result = mysqli_num_rows($this->busca_usuario($user,$pass)) != 0)
			{
				session_start();
				$_SESSION['autentificado'] = true;
				$_SESSION['id_user'] = $i['id'];
				return $result;
				//header("location: ../html/pagina.php");
			}else{
				return 0;
			}
		}

		public function busca_usuario($user,$pass){
			$sentencia = "SELECT * FROM usuario WHERE (nombreUser='$user' AND contrasena = '$pass')";
			//$sentencia1="SELECT * FROM $nombre_base. $nombre_tabla1 WHERE nombreUser  LIKE '$nombre_usu' ";
			return mysqli_query($this->conn,$sentencia);
		}
	}
?>