<?php 
	include("../claseUsuario.php");
	
	$usu = $_POST['nombre'];
	$pass = $_POST['contrasena'];

	$ob = new claseUsuario();
	echo($ob-> registrar($usu,$pass));
?>