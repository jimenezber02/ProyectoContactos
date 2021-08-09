img=["guitarra1","guitarra2","guitarra3","guitarra4","guitarra5"];

$(document).ready(function()
{
	setInterval(imagenes,4000);
	var altura = $('.menu').offset().top;
	$(window).on('scroll',function(){
		if(($(window).scrollTop() > altura) && ($(window).width() < 800) ){
			$('.menu').addClass('menu-fixed');
		}else{
			$('.menu').removeClass('menu-fixed');
		}
	});

	mostrarC();
	$("#creditos").click(function()
	{
		creditoss();
	});
	$("#mostrar").click(function()
	{
		mostrarC();
	});
	$("#editar").click(function()
	{
		editar();
	});
	$("#eliminar").click(function()
	{
		eliminar();
	});
	
	//Obtiene los datos del formulario de agregar
	$("#form-a").on('submit', function(e)
	{

		e.preventDefault();
		nombre=$('#inputNombreA').val();
		movil=$("#inputMovilA").val();
		correo=$("#inputCorreoA").val();
		//foto=$("#imagen").val();
		if(nombre!="")
		{
			if(movil!="")
			{
				if(correo!="")
				{
					if(ValidaEmail(correo)==true)
					{
						$.ajax({
				       	type: 'POST',
				        url: '../components/guarda_contact.php',
				        data: new FormData(this),
				        contentType: false,
				        cache: false,
				        processData:false,
				        success:function(r)
						{
							console.log(r);
							if(r==1)
							{
								mostrarC();
								alertify.success("Registrado con exito");
								$('#modalAgrgar').modal('hide');
								$('#form-a').find('input[type=text],input[type=file],textarea').val('');
								$('#form-a')[0].reset();
								//document.getElementById("modalAgrgar").style.display="none";
							}
							else
							{
								alertify.error("Error al registrar/Revisa el formato de imagen");
								//$("#contenido").load("../components/mostrar.php");
								//$('#modalAgrgar').modal('hide');
								//$('#form-a').find('input[type=text],input[type=file],textarea').val('');
							}
						}
				                	//$('.submitBtn').attr("disabled","disabled");
				                //$('#fupForm').css("opacity",".5");
				    	});
					    $("#imagen").change(function()
						{
					    	var file = this.files[0];
						    var imagefile = file.type;
						    var match= ["image/jpeg","image/pjpeg","image/jpg"];
						    if(!((imagefile==match[0])&&(imageFile==match[1])&&(imagefile==match[2])))
						    {
						        alertify.error('Seleccione imagen valida (JPEG).');
						        $("#imagen").val('');
						        return false;
						    }
					  	});
					}
					else
					{
						alertify.error("Ingrese un correo válido.");
						$(correo).focus();
						return false;
					}
				}
				else
				{
					alertify.error("Introduce correo");
					return false;
				}

			}
			else
			{
				alertify.error("Ingrese numero valido");
				return false;
			}
		}
		else
		{
			alertify.error("Ingrese el nombre");
			return false;
		}
    	
	});

	//obtiene los datos del formulario editar
	$("#form-e").on('submit', function(e)
	{
		e.preventDefault();
		idPersona=$('#idPersona').val();
		nombre=$('#inputNombreE').val();
		movil=$("#inputMovilE").val();
		correo=$("#inputCorreoE").val();

		if(nombre!="")
		{
			if(movil!="")
			{
				if(correo!="")
				{
					if(ValidaEmail(correo)==true)
					{
						$.ajax({
				       	type: 'POST',
				        url: '../components/edita_contact.php',
				        data: new FormData(this),
				        contentType: false,
				        cache: false,
				        processData:false,
				        success:function(r)
						{
							console.log(r);
							if(r==1)
							{
								$("#contenido").load("../components/tablas/editar.php");
								alertify.success(nombre+" Editado con exito");
								$('#modalEdicion').modal('hide');
								$('#form-e').find('input[type=text],input[type=file],textarea').val('');
								//document.getElementById("modalAgrgar").style.display="none";
							}
							else
							{
								alertify.error("Error al editar/Revisa el formato de imagen");
								//$("#contenido").load("../components/mostrar.php");
								//$('#modalAgrgar').modal('hide');
								//$('#form-a').find('input[type=text],input[type=file],textarea').val('');
							}
						}
				                	//$('.submitBtn').attr("disabled","disabled");
				                //$('#fupForm').css("opacity",".5");
				    	});
					    $("#imagenE").change(function()
						{
					    	var file = this.files[0];
						    var imagefile = file.type;
						    var match= ["image/jpeg","image/pjpeg","image/jpg"];
						    if(!((imagefile==match[0])||(imagefile==match[1])))
						    {
						        alertify.error('Seleccione imagen valida (JPEG).');
						        $("#imagenE").val('');
						        return false;
						    }
					  	});
					}
					else
					{
						alertify.error("Ingrese un correo válido.");
						$(correo).focus();
						return false;
					}
				}
				else
				{
					alertify.error("Introduce correo");
					return false;
				}

			}
			else
			{
				alertify.error("Ingrese numero valido");
				return false;
			}
		}
		else
		{
			alertify.error("Ingrese el nombre");
			return false;
		}
    	

	});

	$("#EliminarD").click(function()
	{
		procesEliminar();
	});
	
});
	
function agregaNuevo()
{
	
	$('#contenido').load('../html/agregar_contacto.html');
	
}
function creditoss()
{
	$('#contenido').load('../html/creditos.php');
}

function mostrarC()
{
	$('#contenido').load('../components/tablas/mostrar.php');
}

function editar()
{
	$('#contenido').load('../components/tablas/editar.php');
}

function eliminar()
{
	$('#contenido').load('../components/tablas/eliminar.php');	
}


function ValidaEmail(email) 
{
	var correo=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return correo.test(email);
}

function edita(datos)
{
	dat = datos.split('||');
	$('#idPersona').val(dat[0]);
	$('#inputNombreE').val(dat[1]);
	$('#inputMovilE').val(dat[2]);
	$('#inputCorreoE').val(dat[3]);
	//$('#imagenE').val(dat[4]);
}

function eliminaDatos(datos)
{
	dat = datos.split('||');
	$('#idPersonaD').val(dat[0]);
	$('#inputNombreD').val(dat[1]);
	$('#inputMovilD').val(dat[2]);
	$('#inputCorreoD').val(dat[3]);
	$('#inputFotoD').val(dat[4]);
}

function procesEliminar()
{
	id = $('#idPersonaD').val();
	nombre = $('#inputNombreD').val();
	//movil=$('#inputMovilD').val();
	//correo=$('#inputCorreoD').val();
	//foto=$('#inputFotoD').val();

	cadena="id="+id;

	$.ajax({
		type:"POST",
		url:"../components/eliminar/eliminar_contact.php",
		data: cadena,
		success:function(r)
		{
			if(r==1)
			{
				alertify.success(nombre+" Eliminado con exito");
				$("#contenido").load("tablas/eliminar.php");
				$('#modalEliminar').modal('hide');
				//$('#form-e').find('input[type=text],input[type=file],textarea').val('');
			}
			else
			{
				alertify.error("Ocurri&oacute; un error");
			}
		}
	});
}

var cont=0;
function imagenes()
{
	document.getElementById("foto").src="../img/"+img[cont]+".jpg";

	if(cont==4)
	{
		cont=0;
	}
	cont++;
}
