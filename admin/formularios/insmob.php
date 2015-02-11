<?php
$clave=$_GET['clave'];
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());
?>
<html>
<head>
<title><?php echo $clave; ?></title>
</head>
<body bgcolor="#DDFFDD" >
<?php
$color=array("#FFAADD","#DDDDFF");
$consesc=mysql_query("select clave_escuela,nombre_escuela from escuelas where clave_escuela like '$clave'");
$consmob=mysql_query("select id_mob,mobiliario from mobiliario order by tipo");
$esc = mysql_fetch_array($consesc);
$cont=0;
		if ($mob = mysql_fetch_array($consmob)){
			echo "<strong style='color:#0000AA; font-size:18px;'>Clave:&nbsp;".$esc["clave_escuela"]."</strong>&nbsp;&nbsp;<strong style='color:#00AA00; font-size:18px;'>Escuela:&nbsp;".$esc["nombre_escuela"]."</strong>";
			echo "<form method='get' action='guardarmob.php'>";
			echo "<table style=\"background-color:#fafaff\"><tr><th>#</th><th>Mobiliario</th><th>Cant</th><th>Estado</th><tr>";
			do {
				$cont++;
				echo "<tr bgcolor='".$color[$cont%2]."'><td align='right'>$cont</td><td align='right'>&nbsp;".$mob['mobiliario']."&nbsp;</td><td><input type='text' name='cantidad[".$cont."]' /></td><td><input type='text' name='estado[".$cont."]' /><input type='hidden' name='ID[".$cont."]' value='".$mob['id_mob']."'></td></tr>\n";
			} while ($mob = mysql_fetch_array($consmob));
				echo "<br /><tr><td></td><td><input type='text' name='clave' value='".$esc["clave_escuela"]."' /><input type='submit' value='Guardar' /></form></tr></table>";
				echo "<br />";
		} else {
				echo "Aqui no  hay nada";
			}
?>
</body>
</html>