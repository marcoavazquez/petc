<?php
include("conec.php");
$link=Conectarse();
extract($_REQUEST);

mysql_query("insert into tescuelas
(sClaveEscuela,sNombre,sLocalidad,sMunicipio,nZona,nSector,nModalidad,nNivel,sTelefono,sCalle,nCP,sNumero,sColonia,nAfiliada)
values('$cct','$nombCT','$loc','$mun','$zona','$sector','$mod','$nivel','$tel','$calle','$cp','$num','$col',1)");

$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);

mysql_query("insert into tescuelas_ciclo(sClaveEscuelaCiclo,nCiclo)values('$cct','$ciclo[0]')");

echo "<script>alert('Escuela dada de alta satisfactoriamente');</script>";

print "<meta http-equiv=Refresh content='0 ; url= petc.php'>";

?>