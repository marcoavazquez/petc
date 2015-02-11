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
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<link href="css_esc.css" rel="stylesheet" type="text/css" />
    <link href='imagen/sev.png' rel='shortcut icon'/>
    <title>Escuelas de Tiempo Completo</title>
    <script type="text/javascript" src="pestanas.js"></script>
	<script language="javascript">
		function ocultar(){
			var tabla = document.getElementById("escoger");
			tabla.parentNode.removeChild(tabla);
		}
		function mostrar(i){
			var det=document.getElementById("detalles"+i);
			det.className= "visible";
		}
		function cerrar(j){
			var cedet=document.getElementById("detalles"+j);
			cedet.className= "oculto";
		}
        function salir(){
            if(confirm(String.fromCharCode(191)+"Salir?")){
                location.href="salir.php";
            }else{
                return false		
            }
        }
	</script>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:110px;margin-left:610px;">
			<h1>Escuelas de Tiempo Completo</h1>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			 <li><a href="index.php" title="inicio">Inicio</a></li>
        	<li><a href="buscar.php" title="volver a buscar"><strong>Buscar</strong></a></li>
			<li><a href="consultar.php" title="consultar por clave">Consultar</a></li>
            <li><a href="reportes/index.php" title="Mostrar escuelas">Reportes</a></li>
            <li><a target="_blank" href="admin/petc.php" title="altas, bajas o modificaciones">Administraci&oacute;n</a></li>
        </ul>
			<ul id="MenuUbicacion"><a href="salir.php" title="Salir" style="float:left; color:#AA0000;" align="right" onClick="return salir()">Salir</a>
				<li><script language="javascript">

				var fecha=new Date();
				var diames=fecha.getDate();
				var diasemana=fecha.getDay();
				var mes=fecha.getMonth() +1 ;
				var ano=fecha.getFullYear();

				var textosemana = new Array (7);
				  textosemana[0]="Domingo";
				  textosemana[1]="Lunes";
				  textosemana[2]="Martes";
				  textosemana[3]="Mi�rcoles";
				  textosemana[4]="Jueves";
				  textosemana[5]="Viernes";
				  textosemana[6]="S�bado";

				var textomes = new Array (12);
				  textomes[1]="Enero";
				  textomes[2]="Febrero";
				  textomes[3]="Marzo";
				  textomes[4]="Abril";
				  textomes[5]="Mayo";
				  textomes[6]="Junio";
				  textomes[7]="Julio";
				  textomes[8]="Agosto";
				  textomes[9]="Septiembre";
				  textomes[10]="Octubre";
				  textomes[11]="Noviembre";
				  textomes[12]="Diciembre";
				document.write(textosemana[diasemana] + ", " + diames + " de " + textomes[mes] + " de " + ano);
			</script>
				</li>
            </ul>
		</div>
	<div id="Cuerpo">
		<div id="Centro">
<?php
$armod=array(1=>"Federalizada",2=>"Estatal",3=>"Ind&iacute;gena");
$arniv=array(1=>"Preescolar",2=>"Primaria",3=>"Especialista");
$arpuesto=array(1=>"Docente",2=>"Director",3=>"Especialista");
$arciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
              6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020");
$armeses=array(1=>"Agosto",2=>"Septiembre",3=>"Octubre",4=>"Noviembre",5=>"Diciembre",6=>"Enero",
             7=>"Febrero",8=>"Marzo",9=>"Abril",10=>"Mayo",11=>"Junio",12=>"Julio");

include("seg/conec.php");
$link=Conectarse();
$cons=$_GET['consulta'];
$busc=$_GET['buscarpor'];
	if(!isset($_GET['af'])) $af="";
	else $af=$_GET['af'];
	if($cons=="" or $cons==" " or $cons=="   "){
        echo "<script>alert('No ha ingresado ningun dato');</script>";
		print "<meta http-equiv=Refresh content='0 ; url= buscar.php'>";
	}else{
		switch($busc){
			case "escuela"://RESULTADO DE LA BUSQUEDA DE ESCUELAS////////////////////
				if($af=="a") $a=1;
				elseif($af=="b") $a=0;
				else $a=1;
			
				$result=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector 
                                    from tescuelas where 
                                    (sNombre like '%$cons%' or sLocalidad like '%$cons%' 
                                    or sMunicipio like '%$cons%') and nAfiliada=$a",$link);
				if ($row = mysql_fetch_array($result)){
					$color=array("#FAFAFA","#ddedDd");
					$cont=0;
					echo "<table id=\"escoger\" border='1'><tr bgcolor='#AAAAAA'>
						<th></th><th>CLAVE</th><th>ESCUELA</th><th>NIVEL</th><th>LOCALIDAD</th><th>MUNICIPIO</th><th>MODALIDAD</th>
						<th>ZONA</th><th>SECTOR</th></tr>";
					do{
						$cont++;
						echo "<tr bgcolor='".$color[$cont%2]."' class='pasenc'><td><small>$cont</small></td>
							<td><a href=\"escuelas.php?clave=".$row["sClaveEscuela"]."&escuela=".$row["sNombre"].
							"&localidad=".$row["sLocalidad"]."&municipio=".$row["sMunicipio"]."&zona=".$row["nZona"].
							"&sector=".$row["nSector"]."&consulta=34iF&buscarpor=escuela\">";
						echo $row["sClaveEscuela"]."</a>&nbsp;</td><td>&nbsp;".$row["sNombre"]."&nbsp;</td>
						<td>&nbsp;".$arniv[$row['nNivel']]."&nbsp;</td><td>&nbsp;".$row["sLocalidad"]."&nbsp;</td>
						<td>&nbsp;".$row["sMunicipio"]."&nbsp;</td><td>&nbsp;".$armod[$row["nModalidad"]]."&nbsp;</td>
						<td>&nbsp;".$row["nZona"]."&nbsp;</td><td>&nbsp;".$row["nSector"]."&nbsp;</td></tr>";
					}while($row = mysql_fetch_array($result));
						echo "</table>";
				}else{
		}
	break;
//////////////////////////////////////////////////////////////////////////////////////	////////////RESULTADO DE LA BUSQUEDA DE PERSONAL
			case "personal":
		
				if($af=="a") $a=1;
				elseif($af=="b") $a=2;
				else $a="";
			
				$result=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH,rh.nPuesto
                                from trecursos_humanos rh,trecursos_hum_ciclo rhe 
                                where rh.sRFC=rhe.sRFCrhc and (concat(rh.sNombreRH,' ',rh.sApellidoPaternoRH,' ',rh.sApellidoMaternoRH) 
								like '%$cons%' or concat(rh.sNombreRH,' ',rh.sApellidoPaternoRH) like '%$cons%' or rh.sRFC like '$cons') 
								and rhe.nEstado=$a",$link);
				if($row = mysql_fetch_array($result)){
					$color=array("#FAFAFA","#ddedDd");
					$cont=0;
					echo "<table border='1'><tr bgcolor='#AABBAA'><th>Nombre</th><th>RFC</th><th>Puesto</th></tr>";
					
					do{
						$cont++;
						echo "<tr bgcolor='".$color[$cont%2]."' class='pasenc'><td>";
						echo "<a href='escuelas.php?buscarpor=personal&rfc=".$row["sRFC"]."&consulta=consrfc'>";
						echo $row["sNombreRH"]."&nbsp;".$row["sApellidoPaternoRH"]."&nbsp;".$row["sApellidoMaternoRH"]."</a>&nbsp;</td>
						<td>&nbsp;".$row["sRFC"]."&nbsp;</td><td>&nbsp;".$arpuesto[$row["nPuesto"]]."&nbsp;</td></tr>";
					}while($row = mysql_fetch_array($result));
						echo "</table>";
				}else{
					echo "";
				}
		break;
	}
}
?>
</div>
 <?php ///////////////////////////RESULTADOS//////////////////////////////////////////////////////////////////////////////////
//Resultados seleccionados
if(!isset($_GET['clave'])) $clave="";
else $clave=$_GET['clave'];
if(!isset($_GET['escuela'])) $escuela="";
else $escuela=$_GET['escuela'];
if(!isset($_GET['localidad'])) $localidad="";
else $localidad=$_GET['localidad'];
if(!isset($_GET['municipio'])) $municipio="";
else $municipio=$_GET['municipio'];
if(!isset($_GET['tipo'])) $tipo="";
else $tipo=$_GET['tipo'];
if(!isset($_GET['zona'])) $zona="";
else $zona=$_GET['zona'];
if(!isset($_GET['sector'])) $sector="";
else $sector=$_GET['sector'];
if(!isset($_GET['rfc'])) $rfc="";
else $rfc=$_GET['rfc'];

if($busc=="personal" and $cons=="consrfc"){//CONSULTA SI SE SELECCION� BUSCAR POR PERSONAL
	echo "<div id='conspersdiv'>";
	$conscicpr=mysql_query("select nPuestoRhc,sClaveEscuelaRhc,sCicloRhc from trecursos_hum_ciclo where sRFCrhc like '$rfc'");
	$pcc=mysql_fetch_array($conscicpr);
	do{
		$conspers=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH,rhe.nPuestoRhc,rh.nDoblePlaza 
                            from trecursos_humanos rh, trecursos_hum_ciclo rhe where rh.sRFC like '$rfc' and rh.sRFC=rhe.sRFCrhc",$link);
		$consxrfc=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nModalidad,nZona,nSector 
                            from tescuelas where sClaveEscuela like '".$pcc['sClaveEscuelaRhc']."'");
		$resesc=mysql_fetch_array($consxrfc);
		$respers=mysql_fetch_array($conspers);
		echo "<strong>".$respers['sNombreRH']." ".$respers['sApellidoPaternoRH']." ".$respers['sApellidoMaternoRH']."</strong><br /><br />";
		echo "<strong>RFC: </strong>".$respers['sRFC']."<br />";
		echo "<strong>".$arpuesto[$respers['nPuestoRhc']]."</strong> en la escuela <strong>".$resesc['sNombre']."</strong> de "
                .$resesc['sLocalidad'].", ".$resesc['sMunicipio'];
		echo "<br /><br />";
		echo "<br /><strong>Doble Plaza: </strong>".$respers['nDoblePlaza']."<br />";
	}while($pcc=mysql_fetch_array($conscicpr));
?>
<br />
<table style="background-color:#DDDDFF; border:1px solid #555; padding:2px; margin:10px;">
	<tr><th colspan="6">Apoyos econ�micos</th></tr>
    <tr bgcolor="#CACADF">
    	<th>&nbsp;Ciclo escolar&nbsp;</th><th>&nbsp;Periodo&nbsp;</th><th>&nbsp;Bruto Mensual&nbsp;</th><th>&nbsp;ISR Mensual&nbsp;</th>
        <th>&nbsp;Neto Mensual&nbsp;</th><th>&nbsp;Neto del Periodo&nbsp;</th> 
    </tr>
<?php
   $consap=mysql_query("select sRFCae,nCiclo,nFechaInicio,nFechaFinal,nBrutoMensual,nIsrMensual 
   							from tapoyos_economicos where sRFCae like '".$respers['sRFC']."'");
   		if($apoy=mysql_fetch_array($consap)){
			do{
				echo "<tr bgcolor='#CCCCFF' align='center'>
					<td bgcolor='#AAAABB'>".$arciclos[$apoy['nCiclo']]."</td><td>".$armeses[$apoy['nFechaInicio']]."-".$armeses[$apoy['nFechaFinal']]."</td>
                        <td>$ ".$apoy['nBrutoMensual']."</td><td>$ ".$apoy['nIsrMensual']."</td>
                        <td>$ ".($apoy['nBrutoMensual']-$apoy['nIsrMensual'])."</td>
                        <td>$ ".($apoy['nBrutoMensual']-$apoy['nIsrMensual'])*($apoy['nFechaFinal']-$apoy['nFechaInicio'])."</td></tr>";
			}while($apoy=mysql_fetch_array($consap));
		}
		echo "</table>";
		
		echo "&nbsp;&nbsp;<a href='escuelas.php?";
		echo "clave=".$resesc["sClaveEscuela"]."&escuela=".$resesc["sNombre"]."&localidad=".$resesc["sLocalidad"].
			"&municipio=".$resesc["sMunicipio"]."&zona=".$resesc["nZona"]."&sector=".$resesc["nSector"];
		echo "&consulta=t&buscarpor=escuela' style='color:#002200; background-color:#AABBAA; border:1px solid #001100; padding:3px;'>
				Ver escuela >></a></div>";
}
/////////////////////////////////////////////////// CONSULTA FUE POR ESCUELA /////////////////////////////////////////////////////////////////
elseif($clave!="" and $busc=="escuela"){

	$consniv=mysql_query("select nNivel,nModalidad from tescuelas where sClaveEscuela like '$clave'");
	$nivel=mysql_fetch_array($consniv);
	echo "<table id='tescuela'><tr><th>Nivel</th><th>&nbsp;CLAVE&nbsp;</th><th>ESCUELA</th><th>&nbsp;LOCALIDAD&nbsp;</th>";
	echo "<th>&nbsp;MUNICIPIO&nbsp;</th><th>&nbsp;MODALIDAD&nbsp;</th><th>&nbsp;ZONA&nbsp;</th><th>&nbsp;SECTOR&nbsp;</th></tr>";
	echo "<tr bgcolor='#CACACA'><td>&nbsp;".$arniv[$nivel[0]]."&nbsp;</td><td align='center'>&nbsp;".$clave."&nbsp;</td>
        <td align='center'>&nbsp;".$escuela."&nbsp;</td><td align='center'>&nbsp;".$localidad."&nbsp;</td>
        <td align='center'>&nbsp;".$municipio."&nbsp;</td><td align='center'>&nbsp;".$armod[$nivel["nModalidad"]]."&nbsp;</td>";
	echo "<td align='center'>".$zona."</td><td align='center'>".$sector."</tr>";
	echo "</table><br />";//TABLA DONDE SE MUESTRA LA ESCUELA SELECCIONADA

///////FORMULARIO PARA IMPRIMIR PDF/////////////////////////////////////	
	?>
<br /><br />
<br /><br />

<div id='Resultados'>
	<script language='javascript'>ocultar()</script> 
	
	<ul id='pesta' ><li id='equipoli' class='noselecto' onclick='mostrarEquipo()'>Material entregado</li>
	
	<li id='capacli' class='noselecto' onclick='mostrarCapacitaciones()'>Capacitaciones</li>
	<li id='alumnosli' class='noselecto' onclick='mostrarAlumnos()'>Alumnos</li>
	<li id='personalli' class='noselecto' onclick='mostrarPersonal()'>Personal</li></ul>
		
<div id='direccion' class ='visible'>
<?php		
	$concic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo where sClaveEscuelaCiclo like '$clave'");
	echo "<strong>Ciclo escolar:&nbsp;</strong>";
	$cicesc=mysql_fetch_array($concic);
		do{
			echo "<strong>".$arciclos[$cicesc[0]]." &nbsp; </strong>";
		}while($cicesc=mysql_fetch_array($concic));
		
	$consubic=mysql_query("select sEmail,sTelefono,sCalle,nCP,sNumero,sColonia from tescuelas where sClaveEscuela like '$clave'");
	$ubicacion=mysql_fetch_array($consubic);
	echo "<br /><br />&nbsp;<strong>Direcci&oacute;n:</strong>&nbsp;".$ubicacion["sCalle"]."&nbsp;<b>N&uacute;mero: </b>".$ubicacion["sNumero"];
	echo " &nbsp; <b>Colonia: </b>".$ubicacion["sColonia"]."&nbsp;C.P.:&nbsp;".$ubicacion['nCP']."<br /><br />";
	echo "&nbsp;<strong>Tel&eacute;fono del Director:</strong>&nbsp;".$ubicacion['sTelefono']."<br /><br />";
	echo "&nbsp;<strong>Correo electr&oacute;nico:</strong>&nbsp;".$ubicacion['sEmail']."<br />";
}    ?>
</div>
<div id="personal" class="oculto" >
		<?php   ///////DIRECTOR////
		echo "<div id='director'>";
			$consdir=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
				from tRecursos_humanos rh,trecursos_hum_ciclo rhe where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc='$clave' and 
				rh.nPuesto=2 and rhe.nEstado=1",$link);
			$direc=mysql_fetch_array($consdir);
			echo "<strong>Director:&nbsp;</strong>".$direc["sNombreRH"]."&nbsp;".$direc["sApellidoPaternoRH"]."&nbsp;".$direc["sApellidoMaternoRH"];
		?>
		<img src='imagen/vermas.png' class='vermas' align='right' onclick='mostrar(0)'/>
		    <br />
            <span id="detalles0" class="oculto">
				<?php
					echo "<small>RFC:&nbsp;".$direc["sRFC"]."</small>";
				?>
			<table><tr><th colspan="6">APOYOS ECON&Oacute;MICOS</th></tr>
				<tr bgcolor="#b0b0b0"><th>Ciclo escolar&nbsp;</th><th>Periodo</th><th>Bruto Mensual</th>
				<th>ISR Mensual</th><th>Neto Mensual</th><th>Neto Periodo</th></tr>        
       <?php
      $conapdir=mysql_query("select nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal 
                            from tapoyos_economicos where sRFCae like '".$direc['sRFC']."'");
   		if($apoydir=mysql_fetch_array($conapdir)){
			do{
				echo "<tr bgcolor='#c0c0c0' align='center'>";
				echo "<td>".$arciclos[$apoydir['nCiclo']]."</li>";
				echo "<td>".$armeses[$apoydir['nFechaInicio']]."-".$armeses[$apoydir["nFechaFinal"]]."</td>";
				echo "<td>".$apoydir['nBrutoMensual']."</td>";
				echo "<td>".$apoydir['nIsrMensual']."</td>";
				echo "<td>".($apoydir['nBrutoMensual']-$apoydir['nIsrMensual'])."</td>";
				echo "<td>".($apoydir['nBrutoMensual']-$apoydir['nIsrMensual'])*($apoydir['nFechaFinal']-$apoydir['nFechaInicial']+1)."</td>";
				echo "</tr>";
			}while($apoydir=mysql_fetch_array($conapdir));
		}
			echo "</table>";
  ?>
                 <img src="imagen/cerrar.png" align="right" title="cerrar" onclick="cerrar(0)"/><br />
                 </span>
			</div><!--div de director-->
<?php //////////////////DOCENTES//////////////////////////////////////////////////////////////////////////////////////////////////////////
	$conspers=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                            from tRecursos_humanos rh,trecursos_hum_ciclo rhe   
                            where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc='$clave' and rh.nPuesto=1 and rhe.nEstado=1",$link);
	
	if($pers = mysql_fetch_array($conspers)){
		echo "<div id='docentes'><strong>Docentes:</strong><br /><br />";
		$contdet=0;
		do{
			$contdet++;
			echo $contdet.".- &nbsp;";
			echo $pers["sNombreRH"]."&nbsp;".$pers["sApellidoPaternoRH"]."&nbsp;".$pers["sApellidoMaternoRH"];
			echo "<img src='imagen/vermas.png' class='vermas' title='ver m&aacute;s' align='right' onclick='mostrar($contdet)'/>";
?>
	<span id="detalles<?php echo $contdet;?>" class="oculto">
	<?php echo "<br /><small>RFC:&nbsp;".$pers["sRFC"]."</small>"; ?>
    	<table><tr><th colspan="6">APOYOS ECON&Oacute;MICOS</th></tr>
			<tr bgcolor="#b0b0b0"><th>Ciclo escolar</th><th>Periodo</th><th>Bruto Mensual</th>
			<th>ISR Mensual</th><th>Neto Mensual</th><th>Neto Periodo</th></tr>
 <?php
    $conaprh=mysql_query("select nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal 
                            from tapoyos_economicos where sRFCae like '".$pers['sRFC']."'");
  	if($apoyrh=mysql_fetch_array($conaprh)){
		do{
			echo "<tr bgcolor='#c0c0c0' align='center'>";
				echo "<td>".$arciclos[$apoyrh['nCiclo']]."</li>";
				echo "<td>".$armeses[$apoyrh['nFechaInicio']]."-".$armeses[$apoyrh["nFechaFinal"]]."</td>";
				echo "<td>".$apoyrh['nBrutoMensual']."</td>";
				echo "<td>".$apoyrh['nIsrMensual']."</td>";
				echo "<td>".($apoyrh['nBrutoMensual']-$apoyrh['nIsrMensual'])."</td>";
				echo "<td>".($apoyrh['nBrutoMensual']-$apoyrh['nIsrMensual'])*($apoyrh['nFechaFinal']-$apoyrh['nFechaInicio']+1)."</td></tr>";
			}while($apoyrh=mysql_fetch_array($conaprh));
		}
		echo "</table>";
		?>
    <img src="imagen/cerrar.png" align="right" title="cerrar" onclick="cerrar(<?php echo $contdet?>)" />
         </span><hr />
        <?php	
		}while ($pers = mysql_fetch_array($conspers));
			echo "</div>";
		}else{	echo " ";	}
			/////////////////////////////ESPECIALISTAS/////////////////////////		
	$consesp=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                            from tRecursos_humanos rh,trecursos_hum_ciclo rhe   
                            where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc='$clave' and rh.nPuesto=3 and rhe.nEstado=1",$link);
		if ($esp = mysql_fetch_array($consesp)){
			echo "<div id='espec'><strong>Especialistas</strong>";
			$contesp=300;
			do{
				echo "<p>";
				$contesp++;
				echo $esp["sNombreRH"]."&nbsp;".$esp["sApellidoPaternoRH"]."&nbsp;".$esp["sApellidoMaternoRH"]."</strong>&nbsp;
						<img src='imagen/vermas.png' class='vermas' align='right' onclick='mostrar($contesp)'/>";
		?>
        <span id="detalles<?php echo $contesp; ?>" class="oculto">
            <?php
                echo "<small>RFC:&nbsp;".$esp["sRFC"]."</small><br /><strong></strong>Especialidad:&nbsp;";
                $consespd=mysql_query("select sEspecialidad from tRecursos_humanos rh,tespecialidad e where 
										rh.nEspecialidad=e.idEspecialidad and rh.sRFC like '".$esp["sRFC"]."'");
				$espcd=mysql_fetch_array($consespd);
				echo $espcd["0"];
				?>
            <table><tr><th colspan="6">APOYOS ECON&Oacute;MICOS</th></tr>
			<tr bgcolor="#b0b0b0"><th>Ciclo escolar&nbsp;</th>
				<th>Periodo</th><th>Bruto Mensual</th>
				<th>ISR Mensual</th><th>Neto Mensual</th>
				<th>Neto Periodo</th></tr>
<?php
    $conape=mysql_query("select nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal 
                            from tapoyos_economicos where sRFCae like '".$pers['sRFC']."'");
	if($apoye=mysql_fetch_array($conape)){
		do{
			echo "<tr bgcolor='#c0c0c0' align='center'>";
			echo "<td>".$arciclos[$apoye['nCiclo']]."</li>";
			echo "<td>".$armeses[$apoye['nFechaInicio']]."-".$armeses[$apoye["nFechaFinal"]]."</td>";
			echo "<td>".$apoye['nBrutoMensual']."</td>";
			echo "<td>".$apoye['nIsrMensual']."</td>";
			echo "<td>".($apoye['nBrutoMensual']-$apoye['nIsrMensual'])."</td>";
			echo "<td>".($apoye['nBrutoMensual']-$apoye['nIsrMensual'])*($apoye['nFechaFinal']-$apoye['nFechaInicio']+1)."</td></tr>";
		}while($apoye=mysql_fetch_array($conape));
	}
	echo "</table>";
?>
            <img src="imagen/cerrar.png" align="right" title="cerrar" onclick="cerrar(<?php echo $contesp ?>)"/>
        </span>
    <?php 
		echo "<hr></p>"; 
	}while ($esp = mysql_fetch_array($consesp));
		echo "</div>";
	}else {
		echo "<br /><strong style='color:#aa0000; border:1px solid #aa0000; padding:5px; margin:10px; background-color:#faa'>
                    &nbsp;No hay especialistas en esta escuela</strong><br />";
	}
	?>
</div>
	<!------------------------------------------------------------Alumnos----------------------------------------->
<div id="alumnos" class="oculto">
	<h4>&nbsp;Alumnos</h4>
	<br />
<?php
    $consdifcic=mysql_query("select idAlumnos,sClaveEscuelaAl,sCicloAl from tAlumnos where sClaveEscuelaAl like '$clave' order by sCicloAl desc");
	if($difciclos=mysql_fetch_array($consdifcic)){
        do{
            $consal=mysql_query("select nAlumnos,nGrupos,nGrado from tNum_alum na 
                                 where idNumAlum='".$difciclos['idAlumnos']."' order by nGrado asc",$link);
            if($grupos = mysql_fetch_array($consal)){
                echo "<table style='background-color:#BBF; border:1px solid #555; padding:1px;'>";
                echo "<tr><th colspan='2' bgcolor='#BBBBCC'>Numero de alumnos y de grupos por grado escolar</th>";
                echo "<th bgcolor='#BBBBFF'>Ciclo: ".$arciclos[$difciclos['sCicloAl']]."</th></tr>
                    <tr><th>Grado</th><th>No. Grupos</th><th>No. Alumnos</th></tr>";
                do{
                    echo "<tr align='center' bgcolor='#CCCCFF'><td>".$grupos["nGrado"]."o</td><td>".$grupos["nGrupos"]."</td><td>".$grupos["nAlumnos"]."</td></tr>";
                }while ($grupos = mysql_fetch_array($consal));
                    echo "</table>";
            }
         }while($difciclos=mysql_fetch_array($consdifcic));
    }else{
        echo "<strong style='color:#FF0000'>No hay datos almacenados</strong>";
    }
?>
</div>
<!--///////////////////////////////////////EQUIPO ENTREGADO////////////////////////-->
<div id="equipo" class="oculto">
	<h4>&nbsp;Equipo entregado:</h4>
	<br />
<?php   
	if(!file_exists("material/$clave"))
		mkdir("material/$clave");
		
	$path="material/$clave/"; //directorio a listar
	$directorio=dir($path);

	$pn= array();//pila de nombres

	//bucle para llenar las pilas :P
	while ($archivo = $directorio->read()){
	//no mostrar ni "." ni ".." ni el propio "index.php"
		if(($archivo!="index.php")&&($archivo!=".")&&($archivo!="..")){
			array_push($pn, $archivo);
		}
	}
	$directorio->close();

	//ordenar las 3 pilas segun la pila de nombres
	@array_multisort($pn,$pf,$pt);
	//mostrar los datos
	for($i=0; $i<count($pn); $i++){
		if(file_exists("material/$clave/".$pn[$i])){
			echo '&nbsp;-&nbsp;<a href="material/'.$clave.'/'.$pn[$i].'" target="_blank">'.$pn[$i]."</a><br /><br />";
		}else{
			echo "No hay archivos";
		}
	}
?>	
<br />
<small style="color:#FF0000";>NOTA: NO abrir archivo si NO se conoce su origen o su extensi&oacute;n</small>
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////////-->
<div id="capacitaciones" class="oculto">
	<h4>&nbsp;Capacitaciones</h4>
    <br />
    <?php
    $conscap=mysql_query("select sFechaCap,sCapacitacion from tCapacitaciones cs inner join tCapacitacion c on cs.nCapacitacion=c.idCapacitacion
                where sClaveEscuelaCap like '$clave'");
    if($cap=mysql_fetch_array($conscap)){
        echo "<table><tr><th>Capacitaci&oacute;n</th><th>Fecha impartida</th><tr>";
        do{
            echo "<tr><td>".$cap['sCapacitacion']."</td>".$cap['sFechaCap']."</tr>";
        }while($cap=mysql_fetch_array($conscap));
    }else{
        echo "<b>No hay capacitaciones</b><br />";
    }
    
    ?>
</div>
	
<div id="estado" class="oculto"></div>
	<br />
</div>
<!------------------------------------------------------------------------------------------------------------>
	<div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right"; />
 <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica &nbsp;- &nbsp;
	Secretar&iacute;a de Educaci&oacute;n &copy; 2010 <br /> Todos los derechos reservados<br />
    Tel +52(228) 841 7700 ext 7477 y Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
    Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>
    </div>
</div>
</body>
</html>