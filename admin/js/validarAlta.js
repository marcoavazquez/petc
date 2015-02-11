var vocales="aeiou";
var mail=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
var num=/^\d{1,6} ?\w{0,5}$/;
var cons=/[^aeiou]$/;

function validarAlta(){
	var error=document.getElementById("errorAlta");
	if(document.foralta.cct.value.length!=10){
		errAlta.innerHTML="Clave NO v&aacute;lida";
		document.foralta.cct.focus();
		return false;
	}
	if(document.foralta.nombCT.value.length==0){
		errAlta.innerHTML="Nombre NO v&aacute;lido";
		document.foralta.nombCT.focus();
		return false;
	}	
	if(document.foralta.calle.value.length<2  
	|| document.foralta.calle.value.length>60 
	|| !cons.test(document.foralta.calle.value)){
    	
		error.innerHTML="Nombre de calle no permitido";  
	   	document.foralta.calle.focus();
	   	return false;
	}
		
	if(document.foralta.num.value.length==0 || !num.test(document.foralta.num.value)){
   		error.innerHTML="N&uacute;mero NO v&aacute;lido\n";
		document.foralta.num.focus();
		return false;
   }
   
   if(document.foralta.col.value.length<2  
	|| document.foralta.col.value.length>60 
	|| cons.test(document.foralta.col.value)){
    	
		error.innerHTML="Nombre de colonia no permitido";  
	   	document.foralta.col.focus();
	   	return false;
	}
	 if(document.foralta.cp.value.length!=5 || isNaN(document.foralta.cp.value)){
    	
		error.innerHTML="C&oacute;digo postal NO v&aacute;lido";  
	   	document.foralta.cp.focus();
	   	return false;
	}
	if(document.foralta.tel.value.length>10 || isNaN(document.foralta.tel.value) || document.foralta.tel.value.length<7){
    	
		error.innerHTML="Tel&eacute;fono NO v&aacute;lido";  
	   	document.foralta.tel.focus();
	   	return false;
	}
	if(document.foralta.nivel.selectedIndex==0 || document.foralta.mod.selectedIndex==0){
		error.innerHTML="Seleccione nivel y modalidad";  
	   	document.foralta.nivel.focus();
	   	return false;
	}
	if(document.foralta.zona.value.length==0 || document.foralta.sector.value.length==0 || isNaN(document.foralta.zona.value) || isNaN(document.foralta.sector.value)){
		error.innerHTML="Zona o Sector no v&aacute;lido";  
	   	document.foralta.apmatdirec.focus();
	   	return false;
		
	}
}