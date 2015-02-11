<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Insertar mobiliario</title>
</head>

<body>
<h1>Mobiliario</h1>
<?php
$escuela=$_POST['escuela'];
$clave=$_POST['clave'];
$localidad=$_POST['localidad'];
$municipio=$_POST['municipio'];

$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc2008", $conexion) or die(mysql_error());

$insEsc="insert into escuelas(clave,escuela,localidad,municipio) values('$clave','$escuela','$localidad','$municipio')";

mysql_query($insEsc,$conexion) or die(mysql_error()) ;

?>
<form action="insmob.php" method="post">
	<table border="4">
		<tr>
			<th>Mobiliario/Escuelas(cantidad)</th><th><?php echo "$clave<br>$escuela</th>";?><th>Tipo<br />(computo/cocina)</th>
		</tr>
		<tr>
			<td>Tazón 4 secciones D19</td><td><input type="text" name="c1" /></td><td><input type="text" name="tipo" size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Plato postre 4.5" D19</td><td><input type="text" name="c2" /></td><td><input type="text" name="tipo2"  size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Tazón 5.5" D19</td><td><input type="text" name="c3" /></td><td><input type="text" name="tipo3"  size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Tazón postre 7.5" D19</td><td><input type="text" name="c4" /></td><td><input type="text" name="tipo4"  size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Plato trinche 10" D19</td><td><input type="text" name="c5" /></td><td><input type="text" name="tipo5"  size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Taza D19"</td><td><input type="text" name="c6" /></td><td><input type="text" name="tipo6"  size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Vaso grande #VG</td><td><input type="text" name="c7" /></td><td><input type="text" name="tipo7"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Juego de cubiertos de plastico</td><td><input type="text" name="c8" /></td><td><input type="text" name="tipo8"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Servilletero Tulipán</td><td><input type="text" name="c9" /></td><td><input type="text" name="tipo9"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Salero médico texturizado de plastico</td><td><input type="text" name="c10" /></td><td><input type="text" name="tipo10"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Molcajete chico de plastico</td><td><input type="text" name="c11" /></td><td><input type="text" name="tipo11"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Jarra Lulu 5lts</td><td><input type="text" name="c12" /></td><td><input type="text" name="tipo12"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>XTRON8 Cuchillo</td><td><input type="text" name="c13" /></td><td><input type="text" name="tipo13"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Cuchara #40 #MS40</td><td><input type="text" name="c14" /></td><td><input type="text" name="tipo14"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Cucharón #301 de 225 ml 10cms</td><td><input type="text" name="c15" /></td><td><input type="text" name="tipo15"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Colador cocina 20 cms. Extra grande, plastico</td><td><input type="text" name="c16" /></td><td><input type="text" name="tipo16"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Freidora c/teflón #24 dec. s/ tapa</td><td><input type="text" name="c17" /></td><td><input type="text" name="tipo17"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>77235 Olla de presión 15 lts.</td><td><input type="text" name="c18" /></td><td><input type="text" name="tipo18" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>4008128 Olla recta 100 lts. T.F. </td><td><input type="text" name="c19" /></td><td><input type="text" name="tipo19" size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Vaporera #70</td><td><input type="text" name="c20" /></td><td><input type="text" name="tipo20"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Contenedor redondo 120 lts. c/ tapa</td><td><input type="text" name="c21" /></td><td><input type="text" name="tipo21"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Horno de microondas de 2.2 p3 de acero inoxidable</td><td><input type="text" name="c22" /></td><td><input type="text" name="tipo22"  size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Computadora Compaq Presario monitor LCD 15"</td><td><input type="text" name="c23" /></td><td><input type="text" name="tipo23"  size="8" value="COMPUTO" /></td>
		</tr>
		<tr>
			<td>Mesa multiusos</td><td><input type="text" name="c24" /></td><td><input type="text" name="tipo24"  size="8" value="COMPUTO"/></td>
		</tr>
		<tr>
			<td>Impresora HP Laser</td><td><input type="text" name="c25" /></td><td><input type="text" name="tipo25" size="8" value="COMPUTO"/></td>
		</tr>
		<tr>
			<td>Carro para impresora y fotocopiadora</td><td><input type="text" name="c26" /></td><td><input type="text" name="tipo26" size="8" value="COMPUTO"/></td>
		</tr>
		<tr>
			<td>Anaquel metálico de 5 entrepaños</td><td><input type="text" name="c27" /></td><td><input type="text" name="tipo27" size="8" value="COMPUTO"/></td>
		</tr>
		<tr>
			<td>Archivero metálico de 4 gavetas</td><td><input type="text" name="c28" /></td><td><input type="text" name="tipo28"  size="8" value="COMPUTO"/></td>
		</tr>
		<tr>
			<td>Máquina de escribir Brother</td><td><input type="text" name="c29" /></td><td><input type="text" name="tipo29" size="8" value="COMPUTO"/></td>
		</tr>
		<tr>
 			<td>Sillas de acero plegabler</td><td><input type="text" name="c30" value="0" /></td><td><input type="text" name="tipo30" size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Mesas de trabajo tipo banquete plegable con medidas de 2.44cm y 76cm grado comercial</td><td><input type="text" name="c31" value="0"/></td><td><input type="text" name="tipo31" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Tanque de gas de 30 litros con medidor y mangueras</td><td><input type="text" name="c32" value="0"/></td><td><input type="text" name="tipo32" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Juego pila plus  (3 bud.)</td><td><input type="text" name="c33" value="0"/></td><td><input type="text" name="tipo33" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Parrilla industrial 4 quemadoras, 60 cm. de frente</td><td><input type="text" name="c34" value="0"/></td><td><input type="text" name="tipo34" size="8" value="COCINA" /></td>
		</tr>
		<tr>
			<td>Enfriador, modelo VR-17 frente 7cm x 63 cm x 1.88 m 17p3. Certificación FIDE</td><td><input type="text" name="c35" value="0"/></td><td><input type="text" name="tipo35" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Licuadora industrial con capacidad de 5 litros</td><td><input type="text" name="c36" value="0"/></td><td><input type="text" name="tipo36" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Extractor de jugos para uso industrial en acabado aluminio</td><td><input type="text" name="c37" value="0"/></td><td><input type="text" name="tipo37" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td>Estanterías de cromo de 6 anaqueles</td><td><input type="text" name="c38" value="0"/></td><td><input type="text" name="tipo38" size="8" value="COCINA"/></td>
		</tr>
		<tr>
			<td><input type="submit" value="guardar"  /></td><td><input type="text" name="clavemob" <?php echo "value=\"$clave\"";?>  />
		</tr>
	</table>
</form>
</body>
</html>
