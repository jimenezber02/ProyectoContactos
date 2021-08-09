var band=1;
window.onload=function()
{
	$("#ing").click(function()
	{
		usuario = $("#inputUsuario").val();
		contrasena = $("#inputContrasena").val();
		if(usuario != "")
		{
			if(contrasena != "")
			{
				verificar_datos(usuario,contrasena);
			}
			else
			{
				alertify.error("Introduzca contrasena");
			}
		}
		else{
			alertify.error("Introduzca usuario");
			return false;
		}
	});

}
function datos_erroneos()
{
	$(location).attr('href','../index.html');
}
function verificar_datos(usuario,contrasena)
{
	//alert(usuario+contrasena);
	cadena = "nombre=" + usuario + "&clave="+ contrasena;
	//alert(cadena);
	$.ajax(
	{
		type: "GET",
		url: "./components/usuario/verifica_usuario.php",
		data: cadena,
		success:function(r)
		{
			console.log(r);
			//var cad=r.toString();
			console.log(r);
			if(r == 0)
			{
				//band=2;
				//alert(r);
				alertify.error("Usuario no encontrado");

			}
			else
			{
				$(location).attr('href','./components/pagina.php');
			}
		}

	});
	/*
	$.get("http://localhost/Proyecto_RS/components/verifica_usuario.php",
	{
		usuario: usuario, contrasena: contrasena,
	},function(data,status)
	{
		alert(data+"Correcto");
			//alertify("Se enviaron los datos correctamente"+data);

		//alert("Valores: \n" + data + "\nEstatus: " + status);
	});*/
}