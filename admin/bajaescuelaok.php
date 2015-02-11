<?php
session_start();
include("conec.php");
$link=Conectarse();

$clave=$_POST['clave'];
$ciclo=$_POST['ciclos'];
mysql_query("update tescuelas set nAfiliada=0 where sClaveEscuela like '$clave'");//Cambia a NO las escuelas

print "<meta http-equiv=Refresh content='1 ; url= petc.php'>";

?>