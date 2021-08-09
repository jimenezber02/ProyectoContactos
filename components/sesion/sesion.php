<?php
	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    	header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");

	if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    	header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
		header("Access-Control-Allow-Origin: *");

	session_start();

	if(!$_SESSION["autentificado"])
	{
		header("Location: salir.php");
	}
?>