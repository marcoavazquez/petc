<?php
SESSION_START();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
}
if(!isset($_POST['numdoc'])) $numdoc=0;
else
$numdoc=$_POST['numdoc'];

if(!isset($_POST['espnum'])) $espnum=0;
else
$espnum=$_POST['espnum'];

if(!isset($_POST['intnum'])) $intnum=0;
else
$intnum=$_POST['intnum'];


extract($_REQUEST);

include("conec.php");
$link=Conectarse();
$cicloe="20".$cici."-20".$cicf;
mysql_query("insert into escuelas(clave_escuela,nombre_escuela,localidad,municipio,domicilio,CP,tel_director,email_direc,nivel,tipo,zona,sector,afiliada)values('$clave','$nombesc','$loc','$mun','$dom','$cp','$tel','$email','$nivel','$tipo','$zona','$sector','si')");

mysql_query("insert into escuelas_ciclo(clave_escuela,ciclo)values('$clave','$cicloe')");

mysql_query("insert into grupos_num(clave_escuela,a1,g1,a2,g2,a3,g3,a4,g4,a5,g5,a6,g6) values('$clave',$al1,$gr1,$al2,$gr2,$al3,$gr3,$al4,$gr4,$al5,$gr5,$al6,$gr6)");

mysql_query("insert into recursos_humanos(rfc,nombre,ape_pat,ape_mat,puesto,Doble_plaza,activo)values('$rfcdir','$nombdir','$appatdir','$apmatdir','director','$plazdir','si')");

mysql_query("insert into rec_hum_ciclo(rfc,puesto,clave_escuela,ciclo)values('$rfcdir','director','$clave','$cicloe')");

mysql_query("insert into rec_hum_esc(clave_escuela,rfc,horario_trabajo,activo)values('$clave','$rfcdir','$hordic','si')");

	
for($i=0;$i<$numdoc;$i++){

	$i1=$i+1;
	mysql_query("insert into recursos_humanos(rfc,nombre,ape_pat,ape_mat,puesto,Doble_plaza,activo) values ('$rfcdoc[$i]','$nombdoc[$i]','$appatdoc[$i]','$apmatdoc[$i]','docente','$plazdoc[$i1]','si')");
	
	mysql_query("insert into rec_hum_esc(clave_escuela,rfc,horario_trabajo,activo)values('$clave','$rfcdoc[$i]','$hordoc[$i]','si')");
	
	mysql_query("insert into rec_hum_ciclo(rfc,puesto,clave_escuela,ciclo)values('$rfcdoc[$i]','docente','$clave','$cicloe')");
}

for($j=0;$j<$espnum;$j++){

mysql_query("insert into especialistas(rfc,nombre,ape_pat,ape_mat,especialidad,clave,horario_trabajo,activo)values('$rfcesp[$j]','$nombesp[$j]','$appatesp[$j]','$apmatesp[$j]',$especialidad[$j],'$clave','$horesp[$j]','si')",$link);

mysql_query("insert into rec_hum_ciclo(rfc,puesto,clave_escuela,ciclo)values('$rfcesp[$j]','especialista','$clave','$cicloe')");

}
echo "";
print "<meta http-equiv=Refresh content='2 ; url= petc.php'>";
?>
<html>
<head>
<title>Escuela dada de alta satisfactoriamente</title>
</head>
<body style="background-color:#dfdfdf">
<div id="mensaje" style="margin:0px auto; padding:30px; background-color:#BFBFBF; color:#005500; width:500px; font-size:18px; border:2px solid #001100;">
Escuela dada de alta satisfactoriamente
</div>
</body>
</html>
