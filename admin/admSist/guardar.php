<?php
include("../seg/conec.php");
$link=Conectarse();
extract($_REQUEST);

if(!isset($for)){
	echo "Ha ocurrido un error";	
}elseif($for=="esc"){
	//********************************ESCUELAS**********************************************
	mysql_query("update tescuelas set sClaveEscuela='$clave', sNombre='$nomb', sLocalidad='$loc', sMunicipio='$mun', nModalidad='$mod',
					nNivel='$nivel', nZona='$zona', nSector='$sector' where sClaveEscuela like '$claveo'");
					
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=esc'>";
					
}elseif($for=="pers"){
	//********************************ESCUELAS**********************************************
	mysql_query("update trecursos_humanos set sRFC='$rfc', sNombreRH='$nombp', sApellidoPaternoRH='$appat', sApellidoMaternoRH='$apmat' 
	 				 where sRFC like '$rfco'");
				print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=pers'>";
}elseif($for=="esp"){
	mysql_query("insert into tespecialidad(sEspecialidad)values('$nesp')");	
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=esp'>";
}elseif($for=="delesp"){
	mysql_query("delete from tespecialidad where idEspecialidad=$id");	
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=esp'>";
}elseif($for=="nivE"){
	mysql_query("insert into tnivel_estudios(sNivelEstudios)values('$nne')");	
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=nivest'>";
}elseif($for=="delNivE"){
	mysql_query("delete from tnivel_estudios where idNivelEstudios=$id");	
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=nivest'>";
}elseif($for=="pst"){
	mysql_query("insert into tpuestos(sPuesto)values('$npst')");	
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=pst'>";
}elseif($for=="delpst"){
	mysql_query("delete from tpuestos where idPuesto=$id");	
	print "<meta http-equiv=Refresh content='0 ; url= index.php?edt=pst'>";
}

?>