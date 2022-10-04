<?php
	include("../claseContacto.php");
	$obj = new claseContacto();

	$contactos['contactos'] = $obj->getContactos();
?>
<center>

		<h5>Eliminar Contactos</h5>
		<center>
		<table  class="table table-hover table-condensed table-bordered" bgcolor="BurlyWood">
			<tr bgcolor="DodgerBlue">
				<td>Nombre</td>
				<td>Movil</td>
				<td>Correo</td>
				<td>Foto</td>
				<td>Eliminar</td>	
			</tr>
			<?php
				if(count($contactos)){
					foreach ($contactos["contactos"] as $key => $value) {
						$data = $value['id']."||".$value['nombre']."||".$value['movil']."||".$value['correo']."||".$value['nombre_foto'];
			?>
						<tr bgcolor="LightSkyBlue">
							<td><center>
								<?php echo($value['nombre']);?></center>
							</td>
							<td>
								<center><?php echo($value['movil']);?></center>
							</td>
							<td style="font-size: 10px;color:red;">
								<center><?php echo($value['correo']);?></center>
							</td>
							<?php
								if($value['nombre_foto'] != "No hay foto"){?>
									<td><img style="height: 40px;width: 35px;" src="../img/fotoUSR/<?php echo($value['id']);?>/<?php echo($value['nombre_foto']);?>"></td>
								<?php
								}
								else{
									echo('<td>Sin foto</td>');
								}
								?>
							<td>
								<center>
									<button class="btn btn-danger fa fa-trash" data-toggle="modal" data-target="#modalEliminar" onclick="eliminaDatos('<?php echo($data); ?>');">
									</button>
								</center>
							</td>
						</tr>
			<?php
					}//Cierra foreach
				}//cierra if
			?>
		</table>
	</center>

</center>