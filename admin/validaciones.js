// Validaciones
function cambiarMay(camp){
	var campo=document.getElementById(camp);
	campo.value=campo.value.toUpperCase();
}
function checadir(){ 
	//var m=document.getElementById("error");
	//var m2=document.getElementById("error2");	
	if (document.fordir.dir.value.length == 0 || isNaN(document.fordir.cp.value) || isNaN(document.fordir.tel.value)) {
       document.getElementById("errordic").innerHTML="Verifique sus datos";
	   document.fordir.dir.focus();
	   return false;
	}
}	   
//==================================================================
function checaal(){ 
	for(i=1;i<=6;i++){
		var cg=new Array();
		cg[i]=document.getElementById("g["+i+"]").value;
		if(cg[i].length==0 || isNaN(cg[i])){
			var erg=document.getElementById("erroral").innerHTML="&nbsp;Error en los datos";
		return false
		}
	}
}
/* /==================================================================	   
if (document.formmat.exam.value.length == 0) {
       m.innerHTML= "Selecciona un archivo\n";
	   document.formmat.exam.focus();
	   return false;} 
//===================Añadir personal=================================	
*/  
function checaadd(){  
	if (document.foradyd.rfc.value.length == 0 || document.foradyd.rfc.value.length < 10) {
       document.getElementById("erroradoc").innerHTML= "RFC NO v&aacute;lido";
	   document.foradyd.rfc.focus();
	   return false;
	}
	if (document.foradyd.nombre.value.length == 0) {
		document.getElementById("erroradoc").innerHTML= "Escriba el Nombre\n";
		document.foradyd.nombre.focus();
		return false;
	}
	if (document.foradyd.appat.value.length == 0) {
       document.getElementById("erroradoc").innerHTML= "Escriba el Apellido Paterno\n";
	   document.foradyd.appat.focus();
	   return false;
	}
	if (document.foradyd.apmat.value.length == 0) {
		document.getElementById("erroradoc").innerHTML= "Escriba el Apellido Materno\n";
		document.foradyd.apmat.focus();
		return false;
	}
	if (document.foradyd.hora.value.length == 0) {
		document.getElementById("erroradoc").innerHTML= "Escriba el Horario\n";
		document.foradyd.hora.focus();
		return false;
	}
}
function checaae(){ 
//alta especialista	   
	if (document.foraesp.rfcesp.value.length == 0) {
		document.getElementById("erroraesp").innerHTML= "Escriba el RFC \n";
		document.foraesp.rfcesp.focus();
		return false;
	}
	if (document.foraesp.nombesp.value.length == 0) {
		document.getElementById("erroraesp").innerHTML= "Escriba el Nombre\n";
		document.foraesp.nombesp.focus();
		return false;
	}
	if (document.foraesp.appatesp.value.length == 0) {
		document.getElementById("erroraesp").innerHTML= "Escriba el Apellido Paterno\n";
		document.foraesp.appatesp.focus();
		return false;
	}
	if (document.foraesp.apmatesp.value.length == 0) {
		document.getElementById("erroraesp").innerHTML= "Escriba el Apellido Materno\n";
		document.foraesp.apmatesp.focus();
		return false;
	}
}
