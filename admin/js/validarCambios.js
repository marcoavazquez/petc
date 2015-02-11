var vocales="aeiou";
var mail=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
var num=/^\d{1,6} ?\w{0,5}$/;
var cons=/[^aeiou]$/;

function cambiarMay(camp){
	var campo=document.getElementById(camp);
	campo.value=campo.value.toUpperCase();
}

function validarDir(){  // ************VALIDAR FORMULARIO DE UBICACIÓN DE LA ESCUELA//
	var error=document.getElementById("errorDom");
	if(document.fordir.calle.value.length<2  
	|| document.fordir.calle.value.length>60 
	|| !cons.test(document.fordir.calle.value)){
    	
		error.innerHTML="Nombre de calle no permitido";  
	   	document.fordir.calle.focus();
	   	return false;
	}
		
	if(document.fordir.numero.value.length==0 || !num.test(document.fordir.numero.value)){
   		error.innerHTML="N&uacute;mero NO v&aacute;lido\n";
		document.fordir.numero.focus();
		return false;
   }
   
   if(document.fordir.colonia.value.length<2  
	|| document.fordir.colonia.value.length>60 
	|| cons.test(document.fordir.colonia.value)){
    	
		error.innerHTML="Nombre de colonia no permitido";  
	   	document.fordir.colonia.focus();
	   	return false;
	}
	 if(document.fordir.cp.value.length!=5 || isNaN(document.fordir.cp.value)){
    	
		error.innerHTML="C&oacute;digo postal NO v&aacute;lido";  
	   	document.fordir.cp.focus();
	   	return false;
	}
	if(document.fordir.tel.value.length!=15){
    	
		error.innerHTML="Tel&eacute;fono NO v&aacute;lido";  
	   	document.fordir.tel.focus();
	   	return false;
	}
	if(document.fordir.email.value.length<7  
	|| document.fordir.email.value.length>30 
	|| !mail.test(document.fordir.email.value)){
    	
		error.innerHTML="Correo electr&oacute;nico no v&aacute;lido";  
	   	document.fordir.email.focus();
	   	return false;
	}
}
///////*************************************VALIDAR FORMULARIO DE ALUMNOS *************///////
function checaal(){ 
	for(i=1;i<=6;i++){
		var cg=new Array();
		cg[i]=document.getElementById("g["+i+"]").value;
		if(cg[i].length==0 || isNaN(cg[i]) || cg[i]>8){
			var erg=document.getElementById("erroral").innerHTML="&nbsp;Error en los datos";
		return false
		}
	}
}

function validaAE(nd){
	for(i=0;i<=nd;i++){
		var mI=new Array();
		var mF=new Array();
		var bm=new Array();
		var isrm=new Array();
		
		mI[i]=document.getElementById("mesInic["+i+"]").value;
		mF[i]=document.getElementById("mesFin["+i+"]").value;
		
		bm[i]=document.getElementById("bm["+i+"]").value;
		isrm[i]=document.getElementById("isrm["+i+"]").value;
		
		if(mI[i] > mF[i]){
			document.getElementById("errordoc").innerHTML="Alg&uacute;n periodo NO es v&aacute;lido";
			return false;
		}
		
		if(isNaN(bm[i]) || (isrm[i].length!=0 && bm[i].length==0) || isNaN(isrm[i]) || bm[i].length==0 || isrm[i].length==0 
			|| bm[i]<0 || isrm[i]<0){
			document.getElementById("errordoc").innerHTML="Valor NO num&eacute;rico o vac&iacute;o";
			return false;
		}
	}
}

function validaAEesp(nd){
	for(i=0;i<=nd;i++){
		var mI=new Array();
		var mF=new Array();
		var bm=new Array();
		var isrm=new Array();
		
		mI[i]=document.getElementById("mesInicesp["+i+"]").value;
		mF[i]=document.getElementById("mesFinesp["+i+"]").value;
		
		bm[i]=document.getElementById("bmesp["+i+"]").value;
		isrm[i]=document.getElementById("isrmesp["+i+"]").value;
		
		if(mI[i] > mF[i]){
			document.getElementById("erroresp").innerHTML="Alg&uacute;n periodo NO es v&aacute;lido";
			return false;
		}
		
		if(isNaN(bm[i]) || (isrm[i].length!=0 && bm[i].length==0) || isNaN(isrm[i]) || bm[i].length==0 || isrm[i].length==0 
			|| bm[i]<0 || isrm[i]<0){
			document.getElementById("erroresp").innerHTML="Valor NO num&eacute;rico o vac&iacute;o";
			return false;
		}
	}
}