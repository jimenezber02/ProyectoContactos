<html>
<head>
<title>Archivos</title>
</head>
<body>
	<?php

	$servidor="localhost";
	$usuario="root";
	$contraseña="";
	$nombre_base="proyectoContactos";
	$nombre_tabla1="usuario";
	$nombre_tabla2="contactos";

	$enlace = mysqli_connect($servidor,$usuario,$contraseña)or die("No se puede establecer conexion");


	$sentencia1 = "CREATE DATABASE $nombre_base";

	if (mysqli_query($enlace, $sentencia1))
	{
		echo("<p> Base de datos <strong><em>$nombre_base</em></strong> creada correctamente.</p>");
	}

	else
	{
		echo ("<br> <strong><em>Advertencia:</em></strong> ". mysql_error ());
	}

	//crea tabla de usuarios
	$sentencia= "CREATE TABLE $nombre_base.$nombre_tabla1(
	id int(11) AUTO_INCREMENT,
	nombreUser varchar(20) not null,
	contrasena varchar(20) not null,

	PRIMARY KEY(id)) ";

	if (mysqli_query($enlace, $sentencia))
	{
		echo("<p>Tabla <strong><em>$nombre_tabla1</em></strong> creada correctamente.</p>");
	}

	else
	{
		echo ("<br> <strong><em>Advertencia:</em></strong> ". mysql_error ());
	}

	//crea tabla contactos
	$sentencia= "CREATE TABLE $nombre_base.$nombre_tabla2(
	id int(11) AUTO_INCREMENT,
	nombre varchar(20) not null,
	movil varchar(18) not null,
	correo varchar(30) not null,
	nombreFoto varchar(50) not null,

	PRIMARY KEY(id)) ";

	if (mysqli_query($enlace, $sentencia))
	{
		echo("<p>Tabla <strong><em>$nombre_tabla2</em></strong> creada correctamente.</p>");
	}

	else
	{
		echo ("<br> <strong><em>Advertencia:</em></strong> ". mysql_error ());
	}
	?>
</body>
</html>