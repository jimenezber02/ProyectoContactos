<?php 
    //session_start();
    include("conexion.php");
    include("sesion/sesion.php");
    $ob = new conexion();
    $conn = $ob-> conectar();

    if(isset($_SESSION['id_user']))
    {
        $dat = $_SESSION['id_user'];
    }
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Pagina principal</title>
	<link rel="stylesheet" type="text/css" href="../css/pagina.css?2021ffh5h" >
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<!--<link rel="stylesheet" type="text/css" href="../css/bootstrap-4.3.1-dist/css/bootstrap.css">-->
	<!--<link rel="stylesheet" type="text/css" href="../css/formulario.css">-->
    <link type="text/css" href="../alertifyjs/css/alertify.min.css" rel="stylesheet">
    <link type="text/css" href="../alertifyjs/css/themes/default.min.css" rel="stylesheet">
	<!--<link href="../css/fontawesome-free-5.8.2-web/css/all.css" rel="stylesheet"/>-->

	<!--<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    
	<script type="text/javascript" src="../js/principal.js?12ffhf521"></script>
    <!--<script type="text/javascript" src="../js/valida_contactos.js"></script>-->
	<!--<script type="text/javascript" src="../JS/popper.min.js"></script>-->
    <script type="text/javascript" src="../alertifyjs/alertify.min.js"></script>
	<!--<script type="text/javascript" src="../css/bootstrap-4.3.1-dist/js/bootstrap.js"></script>-->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</head>

<body>
	<div id="fondo">

		<div id="caja1">
			<center><h3 id="cajati">P&Aacute;GINA DEDICADA A LA PROMOCION DE LA M&Uacute;SICA</h3> </center>
			<center>
                <!--Abre php para mostrar dato del usuario actual-->
                <?php
                    $sentencia="SELECT * FROM usuario WHERE (id='$dat')";
                    $resultado=mysqli_query($conn,$sentencia);
                    while($i=mysqli_fetch_array($resultado))
                    {
                        echo("<h5 style='color: white;'>@".$i['nombre_user']."</h5>");
                    }
                ?><!--Cierra php-->
            </center>
			<center><a style="color: white; text-decoration: none;" href="sesion/Salir.php">Cerrar Sesion</a>
			<i class="fa fa-user"></i></center>
		</div>
        
		<section>
            <div class="articulos">
                <div id="caja2" class="article">
                    <!--Menú de navegación-->
                    <ul class="menu">
                        <li>
                            <a data-bs-toggle="modal" data-bs-target="#modalAgrgar" href="#">
                                <center>Registrar contactos</center>
                            </a>
                        </li>
                        <li><a id="mostrar" href="#"><center>Mostrar contactos</center></a></li>
                        <li><a id="eliminar" href="#"><center>Eliminar contactos</center></a></li>
                        <li><a id="editar" href="#"><center>Modificar contactos</center></a></li>
                        <li><a id="creditos" href="#"><center>Cr&eacute;ditos</center></a></li>
                    </ul>
                </div>

                <div id="contenido" class="article">
                    <p>soy la caja3 del medio para contener información de las otras páginas</p>
                </div>

                <div id="caja4" class="article">
                    <img id="foto" src="../img/guitarra1.jpg">
                </div>
            </div>
             
        </section>
        
        <!--Esta caja va afuera de la caja principal-->
        
		<div id="caja5"> 
            <!--Soy el pie de la página-->
             <footer>
                
                <h4 id="footerr"><em><center>DERECHOS RESERVADOS</center></em></h4>
            </footer>
        </div>
</div>
</body>
</html>

	<!--Aqui van los modals-->
		<!--Modal de editar-->
	 <div class="container">
        <div class="row">
            <div class="col">
                <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document"> 
                        <div class="modal-content">
                            <div id="modal-header">
                                <button class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    <center><h3 class="modal-tittle">Edici&oacute;n de datoss</h3></center>
                                    <div class="modal-body">
                                    <form method="POST" action="#" id="form-e" enctype="multipart/form-data">
                                        <input type="text" hidden="" name="idPersona" id="idPersona">
                                        <label style="color: blue;">Nombre Contacto</label>
                                        <input type="text" id="inputNombreE" class="form-control input-sm" placeholder="Nombre de contacto" name="inputNombreE" autofocus>

                                        <label style="color: blue;">M&oacute;vil</label>
                                        <input type="text" id="inputMovilE" class="form-control input-sm" placeholder="N&uacute;mero de M&oacute;vil" name="inputMovilE">

                                        <label style="color: blue;">Correo</label>
                                        <input type="tex" id="inputCorreoE" class="form-control input-sm" placeholder="Correo Electr&oacute;nico" name="inputCorreoE">
                               
                                        <label style="color: blue;">Ingrese Foto</label>
                                        
                                        <input type="file" name="imagenE" id="imagenE" class="form-control-file">
                                    </div>
                                    <div class="modal-footer">
                                       
                                        <button id="guardaE" class="btn btn-warning" type="submit">Actualizar Datos</button>
                                    </div>
                                    </form><!--cierra form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <!--Modal Agregar datos-->
    	<div class="container">
        <div class="row">
            <div class="col">
                <div class="modal fade" id="modalAgrgar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document"> 
                        <div class="modal-content">
                            <div id="modal-header">
                                <button class="close" data-bs-dismiss="modal" aria-hidden="true">&times;</button>
                                    <center><h3 class="modal-tittle">A&ntilde;adir contacto</h3></center>
                                    <div class="modal-body">
                                    <form method="POST" action="#" id="form-a" enctype="multipart/form-data">

                                        <label style="color: blue;">Nombre Contacto</label>
                                        <input type="text" class="form-control input-sm" placeholder="Nombre contacto" id="inputNombreA" name="inputNombreA">

                                        <label style="color: blue;">M&oacute;vil</label>
                                        <input type="text" id="inputMovilA" name="inputMovilA" class="form-control input-sm" placeholder="N&uacute;mero de M&oacute;vil">

                                        <label style="color: blue;">Correo</label>
                                        <input type="text" id="inputCorreoA" name="inputCorreoA" class="form-control input-sm" placeholder="Correo Electr&oacute;nico">
                               
                                        <input type="hidden" name="MAX_FILE_SIZE" value="16000000">
                                        <label style="color: blue;">Ingrese Foto</label>
                                        <input type="file" name="imagen" id="imagen" class="form-control-file">
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-danger" class="close" data-bs-dismiss="modal" id="cerrarAD">Cerrar</button>
                                        <button  id="guardaC" class="btn btn-primary" type="submit">Guardar</button>
                                    </div>
                                    </form>

                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 


    <!--modal de eliminar datos-->
    	<div class="container">
        <div class="row">
            <div class="col">
                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document"> 
                        <div class="modal-content">
                            <div id="modal-header">
                                <!--<button class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->
                                    <center><h3 class="modal-tittle" style="color: red
                                    ;">Eliminar contacto</h3></center>
                                    <div class="modal-body">
                                        <input type="text" name="idPersonaD" id="idPersonaD" hidden="">
                                        <label>Nombre Contacto</label>
                                        <input type="text" id="inputNombreD" name="inputNombreD" class="form-control input-sm" placeholder="Nombre contacto" required="required" autofocus>

                                        <label>M&oacute;vil</label>
                                        <input type="text" id="inputMovilD" name="inputMovilD" class="form-control input-sm" placeholder="N&uacute;mero de M&oacute;vil" required="required">

                                        <label>Correo</label>
                                        <input type="tex" id="inputCorreoD" name="inputCorreoD" class="form-control input-sm" placeholder="Correo Electr&oacute;nico" required="required">
                               
                                        <label>Seud&oacute;nimo</label>
                                        <input type="tex" id="inputFotoD" name="inputFotoD" class="form-control input-sm" placeholder="Seud&oacute;nimo">
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-bs-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-danger" id="EliminarD">Eliminar</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    



