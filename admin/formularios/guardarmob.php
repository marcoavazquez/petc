<?php
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());
extract($_REQUEST); 

$consmob="insert into mob_esc(clave_esc_mob,id_mobi,estado,cantidad) values ()";


for($i=1;$i<=58;$i++){
	$consmob="insert into mob_esc(clave_esc_mob,idmobi,estado,cantidad) values ('$clave','$ID[$i]','$estado[$i]','$cantidad[$i]')";
	
	mysql_query($consmob,$conexion) or die(mysql_error());
}
?>