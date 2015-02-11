<?php
$clave_escuela=$_POST['clave_escuela'];
$nombre_escuela=$_POST['nombre_escuela'];
$municipio=$_POST['municipio'];
$tipo=$_POST['tipo'];
$localidad= $_POST['localidad'];
$zona=$_POST['zona'];
$sector=$_POST['sector'];
$nodocentes=$_POST['nodocentes'];
//$calle=$_POST['calle'];
//$num=$_POST['num'];
//$colonia=$_POST['colonia'];
//$cp=$_POST['cp'];
//$turno=$_POST['turno'];
//$telefono=$_POST['telefono'];
//$email=$_POST['email'];


$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());
if($clave_escuela=="" or $nombre_escuela=="" or $zona=="" or $sector=="" or $nodocentes==""){
	echo "Error: <br /> Faltó un dato";
	ob_start();
header("refresh: 1; url = escuelas.php");
ob_end_flush();
}else{
$insEsc="insert into escuelas(clave_escuela,nombre_escuela,localidad,municipio,tipo,zona,sector,No_docentes) values('$clave_escuela','$nombre_escuela','$localidad','$municipio','$tipo','$zona','$sector','$nodocentes')";
//$instel="insert into esc_telemail(clave_escuela,telefono,email) values('$clave_escuela','$telefono','$email')";
mysql_query($insEsc,$conexion) or die(mysql_error()) ;
//mysql_query($instel,$conexion) or die(mysql_error()) ;
}
?>