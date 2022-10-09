<?php
	include("../claseContacto.php");
	require_once('../sesion/sesion.php');

	$cont = new claseContacto();

	$contactos["contactos"] = $cont->getContactos($_SESSION['id_user']);
?>
		<h5>Datos de Contactos</h5>
		<table  class="table table-hover table-condensed table-bordered" bgcolor="Gold">
			<tr bgcolor="DodgerBlue">
				<td>Nombre</td>
				<td>Movil</td>
				<td>Correo</td>
				<td>Foto</td>	
			</tr>
			
			<?php
				if(count($contactos)){
					foreach ($contactos["contactos"] as $key => $value) {
						# code...
			?>
						<tr bgcolor="LightSkyBlue">
							<td><?php echo($value['nombre']); ?></td>
							<td><?php echo($value['movil']); ?></td>
							<td style="font-size: 1.2rem;color:red;"><?php echo($value['correo']); ?></td>
							<?php
								if($value['nombre_foto'] != "No hay foto"){?>
									<td><img style="height: 40px;width: 35px;" src="../img/fotoUSR/<?php echo($value['id']);?>/<?php echo($value['nombre_foto']);?>">
									</td>
								<?php
								}
								else{
									echo "<td><img style='height: 40px;width: 35px;' src='../img/default-logo.jpg'></td>";
								}
								?>
							
						</tr>
			<?php
					}//Cierra foreach
				}//Cierra if
			?>
			
		</table>