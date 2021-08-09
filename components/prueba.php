<!DOCTYPE html>
<html>
<head>
	<title>sesion</title>
</head>
<body>
	<h1>hola</h1>
<?php 
	//session_start();
	include("conexion.php");
	include("sesion.php");

	if(isset($_SESSION['id_user']))
	{
		$dat=$_SESSION['id_user'];
	}
	$sentencia="SELECT * FROM $nombre_base.$nombre_tabla1 WHERE (id='$dat')";
    $resultado=mysqli_query($enlace,$sentencia);

    while($i=mysqli_fetch_array($resultado))
    {
        echo("id".$i['id']." Nombre ".$i['nombreUser']);
    }
	/*$sentencia1 = "SELECT * FROM $nombre_base.$nombre_tabla1 WHERE (id='$dat')";
	$resultado=mysqli_query($enlace,$sentencia1);
	while($i=mysqli_fetch_array($resultado))
	{
		$idd=$i['id'];
		$nombre=$i['nombreUser'];
	}*/
	//echo($_SESSION['id_user']);*/
?>
<h1></h1>
<a href="Salir.php">Salir</a>
</body>
</html>