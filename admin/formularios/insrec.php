<?php
$rfc=$_POST['rfc'];
$nombre=$_POST['nombre'];
$apepat=$_POST['ape_pat'];
$apemat=$_POST['ape_mat'];
$puesto=$_POST['puesto'];
$curp=$_POST['curp'];
$clave=$_POST['claveE'];

if($puesto=="" or $clave=="" or $rfc==""){
	echo "<br /><br /><span style=\"background-color:#ff0000; color: #5500; font-size:10?px;\">¡Error! Faltó un dato..</span>";
}
else{
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());

$insrc="insert into recursos_humanos(rfc,curp,nombre,ape_pat,ape_mat,puesto,clave_escuela) values('$rfc','$curp','$nombre','$apepat','$apemat','$puesto','$clave')";

mysql_query($insrc,$conexion) or die(mysql_error()) ;
echo "<html><body bgcolor=\"#adadad\"";
echo "<span style=\"background-color:#dadada; color: #005500; font-size:16px;\">¡Datos Insertados! al parecer correctamente</span>";
echo "<span style=\"background-color:#dddddd; color: #000055; font-size:15px;\">RFC: $rfc<br>$nombre&nbsp;$apepat&nbsp;$apemat&nbsp;es&nbsp;$puesto&nbsp;con curp:$curp&nbsp;en la escuela con clave:$clave";
echo "</span>";
echo "</body></html>";
header("refresh: 2; url = personal.html");
}
?>
