<?php

	include("claseContacto.php");
	$obj = new claseContacto();

	//Para obtener información de la imagen  
	$nom_archivo = "";
	$tipo_archivo = "";
	$tamanio = "";
	$name = "";
	if(isset($_FILES['imagen']['name']))
	{
		$nom_archivo=$_FILES['imagen']['name'];
		$tipo_archivo=$_FILES['imagen']['type'];
		$tamanio=$_FILES['imagen']['size'];
		$name=$_FILES['imagen']['tmp_name'];
	}
	
	$data = array(
		'nombre' => $_POST['inputNombreA'],
		'movil' => 	$_POST['inputMovilA'],
		'correo' =>	$_POST['inputCorreoA'],
		'nom_archivo' => $nom_archivo,
		'tipo_archivo' => $tipo_archivo,
		'tamanio' => $tamanio,
		'name' => $name
	);

	echo($obj->guardarContacto($data));
?>