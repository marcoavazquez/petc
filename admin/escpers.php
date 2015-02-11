<?php
//aqui se econtrarán las consultas para inserción de alta de escuela 
include("conec.php");
$link=Conectarse();

extract($_REQUEST);

mysql_query("insert into tescuelas
			(sClaveEscuela,sNombre,sLocalidad,sMunicipio,nZona,nSector,nModalidad,nNivel,sEmail,sTelefono,sCalle,nCP,sNumero,sColonia,nAfiliada)
			values
			('$clave','$nombreesc','$loc','$mun','$zona','$sector','$mod','$nivel','$email','$tel','$calle','$cp','$num','$col',1)");
			
mysql_query("insert into tescuelas_ciclo(sClaveEscuelaCiclo,nCiclo)
				values('$clave','$ciclo')");
echo "<script>alert('Escuela dada de alta')</script>";
print "<meta http-equiv=Refresh content='0 ; url= petc.php'>";
?>