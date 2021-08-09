
<?php
	include("../claseUsuario.php");
	$obj = new claseUsuario();

	$nombre_usu = $_POST['nombre'];
	$contrasenia = $_POST['contrasena'];

 	echo($obj->registrar($nombre_usu,$contrasenia));
?>
