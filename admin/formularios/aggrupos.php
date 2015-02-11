<?php
$clave_escuela=$_POST['clave_escuela'];
$grado=$_POST['grado'];
$grupo=$_POST['grupo'];
$rfc=$_POST['rfc'];

$conexion = mysql_connect("localhost", "root", "");

mysql_select_db("petc", $conexion) or die(mysql_error());

$insG="insert into grupos(grado,grupo,rfc,clave_esc) values('$grado','$grupo','$rfc','$clave_escuela')";

mysql_query($insG,$conexion) or die(mysql_error()) ;
?>