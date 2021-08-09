window.onload=function()
{
	$(document).ready(function()
	{
		$("#guardaC").click(function()
		{
			nombre=$('#inputNombreA').val();
			movil=$("#inputMovilA").val();
			correo=$("#inputCorreoA").val();
			foto=$("#imagen").val();
			valida_contact(nombre,movil,correo,foto);
		});

	});
	
}

function ValidaEmail(email) 
{
	var correo=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return correo.test(email);
}

function enviaDatos(nombre,movil,correo,foto)
{
	cadena="nombre="+nombre+"&movil"+movil+"&correo="+correo+"&foto="+foto;
	//alert(cadena);
	
	$.ajax(
	{
		type:"POST",
		url:"http://localhost/Proyecto_RS/components/guarda_contact.php",
		
		//dataType:'json',
		data: cadena,

		success:function(r)
		{
			//alert(data);
			//console.log(r);
			if(r==1)
			{
				alertify.success("Registro realizado");	
			}
			else
			{
				alertify.error("Error");
			}
			
		}
	});
}

function valida_contact(nombre,movil,correo,foto)
{
	if(nombre!="")
	{
		if(movil!="")
		{
			if(correo!="")
			{
				if(ValidaEmail(correo)==true)
				{
					if(foto!="")
					{
						enviaDatos(nombre,movil,correo,foto);
					}
					else
					{
						alertify.error("Subir Foto");
						return false;
					}		
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
			
}