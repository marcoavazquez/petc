<?php
$clave_escuela=$_POST['clave_escuela'];
$a1=$_POST['a1'];
$g1=$_POST['g1'];
$a2=$_POST['a2'];
$g2=$_POST['g2'];
$a3=$_POST['a3'];
$g3=$_POST['g3'];
$a4=$_POST['a4'];
$g4=$_POST['g4'];
$a5=$_POST['a5'];
$g5=$_POST['g5'];
$a6=$_POST['a6'];
$g6=$_POST['g6'];

$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());
$insC="insert into grupos_num(clave_escuela,a1,g1,a2,g2,a3,g3,a4,g4,a5,g5,a6,g6)values('$clave_escuela',$a1,'$g1','$a2','$g2','$a3','$g3','$a4','$g4','$a5','$g5','$a6','$g6')";

mysql_query($insC,$conexion) or die(mysql_error()) ;
echo "<center><span style=\"background-color:#00ff00; color: #005500; font-size:36px;\">¡Datos Insertados!</span>";
header("refresh: 1; url = cantidad.php");
?>