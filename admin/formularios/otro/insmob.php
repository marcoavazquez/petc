<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
	$clave=$_POST['clavemob'];

	$cantidad[]=$_POST['c1'];$cantidad[]=$_POST['c2'];$cantidad[]=$_POST['c3'];$cantidad[]=$_POST['c4'];
	$cantidad[]=$_POST['c5'];$cantidad[]=$_POST['c6'];$cantidad[]=$_POST['c7'];$cantidad[]=$_POST['c8'];
	$cantidad[]=$_POST['c9'];$cantidad[]=$_POST['c10'];$cantidad[]=$_POST['c11'];$cantidad[]=$_POST['c12'];
	$cantidad[]=$_POST['c13'];$cantidad[]=$_POST['c14'];$cantidad[]=$_POST['c15'];$cantidad[]=$_POST['c16'];
	$cantidad[]=$_POST['c17'];$cantidad[]=$_POST['c18'];$cantidad[]=$_POST['c19'];$cantidad[]=$_POST['c20'];
	$cantidad[]=$_POST['c21'];$cantidad[]=$_POST['c22'];$cantidad[]=$_POST['c23'];$cantidad[]=$_POST['c24'];
	$cantidad[]=$_POST['c25'];$cantidad[]=$_POST['c26'];$cantidad[]=$_POST['c27'];$cantidad[]=$_POST['c28'];
	$cantidad[]=$_POST['c29'];$cantidad[]=$_POST['c30'];$cantidad[]=$_POST['c31'];$cantidad[]=$_POST['c32'];
	$cantidad[]=$_POST['c33'];$cantidad[]=$_POST['c34'];$cantidad[]=$_POST['c35'];$cantidad[]=$_POST['c36'];
	$cantidad[]=$_POST['c37'];$cantidad[]=$_POST['c38'];
	
	$tipo[]=$_POST['tipo'];$tipo[]=$_POST['tipo2'];$tipo[]=$_POST['tipo3'];$tipo[]=$_POST['tipo4'];$tipo[]=$_POST['tipo5'];
	$tipo[]=$_POST['tipo6'];$tipo[]=$_POST['tipo7'];$tipo[]=$_POST['tipo8'];$tipo[]=$_POST['tipo9'];$tipo[]=$_POST['tipo10'];
	$tipo[]=$_POST['tipo11'];$tipo[]=$_POST['tipo12'];$tipo[]=$_POST['tipo13'];$tipo[]=$_POST['tipo14'];$tipo[]=$_POST['tipo15'];
	$tipo[]=$_POST['tipo16'];$tipo[]=$_POST['tipo17'];$tipo[]=$_POST['tipo18'];$tipo[]=$_POST['tipo19'];$tipo[]=$_POST['tipo20'];
	$tipo[]=$_POST['tipo21'];$tipo[]=$_POST['tipo22'];$tipo[]=$_POST['tipo23'];$tipo[]=$_POST['tipo24'];$tipo[]=$_POST['tipo25'];
	$tipo[]=$_POST['tipo26'];$tipo[]=$_POST['tipo27'];$tipo[]=$_POST['tipo28'];$tipo[]=$_POST['tipo29'];$tipo[]=$_POST['tipo30'];
	$tipo[]=$_POST['tipo31'];$tipo[]=$_POST['tipo32'];$tipo[]=$_POST['tipo33'];$tipo[]=$_POST['tipo34'];$tipo[]=$_POST['tipo35'];
	$tipo[]=$_POST['tipo36'];$tipo[]=$_POST['tipo37'];$tipo[]=$_POST['tipo38'];
	
	$mobiliario=array("Tazón 4 secciones D19","Plato postre 4.5\" D19","Tazón 5.5\" D19","Tazón postre 7.5\" D19","Plato trinche 10\" D19","Taza D19\"","Vaso grande #VG","Juego de cubiertos de plastico","Servilletero Tulipán","Salero médico texturizado de plastico","Molcajete chico de plastico","Jarra Lulu 5lts","XTRON8 Cuchillo","Cuchara #40 #MS40","Cucharón #301 de 225 ml 10cms","Colador cocina 20 cms. Extra grande, plastico","Freidora c/teflón #24 dec. s/ tapa","77235 Olla de presión 15 lts.","4008128 Olla recta 100 lts. T.F.","Vaporera #70","Contenedor redondo 120 lts. c/ tapa","Horno de microondas de 2.2 p3 de acero inoxidable","Computadora Compaq Presario monitor LCD 15\"","Mesa multiusos","Impresora HP Laser","Carro para impresora y fotocopiadora","Anaquel metálico de 5 entrepaños","Archivero metálico de 4 gavetas","Máquina de escribir Brother","Sillas de acero plegabler","Mesas de trabajo tipo banquete plegable con medidas de 2.44cm y 76cm grado comercial","Tanque de gas de 30 litros con medidor y mangueras","Juego pila plus (3 bud.)","Parrilla industrial 4 quemadoras, 60 cm. de frente","Enfriador, modelo VR-17 frente 7cm x 63 cm x 1.88 m 17p3. Certificación FIDE","Licuadora industrial con capacidad de 5 litros","Extractor de jugos para uso industrial en acabado aluminio","Estanterías de cromo de 6 anaqueles");
	
	$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc2008", $conexion) or die(mysql_error());
	$cant=count($mobiliario);
	for($i=0;$i<$cant;$i++){

$insEsc="insert into mobiliario(clave_escuela,mobiliario,cantidad,tipo) values('$clave','$mobiliario[$i]','$cantidad[$i]','$tipo[$i]')";

mysql_query($insEsc,$conexion) or die(mysql_error()) ;
}
ob_start();
header("refresh: 1; url = mobiliario.html");
ob_end_flush();
?>
</body>
</html>
