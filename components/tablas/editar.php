<?php
	include("../claseContacto.php");
	//Objeto de la clase contacto
	$obj = new claseContacto();

	//Otiene todos los contactos
	$contactos['contactos'] = $obj->getContactos(); 
?>
<center>
<div class="row">
	<div class="col-sm-12">
		<h5>Editar Contactos</h5>
		<center>
		<table  class="table table-hover table-condensed table-bordered" bgcolor="HotPink">
			<tr bgcolor="DodgerBlue">
				<td>Nombre</td>
				<td>Movil</td>
				<td>Correo</td>
				<td>Foto</td>
				<td>Editar</td>	
			</tr>
			<?php
				if(count($contactos))
				{
					foreach ($contactos['contactos'] as $key => $i) {
						# code...
						$datos=$i['id']."||".$i['nombre']."||".$i['movil']."||".$i['correo']."||".$i['nombreFoto'];
						?>
						<tr bgcolor="LightSkyBlue">
							<td>
								<center><?php echo($i['nombre']); ?></center>
							</td>
							<td>
								<center><?php echo($i['movil']); ?></center>
							</td>
							<td style="font-size: 10px;color:blue;">
								<center><?php echo($i['correo']); ?></center>
							</td>
							<?php
								if($i['nombreFoto'] != "No hay foto"){?>
									<td>
										<img style="height: 40px;width: 35px;" 
										src="../img/fotoUSR/<?php echo($i['id']);?>/<?php echo($i['nombreFoto']);?>">
									</td>
								<?php
								}
								else{
									echo('<td>Sin foto</td>');
								}
							?>
							<td>
								<center>
									<button class="btn btn-warning fa fa-pencil-alt" data-toggle="modal" data-target="#modalEdicion" onclick="edita('<?php echo($datos);?>');">
										
									</button>
								</center>
							</td>
						</tr>
					<?php
					}
				}
			?>
		</table>
	</center>
</div>
</div>
</center>