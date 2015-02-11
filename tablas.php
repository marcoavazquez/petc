<?php
echo "<div style='display:none;'>";
SESSION_START();
if($_SESSION['ing']!=189){
print "<meta http-equiv=Refresh content='0 ; url= login.php'>";
exit();
}
echo "</div>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
	#tabresp{
		padding: 1px;
		font-size:14px;
	}
	a{
	color: #5555FF;
	text-decoration:none;
	}
	a:hover{
	text-decoration:underline;
	}
	.pasenc:hover{
		background-color:#CCD;
		color:#000;
		border: 1px solid #595;;
	}
</style>
</head>
<body>
<div id="Contenido">
	<div id="Cuerpo">
		<div id="tabres">
<?php
include("seg/conec.php");
$link=Conectarse();

extract($_REQUEST);
if(!isset($mostrar)) $mostrar="NADA";

if($mostrar=="escuelas"){
	echo "<table id='tabresp'><tr bgcolor='#BBBBBB'>";
	//NIVel
	if(!isset($clave,$nombct,$loc,$mun,$dom,$tel,$email,$mniv,$mod,$mmod,$zona,$sec,$dir,$esp))
		echo "<th>#</th><th>ir</th>";
	else
		echo "<th>#</th><th>ir</th>";
///////////////////////////////CICLO ESCOLAR/////////////////////////////////
	if(!isset($ciclos)) $ciclos="tds";
	if(!isset($cic)) $cic="no";

	if($ciclos=="tds") $ciclo=" - ";
	else $ciclo=$ciclos;
/////////////////////////////////////////////////////////////////////////////////
	$ban=0;
	$consulta="select e.clave_escuela,nombre_escuela,localidad,municipio,domicilio,CP,tel_director,email_direc,nivel,tipo,zona,sector,afiliada 
		from escuelas e";

	if($cic=="si" and $ciclos!="tds"){
		$consulta=$consulta.",escuelas_ciclo ec where e.clave_escuela=ec.clave_escuela and ec.ciclo like '$ciclos'";
		$ban=1;
	}
	if($ban==0){
		if(!isset($nivel)){
			$nivel="no";
		}elseif($nivel=="si"){
			if($mniv=="tdsn"){
				$consulta=$consulta."";
			}elseif($mniv=="prim"){
				$consulta=$consulta." where nivel like 'Primaria'";
				$ban=1;
			}elseif($mniv=="pre"){
				$consulta=$consulta." where nivel like 'Preescolar'";
				$ban=1;
			}elseif($mniv=="esp"){
				$consulta=$consulta." where nivel like 'Especial'";
				$ban=1;
			}
		}
	}elseif($ban==1){
		if(!isset($nivel)){
			$nivel="no";
		}elseif($nivel=="si"){
			if($mniv=="tdsn"){
				$consulta=$consulta."";
			}elseif($mniv=="prim"){
				$consulta=$consulta." and nivel like 'Primaria'";
			}elseif($mniv=="pre"){
				$consulta=$consulta." and nivel like 'Preescolar'";
			}elseif($mniv=="esp"){
				$consulta=$consulta." and nivel like 'Especial'";
			}
		}
	}
	if($ban==0){
		if(!isset($mod)){
			$mod="no";
		}elseif($mod=="si"){
			if($mmod=="tdsm"){
				$consulta=$consulta."";
			}elseif($mmod=="est"){
				$consulta=$consulta." where tipo like 'Estatal'";
				$ban=1;
			}elseif($mmod=="fed"){
				$consulta=$consulta." where tipo like 'Federalizada'";
				$ban=1;
			}elseif($mmod=="ind"){
				$consulta=$consulta." where tipo like 'Indigena'";
				$ban=1;
			}
		}
	}elseif($ban==1){
		if(!isset($mod)){
			$mod="no";
		}elseif($mod=="si"){
			if($mmod=="tdsm"){
				$consulta=$consulta."";
			}elseif($mmod=="est"){
				$consulta=$consulta." and tipo like 'Estatal'";
			}elseif($mmod=="fed"){
				$consulta=$consulta." and tipo like 'Federalizada'";
			}elseif($mmod=="ind"){
				$consulta=$consulta." and tipo like 'Indigena'";
			}
		}
	}
	if($orderby=="oclave"){
		$consulta=$consulta." order by clave_escuela";
	}elseif($orderby=="onombesc"){
		$consulta=$consulta." order by nombre_escuela";
	}elseif($orderby=="oniv"){
		$consulta=$consulta." order by nivel";
	}elseif($orderby=="omod"){
		$consulta=$consulta." order by tipo";
	}
	
	$consesc=mysql_query($consulta);
	$esc=mysql_fetch_array($consesc);

	if(!isset($clave)) echo "";
	elseif($clave=='si')
		echo "<th>Clave</th>";

	if(!isset($nombct)) echo "";
	elseif($nombct=='si')
		echo "<th>Nombre</th>";

	if(!isset($loc)) echo "";
	elseif($loc=='si')
		echo "<th>Localidad</th>";

	if(!isset($mun)) echo "";
	elseif($mun=='si')
	echo "<th>Municipio</th>";

	if(!isset($dom)) echo "";
	elseif($dom=='si')
		echo "<th>Domicilio</th>";

	if(!isset($tel)) echo "";
	elseif($tel=='si')
		echo "<th>Tel&eacute;fono</th>";

	if(!isset($email)) echo "";
	elseif($email=='si')
		echo "<th>e-mail</th>";

	if(!isset($nivel)) echo "";
	elseif($nivel=='si')
		echo "<th>Nivel</th>";

	if(!isset($mod)) echo "";
	elseif($mod=='si')
		echo "<th>Modalidad</th>";

	if(!isset($zona)) echo "";
	elseif($zona=='si')
		echo "<th>Zona</th>";

	if(!isset($sec)) echo "";
	elseif($sec=='si')
		echo "<th>sector</th>";

	if(!isset($cic)) echo "";
	elseif($cic=='si')
		echo "<th>Ciclo</th>";

	if(!isset($dir)) echo "";
	elseif($dir=='si')
		echo "<th>Director</th>";

	if(!isset($esp)) echo "";
	elseif($esp=='si')
		echo "<th>Especialista</th>";

	$color=array("#FAFAFA","#DDDDDD");
	$cont=1;
	$i=1;
	do{
		$consesp=mysql_query("select nombre,ape_pat,ape_mat 
								from especialistas where clave like '".$esc['clave_escuela']."' ",$link);
		$espe=mysql_fetch_array($consesp);
		$consdir=mysql_query("select nombre,ape_pat,ape_mat 
								from recursos_humanos rh,rec_hum_esc rhe 
								where puesto like 'director' and rh.rfc=rhe.rfc and rhe.clave_escuela like '".$esc['clave_escuela']."' ",$link);
		$dire=mysql_fetch_array($consdir);
		echo "</tr><tr bgcolor='".$color[$cont%2]."' class='pasenc' style='color:";
		
		if($esc['afiliada']=="si"){
			echo "#000000'";
		}elseif($esc['afiliada']=="no"){
			echo "#FF0000'";
		}
		echo " >";
		if(!isset($clave) && !isset($nombct) && !isset($loc) && !isset($mun) && !isset($dom) && !isset($cp) && !isset($tel) && 
			!isset($email) && !isset($nivel) && !isset($mod) && !isset($zona) && !isset($sec)) echo "";
		else
			echo "<td><small>$i</small></td><td><a href='consultar.php?clave=".$esc['clave_escuela']."' target='_blanck' title='Ver escuela: ".$esc['nombre_escuela']."' ><small>Ir</small></a></td>";
		$i++;
		if(!isset($clave)) echo "";
		elseif($clave=='si')
			echo "<td>".$esc['clave_escuela']."</td>";

		if(!isset($nombct)) echo "";
		elseif($nombct=='si')
			echo "<td>".$esc['nombre_escuela']."</td>";

		if(!isset($loc)) echo "";
		elseif($loc=='si')
			echo "<td>".$esc['localidad']."</td>";

		if(!isset($mun)) echo "";
		elseif($mun=='si')
			echo "<td>".$esc['municipio']."</td>";

		if(!isset($dom)) echo "";
		elseif($dom=='si')
			echo "<td>".$esc['domicilio']."&nbsp;&nbsp;- ".$esc['CP']."</td>";

		if(!isset($cp)) echo "";
		elseif($cp=='si')
			echo "<td>".$esc['CP']."</td>";

		if(!isset($tel)) echo "";
		elseif($tel=='si')
			echo "<td>".$esc['tel_director']."</td>";

		if(!isset($email)) echo "";
		elseif($email=='si')
			echo "<td>".$esc['email_direc']."</td>";

		if(!isset($nivel)) echo "";
		elseif($nivel=='si')
			echo "<td>".$esc['nivel']."</td>";

		if(!isset($mod)) echo "";
		elseif($mod=='si'){

			echo "<td>".$esc['tipo']."</td>";
		}
		if(!isset($zona)) echo "";
		elseif($zona=='si')
			echo "<td align='center' >".$esc['zona']."</td>";

		if(!isset($sec)) echo "";
		elseif($sec=='si')
			echo "<td align='center' >".$esc['sector']."</td>";

		if(!isset($cic)) echo "";
		elseif($cic=='si')
			echo "<td align='center' >$ciclo</td>";

		if(!isset($dir)) echo "";
		elseif($dir=='si')
			echo "<td>".$dire['ape_pat']." ".$dire['ape_mat']." ".$dire['nombre']."</td>";

		if(!isset($esp)) echo "";
		elseif($esp=='si')
			echo "<td>".$espe['ape_pat']." ".$espe['ape_mat']." ".$espe['nombre']."</td></tr>";

		$cont++;
	}while($esc=mysql_fetch_array($consesc));
	echo "</table>";
	echo "</form>";
}elseif($mostrar=="personal"){////////////////////////////TABLA DE PERSONAL///////////////////////////////////////////////////////////////////////

	$consprs="select rfc,nombre,ape_pat,ape_mat,puesto,doble_plaza from recursos_humanos";
	if($dntrop=="si"){
		$consprs=$consprs." where activo like 'si'";
	}elseif($dntrop=="no"){
		$consprs=$consprs." where activo like ''";
	}elseif($dntrop=="2"){
		$consprs=$consprs." ";
	}
	
	if($ordebyp=="rfc"){
		$consprs=$consprs." order by rfc";
	}elseif($ordebyp=="nomb"){
		$consprs=$consprs." order by ape_pat ";
	}elseif($ordebyp=="ClaveCT"){
		$consprs=$consprs." ";
	}elseif($ordebyp=="puesto"){
		$consprs=$consprs." order by puesto";
	}
	
	$consp=mysql_query($consprs);
	$pers=mysql_fetch_array($consp);
	echo "<table id='tabresp'><tr bgcolor='#BBBBBB'>";

	if(!isset($rfc)) 
		echo "";
	elseif($rfc=='si')
		echo "<th>RFC</th>";

	if(!isset($nomb)) echo "";
		elseif($nomb=='si')
			echo "<th>Nombre</th>";

	if(!isset($pues)) echo "";
	elseif($pues=='si')
		echo "<th>Puesto</th>";

	if(!isset($clave)) echo "";
	elseif($clave=='si')
		echo "<th>Clave CT</th>";

	if(!isset($esc)) echo "";
	elseif($esc=='si')
		echo "<th>Nombre CT</th>";

	if(!isset($dp)) echo "";
	elseif($dp=='si')
		echo "<th>D. Plaza</th>";

	if(!isset($apec)) echo "";
	elseif($apec=='si')
		echo "<th>Ciclo</th><th>Periodo</th><th>Bruto Mensual</th><th>ISR Mensual</th><th>Neto Mensual</th><th>Neto Periodo</th>";

	$color=array("#FAFAFA","#DDDDDD");
	$cont=1;
	do{
		$consescp=mysql_query("select clave_escuela from rec_hum_esc where rfc like '".$pers['rfc']."' ",$link);
		$escper=mysql_fetch_array($consescp);
		$conscnep=mysql_query("select clave_escuela,nombre_escuela from escuelas 
								where clave_escuela like '".$escper['clave_escuela']."' ",$link);
		$cne=mysql_fetch_array($conscnep);
		$consapec=mysql_query("select ciclo,periodo,bruto_mensual,isr_mensual,neto_mensual,neto_periodo 
								from rec_hum_apoyos_ec where rfc like '".$pers['rfc']."'");
		$apoec=mysql_fetch_array($consapec);
		echo "</tr><tr bgcolor='".$color[$cont%2]."' class='pasenc'>";

		if(!isset($rfc)) echo "";
		elseif($rfc=='si')
			echo "<td>".$pers['rfc']."</td>";

		if(!isset($nomb)) echo "";
		elseif($nomb=='si')
			echo "<td>".$pers['ape_pat']." ".$pers['ape_mat']." ".$pers['nombre']."</td>";

		if(!isset($pues)) echo "";
		elseif($pues=='si')
			echo "<td>".$pers['puesto']."</td>";

		if(!isset($clave)) echo "";
		elseif($clave=='si')
			echo "<td>".$cne['clave_escuela']."</td>";

		if(!isset($esc)) echo "";
		elseif($esc=='si')
			echo "<td>".$cne['nombre_escuela']."</td>";

		if(!isset($dp)) echo "";
		elseif($dp=='si')
			echo "<td>".$pers['doble_plaza']."</td>";

		if(!isset($apec)) echo "";
		elseif($apec=='si')
			echo "<td>".$apoec['ciclo']."</td><td align='center'>".$apoec['periodo']."</td><td align='center'>".$apoec['bruto_mensual']."</td><td align='center'>".$apoec['isr_mensual']."</td><td align='center'>".$apoec['neto_mensual']."</td><td align='center'>".$apoec['neto_periodo']."</td>";

		$cont++;
	}while($pers=mysql_fetch_array($consp));
	echo "</table>";
}
?>
		</div>
	</div>
</div>
</body>
</html>