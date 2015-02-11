var vocales="aeiou";
var mail=/^[^@\s]+@[^@\.\s]+(\.[^@\.\s]+)+$/;
var num=/^\d{1,6} ?\w{0,5}$/;
var cons=/[^aeiou]$/;

function validarclave(){
	var camb=document.getElementById("clave");
	camb.value=camb.value.toUpperCase();
}
function cambiarMay(camp,valor){
	var campo=document.getElementById(camp);
	campo.value=campo.value.toUpperCase();
}
function validarfor(){
	
	if(document.foraltas.clave.value.length!=10){
		var erc=document.getElementById("errorclave");
		erc.innerHTML="&nbsp;Clave NO v&aacute;lida";
		document.foraltas.clave.focus();
		return false
	}
	if(document.foraltas.nombreesc.value.length<4 || cons.test(document.foraltas.nombreesc.value)){
		var ernom=document.getElementById("errornomb");
		ernom.innerHTML="&nbsp;Nombre NO v&aacute;lido&nbsp;";
		document.foraltas.nombreesc.focus();
		return false
	}
	if(document.foraltas.nivel.value==0){
		var erniv=document.getElementById("errorniv");
		erniv.innerHTML="&nbsp;Seleccione nivel";
		document.foraltas.nivel.focus();
		return false
	}
	if(document.foraltas.mod.value==0){
		var ertip=document.getElementById("errormod");
		ertip.innerHTML="&nbsp;Seleccione modalidad";
		document.foraltas.mod.focus();
		return false
	}
	if(document.foraltas.zona.value.length==0 || isNaN(document.foraltas.zona.value)){
		var erzon=document.getElementById("errorzona");
		erzon.innerHTML="&nbsp;Zona NO v&aacute;lida";
		document.foraltas.zona.focus();
		return false
	}
	if(document.foraltas.sector.value.length==0 || isNaN(document.foraltas.sector.value)){
		var ersec=document.getElementById("errorsec");
		ersec.innerHTML="&nbsp;Sector NO v&aacute;lido";
		document.foraltas.sector.focus();
		return false
	}
	if(document.foraltas.tel.value.length!=15 && document.foraltas.tel.value.length!=0){
		var ersec=document.getElementById("errortel");
		ersec.innerHTML="&nbsp;Tel&eacute;fono NO v&aacute;lido";
		document.foraltas.tel.focus();
		return false
	}
	if(document.foraltas.calle.value.length<4){
		var erc=document.getElementById("errorcalle");
		erc.innerHTML="&nbsp;Ingrese la calle";
		document.foraltas.calle.focus();
		return false
	}
	if(document.foraltas.num.value.length==0 || !num.test(document.foraltas.num.value)){
   		var errorn=document.getElementById("errornum");
		errorn.innerHTML="N&uacute;mero NO v&aacute;lido\n";
		document.foraltas.num.focus();
		return false;
   }
	if(isNaN(document.foraltas.cp.value) || document.foraltas.cp.value.length!=5){
		var ercp=document.getElementById("errorcp");
		ercp.innerHTML="&nbsp;CP NO v&aacute;lido";
		document.foraltas.cp.focus()
		return false
	}
	if(document.foraltas.loc.value.length==0){
		var erloc=document.getElementById("errorloc");
		erloc.innerHTML="&nbsp;<- Falta este valor";
		document.foraltas.loc.focus();
		return false
	}
	if(document.foraltas.mun.value.length==0){
		var ermun=document.getElementById("errormun");
		ermun.innerHTML="&nbsp;Municipio NO v&aacute;lido";
		document.foraltas.mun.focus();
		return false
	}
	document.foraltas.clave.submit();
}




