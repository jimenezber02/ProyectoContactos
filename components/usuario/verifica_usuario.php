
 <?php
 	include("../claseUsuario.php");

	$nombre_usu = $_GET['nombre'];
	$contrasena = $_GET['clave'];

	$ob = new claseUsuario();

	echo($ob-> iniciar_sesion($nombre_usu,$contrasena));
?>

