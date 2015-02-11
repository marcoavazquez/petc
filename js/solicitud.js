
// JavaScript Document
jQuery(function($){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
});

$(document).ready(function() {
	var fecha = new Date();
	var maxDate = fecha.getFullYear()-0;
	var minDate = fecha.getFullYear()-120;
	
	
	$("#fecharegistro").datepicker({
		showOn: 'button',
   		buttonImageOnly: true,
   		buttonImage: 'imagenes/calendar.gif',
		//changeMonth: true,
		//changeYear: true,		
		//yearRange: minDate + ':' + maxDate
	});
	
	$("#fnacimiento").datepicker({
		showOn: 'button',
   		buttonImageOnly: true,
   		buttonImage: 'imagenes/calendar.gif',
		changeMonth: true,
		changeYear: true,		
		yearRange: minDate + ':' + maxDate
	});
	
	$("#fnacimiento2").datepicker({
		showOn: 'button',
   		buttonImageOnly: true,
   		buttonImage: 'imagenes/calendar.gif',
		changeMonth: true,
		changeYear: true,		
		yearRange: minDate + ':' + maxDate
	});
	
	$("#muestraedad").change(
		function(){
			var edad1;
			edad1 = document.getElementById('fnacimiento').value;
			$("#contfecha").load("muestraedad.php?edad1="+edad1);
			
		}
	);	
			
	$("#numDependientes").change(
		function(){
			var num;
			num = document.getElementById('numDependientes').value;							
			$("#contDependientes").load("numDependientes.php?num="+num);
		}		
	);
	
	$('#tabs').tabs();
});
 
function numHijos()
{	
	for (var i=1; i<=10; i++){
		document.write("<option value='" + i + "'>" + i + "</option>");
	}
}



function calculaEdad(fechacualquiera){
		
	hoy=new Date() 
   	//alert(hoy) 

   	//calculo la fecha que recibo 
   	//La descompongo en un array 
   	var array_fecha = fechacualquiera.split("/") 
   	//si el array no tiene tres partes, la fecha es incorrecta 
   	if (array_fecha.length!=3) 
      	 return false 

   	//compruebo que los ano, mes, dia son correctos 
   	var anio 
   	anio = parseInt(array_fecha[2]); 
   	if (isNaN(anio)) 
      	 return false 

   	var mes 
   	mes = parseInt(array_fecha[1]); 
   	if (isNaN(mes)) 
      	 return false 

   	var dia 
   	dia = parseInt(array_fecha[0]);	
   	if (isNaN(dia)) 
      	 return false 


   	//si el año de la fecha que recibo solo tiene 2 cifras hay que cambiarlo a 4 
   	 

   	//resto los años de las dos fechas 
   	var edad=hoy.getFullYear() - anio - 1; //-1 porque no se si ha cumplido años ya este año 

   	//si resto los meses y me da menor que 0 entonces no ha cumplido años. Si da mayor si ha cumplido 
   	if (hoy.getMonth() + 1 - mes < 0) //+ 1 porque los meses empiezan en 0 
      	 return edad 
   	if (hoy.getMonth() + 1 - mes > 0) 
      	 return edad+1 

   	//entonces es que eran iguales. miro los dias 
   	//si resto los dias y me da menor que 0 entonces no ha cumplido años. Si da mayor o igual si ha cumplido 
   	if (hoy.getUTCDate() - dia >= 0) 
      	 return edad + 1 

   	return edad 
	
	
}

/*function fecha(){
	var fecha = new Date();
	fecha = new Date (año, mes, dia)
	document.getElementById("fecharegistro").value=fecha;
	alert('Fecha');
	
}*/


function imprimeEdad(){
	//var edad = calculaEdad();
	//var fechaActual = new Date();													//fecha del servidor
	//var fechaN = document.getElementById("fnacimiento").value;						//variable donde se encuentra la fecha que introdujo el usuario
	//var arrayFechaN = fechaN.split("/");											//manda a llamar la fecha que se introdujo
	//var newFechaN = new Date(arrayFechaN[2], arrayFechaN[1], arrayFechaN[0]);		//obtiene la fecha (dia,mes,año)
	//var edad = fechaActual.getFullYear() - newFechaN.getFullYear();					
	
//	var suma = edad;
	var fechaN = document.getElementById("fnacimiento").value;
	//var muestra = suma/10000;
	var edadF = calculaEdad(fechaN);
	document.getElementById("edadvisita").value=edadF;								//muestra la edad del usuario
	menoredad (edadF);
	alert(edadF);																//mensaje
menoredad(edadF);
	
}


function resta(){

	var rest = document.getElementById("edadvisita").value;
	var sum = rest - 1;
	alert(sum);
}



function imprimeEdadTutor(){

//	var suma = edad;
	var fechaN = document.getElementById("fnacimiento2").value;
	//var muestra = suma/10000;
	var edadF = calculaEdad(fechaN);
	document.getElementById("edadvisita2").value=edadF;								//muestra la edad del usuario
	alert(edadF);
	//mensaje
	
}
/*function compruebaEdad(){
		if(document.getElementById("edadvisita").value<18){
			document.getElementById('litab2').style.display='block';
			document.getElementById('tab2').style.display='block';
			alert('Edad menor');
			}
	}
*/

function menoredad (edadF){
	//var menor;
	//menor = document.getElementById('edadvisita').value;
	
	if(edadF<18)
	{
		
		document.getElementById('tab2').style.display='block';
		document.getElementById('litab2').style.display='block';
		document.getElementById('nombre2').disabled=false;
		document.getElementById('paterno2').disabled=false;
		document.getElementById('materno2').disabled=false;
		document.getElementById('apellidoc2').disabled=false;
		document.getElementById('fnacimiento2').disabled=false;
		document.getElementById('edadvisita2').disabled=false;
		document.getElementById('edad2').disabled=false;
		document.getElementById('sexo2').disabled=false;
		document.getElementById('civil2').disabled=false;
		document.getElementById('lnacimiento2').disabled=false;
		document.getElementById('gsanguineo2').disabled=false;
		document.getElementById('rh2').disabled=false;
		document.getElementById('ocupacion2').disabled=false;
		document.getElementById('escolaridad2').disabled=false;
		document.getElementById('religion2').disabled=false;
		document.getElementById('calle2').disabled=false;
		document.getElementById('numI2').disabled=false;
		document.getElementById('numE2').disabled=false;
		document.getElementById('colonia2').disabled=false;
		document.getElementById('cp2').disabled=false;
		document.getElementById('ciudad2').disabled=false;
		document.getElementById('estado2').disabled=false;
		document.getElementById('pais2').disabled=false;
		document.getElementById('localidad2').disabled=false;
		document.getElementById('telcasa2').disabled=false;
		document.getElementById('teloficina2').disabled=false;
		document.getElementById('celular2').disabled=false;
		document.getElementById('radio2').disabled=false;
		document.getElementById('email2').disabled=false;
		document.getElementById('referido2').disabled=false;
		document.getElementById('aseguradora2').disabled=false;
		document.getElementById('emergencia2').disabled=false;
		document.getElementById('notas2').disabled=false;
		document.getElementById('nacionalidad2').disabled=false;		
				
	}else{
				
		document.getElementById('tab2').style.display='none';
		document.getElementById('litab2').style.display='none';
		document.getElementById('nombre2').disabled=true;
		document.getElementById('paterno2').disabled=true;
		document.getElementById('materno2').disabled=true;
		document.getElementById('apellidoc2').disabled=true;
		document.getElementById('fnacimiento2').disabled=true;
		document.getElementById('edadvisita2').disabled=true;
		document.getElementById('edad2').disabled=true;
		document.getElementById('sexo2').disabled=true;
		document.getElementById('civil2').disabled=true;
		document.getElementById('lnacimiento2').disabled=true;
		document.getElementById('gsanguineo2').disabled=true;
		document.getElementById('rh2').disabled=true;
		document.getElementById('ocupacion2').disabled=true;
		document.getElementById('escolaridad2').disabled=true;
		document.getElementById('religion2').disabled=true;
		document.getElementById('calle2').disabled=true;
		document.getElementById('numI2').disabled=true;
		document.getElementById('numE2').disabled=true;
		document.getElementById('colonia2').disabled=true;
		document.getElementById('cp2').disabled=true;
		document.getElementById('ciudad2').disabled=true;
		document.getElementById('estado2').disabled=true;
		document.getElementById('pais2').disabled=true;
		document.getElementById('localidad2').disabled=false;
		document.getElementById('telcasa2').disabled=true;
		document.getElementById('teloficina2').disabled=true;
		document.getElementById('celular2').disabled=true;
		document.getElementById('radio2').disabled=true;
		document.getElementById('email2').disabled=true;
		document.getElementById('referido2').disabled=true;
		document.getElementById('aseguradora2').disabled=true;
		document.getElementById('emergencia2').disabled=true;
		document.getElementById('notas2').disabled=true;
		document.getElementById('nacionalidad2').disabled=true;
			
	}
	
function ocultaTabla(){
	
		document.getElementById('tab1').style.display='none';
		document.getElementById('litab1').style.display='none';
		
	
	
	
}
	
}
	
function dibujaTabla(){
	
	
	


}