<?php
SESSION_START();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
    <script>
		function darDeAlta(c){
            if(confirm("Confirmar alta escuela")){
                location.href="altaov.php?clave="+c;
            }else{
                return false		
            }
        }
		
	</script>
	<style>
		.eleg:hover{
			background-color:#BBB;
		}
	</style>
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
			<li><a href="petc.php"><strong>Admin. Escuelas</strong></a></li>
            <li><a href="admSist/" >Admin. Sistema</a></li>
            <li><a href="admUsr/coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a href="admUsr/usuarios.php" >Admin. Usuarios</a></li>
			<li><a href="salir.php" title="Salir" style="color:#550000;" onClick="return salir()">Salir</a></li>
         </ul>
          <ul id="MenuUbicacion">
			<li>
			<script language="javascript">
				var fecha=new Date();
				var diames=fecha.getDate();
				var diasemana=fecha.getDay();
				var mes=fecha.getMonth() +1 ;
				var ano=fecha.getFullYear();

				var textosemana = new Array (7);
				  textosemana[0]="Domingo";
				  textosemana[1]="Lunes";
				  textosemana[2]="Martes";
				  textosemana[3]="Mi&eacute;rcoles";
				  textosemana[4]="Jueves";
				  textosemana[5]="Viernes";
				  textosemana[6]="S&aacute;bado";

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
<div id="alta">
<?php
include("seg/conec.php");
$link=Conectarse();
$armod=array(1=>"Federalizada",2=>"Estatal",3=>"Ind&iacute;gena");
$arniv=array(1=>"Preescolar",2=>"Primaria",3=>"Especialista");
$arpuesto=array(1=>"Docente",2=>"Director",3=>"Especialista");
$arciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
              6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020");
			  
$armeses=array(1=>"Agosto",2=>"Septiembre",3=>"Octubre",4=>"Noviembre",5=>"Diciembre",6=>"Enero",
             7=>"Febrero",8=>"Marzo",9=>"Abril",10=>"Mayo",11=>"Junio",12=>"Julio");
			 
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
?>
<table border="1px">
	<tr bgcolor='#555555'><th colspan="9" style="color:#FFF">ESCUELAS DADAS DE BAJA</th></tr>
	<tr bgcolor='#666666' style="color:#DDD"><th>CLAVE</th><th>NOMBRE</th><th>LOCALIDAD</th><th>MUNICIPIO</th><th>NIVEL</th>
    <th>MODALIDAD</th><th>ZONA</th><TH>SECTOR</TH><th>DAR DE ALTA</th></tr>
<?php
$consescno=mysql_query("select * from tescuelas where nAfiliada=0 order by sNombre");
	if($esb=mysql_fetch_array($consescno)){
		$color=array("#FFFFFF","#DDDDDD");
		$cont=0;
		do{
			echo "<tr align='center' bgcolor='".$color[$cont%2]."' class='eleg'><td>".$esb['sClaveEscuela']."</td>";
			echo "<td>".$esb['sNombre']."</td><td>".$esb['sLocalidad']."</td><td>".$esb['sMunicipio']."</td><td>".$arniv[$esb['nNivel']]."</td>
					<td>".$armod[$esb['nModalidad']]."</td><td>".$esb['nZona']."</td><td>".$esb['nSector']."</td>";
			echo "<td><button onclick=\"return darDeAlta('".$esb['sClaveEscuela']."')\">Dar de alta</button></td></tr>";
			$cont++;
		}while($esb=mysql_fetch_array($consescno));
	}else{
		echo "<tr><td colspan='5'>No hay escuelas</td></tr>";
	}
?>
</table>
<br />
 &nbsp;<b>PERSONAL DOCENTE Y DIRECTOR</b>
<table border="1px">
	<tr bgcolor='#AAAAAA'><th>RFC</th><th>NOMBRE</th><th>DAR DE ALTA</th></tr>
<?php
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
$conspe=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH
						from trecursos_humanos inner join trecursos_hum_ciclo on sRFC=sRFCrhc 
						where nEstado =2 and nPuesto <> 3 and sCicloRhc=".$ciclo[0]." order by sApellidoPaternoRH");
	if($p=mysql_fetch_array($conspe)){
		$colorp=array("#FFFFFF","#DDDDDD");
		$contp=0;
		do{
			echo "<tr align='center' bgcolor='".$colorp[$contp%2]."' class='eleg'>";
			echo "<td>".$p['sRFC']."</td><td>".$p['sApellidoPaternoRH']." ".$p['sApellidoMaternoRH']." ".$p['sNombreRH']."</td>
					<td><a href='altaPersonal.php?rfc=".$p['sRFC']."' target='_blank' onClick=\"window.open(this.href, this.target, 'width=610,height=280'); return false;\">Dar de alta</a></td></tr>";
			$contp++;
		}while($p=mysql_fetch_array($conspe));
	}else{
		echo "<tr><td colspan='5'>No hay personal</td></tr>";
	}
?>
</table>

<br />
<b>ESPECIALISTAS</b>
<table border="1px">
	<tr bgcolor='#AAAAAA'><th>RFC</th><th>NOMBRE</th>
	<th>Dar de alta</th></tr>
<?php
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
$consesp=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH
						from trecursos_humanos inner join trecursos_hum_ciclo on sRFC=sRFCrhc 
						where nEstado =2 and nPuesto=3 and sCicloRhc=".$ciclo[0]." order by sApellidoPaternoRH");
	if($esp=mysql_fetch_array($consesp)){
		$colorp=array("#FFFFFF","#DDDDDD");
		$contp=0;
		do{
			echo "<tr align='center' bgcolor='".$colorp[$contp%2]."' class='eleg'>";
			echo "<td>".$esp['sRFC']."</td><td>".$esp['sApellidoPaternoRH']." ".$esp['sApellidoMaternoRH']." ".$esp['sNombreRH']."</td>
					<td><a href='altaEsp.php?rfc=".$esp['sRFC']."' target='_blank' onClick=\"window.open(this.href, this.target, 'width=610,height=280'); return false;\">Dar de alta</a></td></tr>";
			$contp++;
		}while($p=mysql_fetch_array($conspe));
	}else{
		echo "<tr><td colspan='5'>No hay personal</td></tr>";
	}
?>
</table>
</div>
</div>
<div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right"; />
 <div>Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
     Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica<br />
     Secretar&iacute;a de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
    Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>
</div>
</div>
</body>
</html>
