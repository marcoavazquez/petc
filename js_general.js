function seleccionar(){
	if(document.selcamp.mostrarpor.value=="escuelas"){
		var esc=document.getElementById("escopc");
		esc.className="si";

		var per=document.getElementById("peropc");
		per.className="no";
	}else if(document.selcamp.mostrarpor.value=="personal"){
		var perp=document.getElementById("peropc");
		perp.className="si";

		var escp=document.getElementById("escopc");
		escp.className="no";
	}
}
function mostrar(i){
	if(i==1)
	var taburl="tablas.php?";
	else if(i==2)
	var taburl="tabpdf.php?";

	taburl+="mostrar=" + document.selcamp.mostrarpor.value;

	if(document.selcamp.mostrarpor.value=="escuelas"){

	if(document.selcamp.clave.checked) //clave de la escuela
		taburl+="&clave=si";
	else
		taburl+="";
	if(document.selcamp.nombrect.checked)  //Nombre de la escuela
		taburl+="&nombct=si";
	else
		taburl+="";
	if(document.selcamp.loc.checked)  //Localidad
		taburl+="&loc=si";
	else
		taburl+="";
	if(document.selcamp.mun.checked)  //Municipio
		taburl+="&mun=si";
	else
		taburl+="";
	if(document.selcamp.dom.checked)  //Domicilio
		taburl+="&dom=si";
	else
		taburl+="";
	if(document.selcamp.tel.checked)    //Telefono
		taburl+="&tel=si";
	else
		taburl+="";
	if(document.selcamp.email.checked)   //email
		taburl+="&email=si";
	else
		taburl+="";
	if(document.selcamp.nivel.checked)  //Nivel
		taburl+="&nivel=si&mniv="+document.selcamp.mniv.value;
	else
		taburl+="";
	if(document.selcamp.mod.checked)  //Modalidad
		taburl+="&mod=si&mmod="+document.selcamp.mmod.value;
	else
		taburl+="";
	if(document.selcamp.zona.checked)  //Zona
		taburl+="&zona=si";
	else
		taburl+="";
	if(document.selcamp.sec.checked)   //Sector
		taburl+="&sec=si";
	else
		taburl+="";
	if(document.selcamp.dir.checked)  //Nombre del director
		taburl+="&dir=si";
	else
		taburl+="";
	if(document.selcamp.esp.checked)  //Especialista
		taburl+="&esp=si";
	else
		taburl+="";
	if(document.selcamp.cic.checked)  //Ciclo escolar
		taburl+="&cic=si&ciclos="+ document.selcamp.ciclos.value;
	else
		taburl+="";

		taburl+="&orderby="+ document.selcamp.orderby.value;

}else{

	if(document.selcamp.rfc.checked)
		taburl+="&rfc=si";
	else
		taburl+="";
	if(document.selcamp.nombp.checked)
		taburl+="&nomb=si";
	else
		taburl+="";
	if(document.selcamp.puesto.checked)
		taburl+="&pues=si";
	else
		taburl+="";
	if(document.selcamp.clavepct.checked)
		taburl+="&clave=si";
	else
		taburl+="";
	if(document.selcamp.nombpct.checked)
		taburl+="&esc=si";
	else
		taburl+="";
	if(document.selcamp.dp.checked)
		taburl+="&dp=si";
	else
		taburl+="";
	if(document.selcamp.gimp.checked)
		taburl+="&g=si";
	else
		taburl+="";
	if(document.selcamp.apec.checked)
		taburl+="&apec=si";
	else
		taburl+="";
		
		taburl+="&dntrop="+document.selcamp.dntrop.value;
		taburl+="&ordebyp="+document.selcamp.ordenapor.value;
}
	if(i==1){
		tab.location.href=taburl;
	}else if(i==2){
		var linkpdf=document.getElementById("btnpdf");
		linkpdf.href=taburl;
	}
}