<?php
include("conec.php");
$link=Conectarse();

extract($_REQUEST);
			
$conspers=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH,
                      (select sPuesto from tPuestos where idPuesto=nPuesto), esc.sNombre,esc.sLocalidad,esc.sMunicipio
                      from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc 
                      inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela where sRFC like '$rfc'");
$pers=mysql_fetch_array($conspers);			
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Alta de Personal | Escuelas de Tiempo Completo</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
    <script>
	function sleep(millisegundos) {
		var inicio = new Date().getTime();
		while ((new Date().getTime() - inicio) < millisegundos){}
	}
	function darAlta(){
		if(document.foraltapers.claves.value==0){
			document.getElementById("error").innerHTML="Seleccione una escuela";
			return false;
		}else{
			return true;
		}
	}
	function cerrar(){
		var c=<?php if(!isset($s)) 
						echo "0";
					else
						echo $s;
			?>;
			
		if(c==1){
			sleep(3000);
			window.close();
		}
	}
	</script>
</head>
<body bgcolor="#DFDFDF">
<h3 style="background-color:#FAFAFA;padding:10px;">Alta de personal</h3>
<form name="foraltapers" action="altaPersonal.php?s=1&rfc=<?php echo $rfc ?>" method="post">
	<table style="border:1px solid #666; background-color:#CCC; padding:5px">
    <tr><td colspan="2">
    <?php
	echo "<b>".$pers['sNombreRH']." ".$pers['sApellidoPaternoRH']." ".$pers['sApellidoMaternoRH']."</b><br /> 
		(Anteriormente laboraba en la escuela: ".$pers['sNombre']." de ".$pers['sLocalidad'].", ".$pers['sMunicipio'].")";
	?>
    </td></tr>
    	<tr><td align="right">Centro de trabajo:</td>
        <td><select name="claves">
						<option value="0">[-- Seleccione una escuela --]</option>
		<?php
			$consesc=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio from tescuelas where nAfiliada=1 order by sNombre");
				if($esc=mysql_fetch_array($consesc)){
					do{
						echo "<option value='".$esc['sClaveEscuela']."'>"
						.$esc['sNombre']." - ".$esc['sLocalidad']." (".$esc['sMunicipio'].")</option>";
					}while($esc=mysql_fetch_array($consesc));
				}
		?>
        </select></td>
    </tr><tr><td align="right">Puesto:</td>
    <td><select name="pst">
    	<option value="1">Docente</option>
        <option value="2">Director</option>
    </select></td></tr>
    <tr><td colspan="2" align="center"><b style="color:#FF0000" id="error"></b></td></tr>
    <tr><td colspan="2" align="center">
    <input type="submit" value="Dar da alta" style="width:40%;padding:5px;font-size:14px" onclick="return darAlta()"/></td></tr>
    </table>
</form>
<?php

if(isset($rfc,$claves,$pst)){
	mysql_query("update tRecursos_humanos set nPuesto=$pst where sRFC like '$rfc'");
	$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
	mysql_query("insert into tRecursos_hum_ciclo (sRFCrhc,sCicloRhc,nPuestoRhc,sClaveEscuelaRhc,nEstado)
			values('$rfc','$ciclo[0]','$pst','$claves',1)");
		echo "<b style='color:#0A0'>Personal dado de alta</b>";
}else{
	echo "";
}
?>
</body>
</html>