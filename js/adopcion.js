// JavaScript Document
$(document).ready(function(){ // Script del Navegador
	$('#menuPrincipal>li').hover(
		function(){
			$(".submenu",this).stop(true,true).slideDown('fast');
			$(this).css({background: "#666"});
			$("a",this).css({color: "#fff"}); 
		},
		function(){
			$(".submenu",this).slideUp('fast');
			$(this).css({background: "#ccc", color: "#333"});
			$("a",this).css({color: "#333"});
		}
	);
	
	$('#menuPrincipal>li').click(		
		function(){			
			if($(".submenu", this).is(":hidden")){
				$(".submenu",this).slideDown('fast');
				$(this).css({background: "#666"});
				$("a",this).css({color: "#fff"}); 
			}else{
				$(".submenu",this).slideUp('fast');				
			}
		}			
	);
	
	$("#noticiasScroller").simplyScroll({
		speed: 2,
		autoMode: 'loop',
		horizontal: false
	});
	
	$('#ObjetivoAjax').click(
		function(){
			$("#contenido").load("galeria.php");
		}
	);	
	
	$("div.subMenuDesplegable").not('.selected').hide();
	
	$(".encabezado").hover(
		function(){			
			$(this).css({background:"#CDA8CF"});			
			var desplegable = $(this).parent().find("div.subMenuDesplegable");		
			$('.encabezado').parent().find("div.subMenuDesplegable").not(desplegable).slideUp('slow');
			desplegable.slideToggle('slow');
			e.preventDefault();
		},
		function(){
			$(this).css({background:"#CCC"});			
		}
	);
	
});

function creaXMLHTTP()
{
	if (window.XMLHttpRequest)
	{// IE7+, Firefox, Chrome, Opera, Safari
	  var xmlhttp=new XMLHttpRequest();
	}
	else
	{// IE6, IE5
	  var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
	  	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("contenido").innerHTML=xmlhttp.responseText;
		}
	}
	return xmlhttp;
}
function muestraContenido(pagina)
{	
	xmlhttp = creaXMLHTTP();
	xmlhttp.open("GET", pagina, true);
	//pageTracker._trackPageview(pagina);
	xmlhttp.send();
}
function menuInicio()
{
	document.write("<div id='menuInicio'>"); 
		document.write("<ul>");   
			document.write("    <li><a href='index.php'>Inicio</a></li>"); 
			/*document.write("    <li><a href='../contacto.html'>Contacto</a></li>"); 
			document.write("    <li><a href='../mapa.html'>Mapa del sitio</a></li>");*/
		document.write("</ul>"); 
	document.write("</div>");
}
function menuPrincipal()
{
	var opciones = new Array('"quees.php"', '"quienes.php"', '"certificado.php"', '"consejo.php"', '"fases.php"', '"proceso.php"', '"requisitosN.php"'/*'"adopciones.php"'*/, '"requisitosI.php"', '"formulario.php"');
	document.write("<ul id='menuPrincipal'>"); 
		document.write("<li><a href='#'>La Adopci&oacute;n</a>"); 
			document.write("<ul class='submenu'>");  					
				document.write("<li><a href='javascript:muestraContenido(" + opciones[0] + ")'>¿Qu&eacute; es la adopci&oacute;n?</a></li>");
				document.write("<li><a href='javascript:muestraContenido(" + opciones[1] + ")'>¿Qui&eacute;nes pueden adoptar?</a></li>");
				document.write("<li><a href='javascript:muestraContenido(" + opciones[2] + ")'>¿Qué es el certificado de idoneidad?</a></li>");
				document.write("<li><a href='javascript:muestraContenido(" + opciones[3] + ")'>¿Qué es el consejo t&eacute;cnico de adopciones?</a></li>");								
			document.write("</ul>"); 
		document.write("</li>"); 
		//document.write("<li><a href='javascript:muestraContenido(" + opciones[4] + ")'>El proceso de adopci&oacute;n</a></li>"); 
		//document.write("<li><a href='javascript:muestraContenido(" + opciones[5] + ")'>Adopciones internacionales</a></li>");		
		document.write("<li><a href='#'>Proceso de Adopci&oacute;n</a>");
			document.write("<ul class='submenu'>");  					
				document.write("<li><a href='javascript:muestraContenido(" + opciones[4] + ")'>Fases del proceso</a></li>");
				document.write("<li><a href='javascript:muestraContenido(" + opciones[5] + ")'>Adopci&oacute;n nacional e internacional</a></li>");
				//document.write("<li><a href='javascript:muestraContenido(" + opciones[5] + ")'>Adopci&oacute;n internacional</a></li>");				
			document.write("</ul>");
		document.write("</li>");		
		document.write("<li><a href='#'>Requisitos de Adopci&oacute;n</a>"); 		 
			document.write("<ul class='submenu'>");  					
				document.write("<li><a href='javascript:muestraContenido(" + opciones[6] + ")'>Adopci&oacute;n nacional</a></li>");
				document.write("<li><a href='javascript:muestraContenido(" + opciones[7] + ")'>Adopci&oacute;n internacional</a></li>");				
			document.write("</ul>");
		document.write("</li>");		
		document.write("<li><a href='javascript:muestraContenido(" + opciones[8] + ")'>Para mayores informes</a></li>");
		document.write("<li><a href='documentos/reglamento.pdf' target='_blank'>Reglamento</a></li>"); 		 
	document.write("</ul>");
} 
 