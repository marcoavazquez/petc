<?php 

mysql_connect("localhost","root","");
mysql_select_db("petc");

//=======================================
//===FUNCIONES PARA INSERTAR LOS DATOS===
//=======================================
if(!isset($_POST['txt_puesto']))
$puesto="";

else
$puesto=$_POST['txt_puesto'];

if($puesto=="Docente" || $puesto=="Director"){
$rfc_doc=$_POST['txt_rfc_doc'];
$clave_doc=$_POST['txt_clave_doc'];	
$nom_doc=$_POST['txt_nombre_doc'];
$ape_pat_doc=$_POST['txt_ape_pat_doc'];
$ape_mat_doc=$_POST['txt_ape_mat_doc'];	
$plaza=$_POST['txt_plaza'];
$programa=$_POST['txt_prog_doc'];
$horario=$_POST['txt_horario_doc'];

$insertar_rec_hum_esc=mysql_query("insert into rec_hum_esc (clave_escuela,rfc,horario_trabajo,activo) values ('$clave_doc','$rfc_doc','$horario','si')");

$insetar_recursos_humanos=mysql_query("insert into recursos_humanos (rfc,nombre,ape_pat,ape_mat,puesto,Doble_plaza,activo,dentro_prog) values ('$rfc_doc','$nom_doc','$ape_pat_doc','$ape_mat_doc','$puesto','$plaza','si','$programa')");

$insertar_rec_hum_ciclo=mysql_query("insert into rec_hum_ciclo (clave_escuela,rfc,puesto,ciclo) values ('$clave_doc','$rfc_doc','$puesto','2011-2012')");

	echo "<script> alert('Se guardo al director o docente') </script>";
	print "<meta http-equiv=Refresh content='0 ; url= alta_personal.php'>";
	}
	
	
if($puesto=="Especialista"){
$rfc_esp=$_POST['txt_rfc_esp'];
$clave_esp=$_POST['txt_clave_esp'];
$nomb_esp=$_POST['txt_nombre_esp'];
$ape_pat_esp=$_POST['txt_ape_pat_esp'];
$ape_mat_esp=$_POST['txt_ape_mat_esp'];
$especialidad=$_POST['txt_esp'];

$especialistas=mysql_query("insert into especialistas (rfc,nombre,ape_pat,ape_mat,especialidad,clave,activo) values ('$rfc_esp','$nomb_esp','$ape_pat_esp','$ape_mat_esp','$especialidad','$clave_esp','si')");
$ins_rec_hum_ciclo=mysql_query("insert into rec_hum_ciclo (clave_escuela,rfc,puesto,ciclo) values ('$clave_esp','$rfc_esp','$puesto','2011-2012')");
	
	echo "<script> alert('Se guardo al especialista') </script>";
	print "<meta http-equiv=Refresh content='0 ; url= alta_personal.php'>";
	}	

//=======================================
//=FUNCIONES PARA DAR DE BAJA LOS DATOS==
//=======================================
if(!isset($_POST['boton1']))
$_POST['boton1']="";

else
switch($_POST['boton1']){
	case "Eliminar Registro":
	$rfc=$_POST['rfc_pro'];
	$eliminar_rec_hum_ciclo=mysql_query("delete from rec_hum_ciclo where rfc='$rfc'");
	$eliminar_rec_hum_esc=mysql_query("delete from rec_hum_esc where rfc='$rfc'");
	$cambio_recursos_humanos=mysql_query("update recursos_humanos set activo='no' where rfc='$rfc'");

	echo "<script> alert('Se ha eliminado el registro') </script>";
	print "<meta http-equiv=Refresh content='0 ; url= alta_personal.php'>";

break;

//=======================================
//=========CAMBIO DE LOS DATOS===========
//=======================================
case "Cambiar":
$puesto=$_POST['c_puesto'];
$rfc=$_POST['rfc_pro'];

$cc_rfc=$_POST['c_rfc'];
$cc_nombre=$_POST['c_nom'];
$cc_pat=$_POST['c_ape_pat'];
$cc_mat=$_POST['c_ape_mat'];
$cc_puesto=$_POST['c_puesto'];
$cc_plaza=$_POST['c_plaza'];
$cc_esc=$_POST['c_esc'];
$cc_esp=$_POST['c_esp'];
		

	if($puesto=="Docente" || $puesto=="Director"){
		
		$cambios_recursos_humanos=mysql_query("update recursos_humanos set rfc='$cc_rfc',nombre='$cc_nombre',ape_pat='$cc_pat',ape_mat='$cc_mat',puesto='$cc_puesto',Doble_plaza='$cc_plaza' where rfc='$rfc'");
		if($cc_esc=="nc"){
			echo "";
		}else{
		$cambios_rec_hum_esc=mysql_query("update rec_hum_esc set rfc='$cc_rfc',clave_escuela='$cc_esc' where rfc='$rfc'");
		}
		}
	
	if($puesto=="Especialista"){
		
		$cambios_especialista=mysql_query("update especialistas set rfc='$cc_rfc',nombre='$cc_nombre',ape_pat='$cc_pat',ape_mat='$cc_mat',especialidad='$cc_esp',clave='$cc_esc' where rfc='$rfc'");
		$rec_hum_ciclo_cambios=mysql_query("update rec_hum_ciclo set rfc='$cc_rfc',puesto='$cc_puesto',clave_escuela='$cc_esc' where rfc='$rfc'");		
		}
		
echo "los cambios se han realizado satisfactoriamente";
print "<meta http-equiv=Refresh content='0 ; url= alta_personal.php'>";
}//cierre del switch

?>