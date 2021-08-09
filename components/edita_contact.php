<?php
	include("claseContacto.php");
	$obj = new claseContacto();
	
	$data = array(
		'idP' 			=> $_POST['idPersona'],
		'nombre' 		=> $_POST['inputNombreE'],
		'movil' 		=> $_POST['inputMovilE'],
		'correo' 		=> $_POST['inputCorreoE'],
		'nom_archivo' 	=> $_FILES['imagenE']['name'],
		'tipo_archivo' 	=> $_FILES['imagenE']['type'],
		'tamanio' 		=> $_FILES['imagenE']['size'],
		'name' 			=> $_FILES['imagenE']['tmp_name']
	);

	echo($obj->editarContacto($data));
?>