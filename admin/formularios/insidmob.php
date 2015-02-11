<?php
extract($_REQUEST);
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());

$insidmob="insert into mobiliario(id_mob,mobiliario,costo,tipo) values('$idmob','$mobiliario',0,'$tipo')";
echo "guardado correctamente... :D";
mysql_query($insidmob,$conexion) or die(mysql_error()) ;

echo $mobiliario."&nbsp;con un ID:&nbsp;".$idmob."&nbsp;con un costo de 0 y es de ".$tipo;
header("refresh: 3; url = mobiliario.html");

?>