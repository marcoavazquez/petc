<?php
echo "<div style='display:none;'>";
SESSION_START();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";

exit();
}
echo "</div>";

include("conec.php");
$link=Conectarse();

extract($_REQUEST);

if(!isset($formag) || !isset($clavesc)){////////////////////////////////////////////////////////////////////////
	print "<meta http-equiv=Refresh content='0 ; url= petc.php'>";
}elseif($formag=="fdir"){//////////GUARDA DIRECCION, CP, TELEFONO Y EMAIL////////////////////////

	$email=str_replace("'"," ",$email);
	$email=str_replace("#"," ",$email);
	$email=str_replace(">"," ",$email);
	$email=str_replace("<"," ",$email);
	$tel=str_replace("'"," ",$tel);
	$tel=str_replace("#"," ",$tel);
	$tel=str_replace(">"," ",$tel);
	$tel=str_replace("<"," ",$tel);
	mysql_query("update tescuelas set sCalle='$calle',sNumero='$numero',sColonia='$colonia', nCP=$cp,sTelefono='$tel',sEmail='$email' 
				where sClaveEscuela like '$clavesc'");
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
	
}elseif($formag=="fal"){//////////////////////ACTUALIZA LA INFORMACION DE ALUMNOS////////////////////////
    
    mysql_query("insert into talumnos(sClaveEscuelaAl,sCicloAl)values('$clavesc','$cicloal')");
    $idalm=mysql_fetch_array(mysql_query("select * from talumnos order by idAlumnos desc;"));
    
   if($niv==2)
       $numg=6;
   else
       $numg=3;
   
   for($i=1;$i<=$numg;$i++){    
	mysql_query("insert into tnum_alum(idNumAlum,nAlumnos,nGrupos,nGrado)values('$idalm[0]','$a[$i]','$g[$i]','$i')");
   }
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
}elseif($formag=="fper"){//////////////////////////////APOYOS ECONOMICOS////////////////////////////////////////
	 
	 if(!isset($exdir))
	 	$d=1;
	else
		$d=0;
	 
	for($i=$d;$i<=$numdoc;$i++){
	
		if($rfc[$i]!="" and $ciclo[$i]!="" and $mesInic[$i]!="" and $bm[$i]!="" and $isrm[$i]!="" and $mesFin[$i]!=""){
			mysql_query("insert into tapoyos_economicos(nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal)
			values('$ciclo[$i]','$bm[$i]','$isrm[$i]','$rfc[$i]','$mesInic[$i]','$mesFin[$i]')");
		}
	}
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
}elseif($formag=="fesp"){///////////////////////ESPECIALISTAS//////////////////////////////////

	for($i=0;$i<$numesp;$i++){
		if($rfcesp[$i]!="" and $cicloesp[$i]!="" and $bmesp[$i]!="" and $isrmesp[$i]!=""){
			mysql_query("insert into tapoyos_economicos(nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal)
			values('$cicloesp[$i]','$bmesp[$i]','$isrmesp[$i]','$rfcesp[$i]','$mesInicesp[$i]','$mesFinesp[$i]')");
		}
	}
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
}elseif($formag=="fadyd"){/////////////////////////////DOCENTES Y DIRECTORES///////////////////////////////////////////////////////////////
	$rfc=str_replace("<"," ",$rfc);
	$rfc=str_replace("#"," ",$rfc);
	$rfc=str_replace("'"," ",$rfc);
	$nombre=str_replace("<"," ",$nombre);
	$nombre=str_replace("#"," ",$nombre);
	$nombre=str_replace("'"," ",$nombre);
	$apmat=str_replace("<"," ",$apmat);
	$apmat=str_replace("#"," ",$apmat);
	$apmat=str_replace("'"," ",$apmat);
	$appat=str_replace("<"," ",$appat);
	$appat=str_replace("#"," ",$appat);
	$appat=str_replace("'"," ",$appat);

	
	mysql_query("insert into trecursos_humanos
				(sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,nDoblePlaza,nPuesto,sFechaIngreso,sFechaNacimiento,nNivelEsctudios)
				values ('$rfc','$nombresc','$appat','$apmat','$plaza','$pst','$fechaIngreso','$fechaNac','$nivEstudio')");
	
	mysql_query("insert into trecursos_hum_ciclo(sRFCrhc,sCicloRhc,nPuestoRhc,sClaveEscuelaRhc,nEstado)
				values('$rfc','$ciclod','$pst','$clavesc',1)");
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
}elseif($formag=="faesp"){/////////////////////////////ESPECIALISTAS/////////////////////////////////////////////////////////
	$rfcesp=str_replace("<"," ",$rfcesp);
	$rfcesp=str_replace("#"," ",$rfcesp);
	$rfcesp=str_replace("'"," ",$rfcesp);
	$nombesp=str_replace("<"," ",$nombesp);
	$nombesp=str_replace("#"," ",$nombesp);
	$nombesp=str_replace("'"," ",$nombesp);
	$apmatesp=str_replace("<"," ",$apmatesp);
	$apmatesp=str_replace("#"," ",$apmatesp);
	$apmatesp=str_replace("'"," ",$apmatesp);
	$appatesp=str_replace("<"," ",$appatesp);
	$appatesp=str_replace("#"," ",$appatesp);
	$appatesp=str_replace("'"," ",$appatesp);
	$horesp=str_replace("<"," ",$horesp);
	$horesp=str_replace("#"," ",$horesp);
	$horesp=str_replace("'"," ",$horesp);
	mysql_query("insert into trecursos_humanos
				(sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,nPuesto,sFechaIngreso,sFechaNacimiento,nEspecialidad)
				values ('$rfcesp','$nombesp','$appatesp','$apmatesp',3,'$fechaIngresoEsp','$fechaNacEsp','$especialidad')");
	
	mysql_query("insert into trecursos_hum_ciclo(sRFCrhc,sCicloRhc,nPuestoRhc,sClaveEscuelaRhc,nEstado)
				values('$rfcesp','$cicloesp',3,'$clavesc',1)");
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
}elseif($formag=="sbpdf"){//////////////////////////////CARGAR ARCHIVO PDF///////////////////////////////////////////////////////
	if(!file_exists("../material/$clavesc"))
		mkdir("../material/$clavesc");
	
	require("subload.php");
   
	$fupload = new Upload();
    $fupload->setPath("../material/$clavesc/");
    $fupload->setFile("archivo");
    $fupload->save();
    echo $fupload->message;
	header("Location: cambesc.php?claves=$clavesc&fileup=1");
	
//******************************** CAPACITACIONES ***********************************//	
}elseif($formag=="fcap"){
	if($tcap=="1"){
		
		mysql_query("insert into tcapacitaciones(sClaveEscuelaCap,nCapacitacion,sFechaCap)
						values('$clavesc','$capacitacion','$fechacap')");
	
	}elseif($tcap=="2"){
		
		mysql_query("insert into tCapacitacion(sCapacitacion)values('$nuevaCap')");
	
	}
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";

}elseif($formag=="delal"){
	mysql_query("delete from grupos_num where id=$iddal");
	echo "<script>alert('Eliminado')</script>"; 
    print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
	
}elseif($formag=="delapec"){

	mysql_query("delete from tapoyos_economicos where idApoyosEcon=$idap");
	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";

}elseif($formag=="bajap"){

	mysql_query("update trecursos_hum_ciclo set nEstado=2 where sRFCrhc='$rfc' and sClaveEscuelaRhc='$clavesc' and sCicloRhc='$ciclo'");

	print "<meta http-equiv=Refresh content='0 ; url= cambesc.php?claves=$clavesc'>";
}else{

 echo "aqui pasa algo muy extraño que aun no comprendo :S";	

}
?>