<?php
	
	include("../claseContacto.php");
	$ob = new claseContacto();

	$id = $_POST['id'];

	echo($ob->eliminarContacto($id));
?>