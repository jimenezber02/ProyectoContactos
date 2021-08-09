var band=1;

$(document).ready(function()
{
	$("#reg").click(function()
	{
		nombre = $('#inputNombre').val();
		contrasena = $('#inputPassword').val();
		//e.preventDefault();
		if(nombre != "")
		{
			if(contrasena != "")
			{
				registrar_datos(nombre,contrasena);
			}
			else
			{
				alertify.error("Introduzca contrasena");
				return false;
			}
		}
		else{
			alertify.error("Introduzca usuario");
			return false;
		}

	});
	document.getElementById("canC").onclick = volver;
});


function volver()
{
	//window.location.href = "index.html";
	$(location).attr('href','../index.html');
	//history.back(-1);
}

function registrar_datos(nombre,contrasena)
{
	cadena = "nombre="+nombre+ "&contrasena="+contrasena;
	//alert(cadena);

	$.ajax(
	{
		type:"POST",
		url: "../components/usuario/creaUsuario.php",

		//dataType:'json',
		data: cadena,

		success:function(r)
		{
			//alert(data);
			//console.log(r);
			if(r > 0)
			{
				alertify.success("Registro realizado");
				setInterval(volver,2000);
			}
			else
			{
				alertify.error("Error");
			}

		}
	});/*
	if(band ==1 )
	{
		setInterval(volver,2000);
		//window.location.href = "../index.html";
	}*/
	/*
	//alert(nombre+" "+contrasena);
	$.post("http://localhost/Proyecto_RS/components/guarda_usuario.php",
	{
		nombre: nombre, contrasena: contrasena,
	},function(data,status)
	{
			alertify.success(data+" Enviado correctamente");
			//alertify("Se enviaron los datos correctamente"+data);

		//alert("Valores: \n" + data + "\nEstatus: " + status);
	});*/
}