<?php  
	/**
	 * 
	 */
	include("conexion.php");
	class claseContacto
	{
		private $conexion;
		private $conn;
		private $contactos;
		
		function __construct()
		{
			# code...
			$this->conexion = new conexion();
			$this->conn = $this->conexion ->conectar();

			$this->contactos = array();
		}

		//Retorna todos los contactos
		function getContactos($id_user){
			$sentencia = "SELECT * FROM contactos WHERE id_usuario=$id_user ORDER BY id asc";
			$resultado = mysqli_query($this->conn,$sentencia);
			while ($i = mysqli_fetch_array($resultado)) {
				# code...
				$this->contactos[] = $i;
			}
			return $this->contactos;
		}

		function guardarContacto($datos){
			$sentencia= "INSERT into contactos (nombre,movil,correo,nombre_foto) values (
						'$datos[nombre]',
						'$datos[movil]',
						'$datos[correo]',
						'No hay foto'
			)";

			if(mysqli_query($this->conn,$sentencia)){
				$datos['elId'] = mysqli_insert_id($this->conn);
				if($datos['nom_archivo'] != ""){
					$this->insertaFoto($datos);
				}

				return 1;
			}else{
				return 0;
			}
		}

		function insertaFoto($datos){
			$ruta="../img/fotoUSR/".$datos['elId'];
			//Se crea la carpeta
			if(file_exists($ruta) == false)
			{
				$ruta = mkdir("../img/fotoUSR/".$datos['elId'],0700);
			}
			if(($datos['tipo_archivo']=="image/jpeg")||($datos['tipo_archivo']=="image/pjpeg")||($datos['tipo_archivo']=="image/jpg")){
				if($datos['tamanio'] < 16000000)
				{
					$sentencia = "UPDATE contactos SET nombre_foto='$datos[nom_archivo]' WHERE id = '$datos[elId]' ";
					if(mysqli_query($this->conn,$sentencia)){
						//se mueve el archivo a la carpeta
						move_uploaded_file($datos['name'],"../img/fotoUSR/$datos[elId]/".$datos['nom_archivo']);
						return 1;
					}
				}
			}
			return 0;
		}

		function eliminarContacto($id){
			$sentencia="DELETE FROM contactos WHERE id='$id'";
			return mysqli_query($this->conn,$sentencia);
		}

		
		function editarContacto($datos){
			$sentencia= "UPDATE contactos SET 
						nombre='$datos[nombre]',
						movil='$datos[movil]',
						correo='$datos[correo]' 
			WHERE id='$datos[idP]'";

			if(mysqli_query($this->conn,$sentencia)){
				$datos['elId'] = $datos['idP'];
				if($datos['nom_archivo'] != ""){
					$this->insertaFoto($datos);
				}
				return 1;
			}else{
				return 0;
			}
		}
	}
?>