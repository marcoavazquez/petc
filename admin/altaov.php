<?php
include("seg/conec.php");
$link=Conectarse();

extract($_REQUEST);

mysql_query("update tescuelas set nAfiliada=1 where sClaveEscuela like '$clave'");
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
mysql_query("insert into tescuelas_ciclo(sClaveEscuelaCiclo,nCiclo)values('$clave','".$ciclo[0]."')");
print "<meta http-equiv=Refresh content='0 ; url= petc.php'>";

?>