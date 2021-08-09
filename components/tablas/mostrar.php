<?php
	include("../claseContacto.php");
	$cont = new claseContacto();

	$contactos["contactos"] = $cont->getContactos();
?>
<center>

		<h5>Datos de Contactos</h5>
		<center>
		<table  class="table table-hover table-condensed table-bordered" bgcolor="Gold">
			<tr bgcolor="DodgerBlue">
				<td>ID</td>
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
							
							<td><?php echo($value['id']);?></td>
							<td><?php echo($value['nombre']); ?></td>
							<td><?php echo($value['movil']); ?></td>
							<td style="font-size: 10px;color:red;"><?php echo($value['correo']); ?></td>
							<?php
								if($value['nombreFoto'] != "No hay foto"){?>
									<td><img style="height: 40px;width: 35px;" src="../img/fotoUSR/<?php echo($value['id']);?>/<?php echo($value['nombreFoto']);?>">
									</td>
								<?php
								}
								else{
									echo('<td>Sin foto</td>');
								}
								?>
							
						</tr>
			<?php
					}//Cierra foreach
				}//Cierra if
			?>
			
		</table>
	</center>

</center>