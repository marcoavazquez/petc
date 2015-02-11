<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Insertar mobiliario</title>
</head>
<body>
<?php
$conexion = mysql_connect("localhost", "root", "");
mysql_select_db("petc", $conexion) or die(mysql_error());

$color=array("#ffffff","#dddddd");
$cont=0;

$conesc=mysql_query("select clave_escuela,nombre_escuela,localidad,municipio from escuelas");
		if ($escuelas = mysql_fetch_array($conesc)){
			echo "<table style=\"background-color:#fafaff; margin:0px auto;\"><tr><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>insetar</th><th>estado</th>";
			do {
				$cont++;
				echo "<tr bgcolor=".$color[$cont%2]."><td>&nbsp;".$escuelas["clave_escuela"]."&nbsp;</td><td>&nbsp;".$escuelas["nombre_escuela"]."&nbsp;</td><td>&nbsp;".$escuelas["localidad"]."&nbsp;</td><td>&nbsp;".$escuelas["municipio"]."&nbsp;</td><td><a href='insmob.php?clave=".$escuelas['clave_escuela']."'>&nbsp;insertar&nbsp;</a></td><td>";
				
					$considesc=mysql_query("select * from mob_esc where clave_esc_mob like '".$escuelas['clave_escuela']."'");
					$numclave= @mysql_num_rows($considesc);
				
				if($numclave==0){
					echo "<span style='color:#FF0000;'>Aun no insertado</span>";
				}else{
					echo "<span style='color:#00FF00;'>¡YA INSERTADO!</span>";
				}
				echo "</td></tr>";
			} while ($escuelas = mysql_fetch_array($conesc));
				echo "</table>";
			} else {
				echo "Aqui no  hay nada";
			}
?>
</body>
</html>
