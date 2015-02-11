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
	<title>Escuelas de Tiempo Completo</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
    <script>
        function salir(){
            if(confirm(String.fromCharCode(191)+"Salir?")){
                location.href="salir.php";
            }else{
                return false		
            }
        }
    </script>
<style>
#esclink{
	background-color: #d5d5d5;
	color:#003355;
	font-size:10px;
	width:614px;
	border-left: 5px solid #aaaaaa;
	border-right: 5px solid #aaaaaa;
	border-bottom: 5px solid #aaaaaa;
	padding: 3px;
	margin:0px auto;
}
#esclink a{
	color:#333333;
	text-decoration:none;
}
#esclink:hover{
	color:#222222;
	text-decoration:underline;
	background-color:#d0d0d0;
}
</style>
</head>
<body> <!--oncontextmenu="return false" onkeydown="return false"-->
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:100px;margin-left:610px;">
			<h1>Escuelas de Tiempo Completo</h1>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    <ul id="MenuNavegacion">
		<li><a href="index.php"><strong>Inicio</strong></a></li>
       	<li><a href="buscar.php" title="Consultas de escuelas y personal">Buscar</a></li>
		<li><a href="consultar.php" title="Buscar por clave">Consultas</a></li>
			<li><a href="general.php" title="Buscar por clave">General</a></li>
        <li><a href="reportes/index.php" title="Mostrar escuelas">Reportes</a></li>
		<li><a target="_blank" href="admin/petc.php" title="altas, bajas o cambios">Administraci&oacute;n</a></li>
	</ul>
		<ul id="MenuUbicacion">
            <b> [ <?php echo $_SESSION['nombre']; ?> ] </b>
			<a href="salir.php" title="Salir" style="color:#AA0000;" align="right" onClick="return salir()">Salir </a>  &nbsp;&nbsp;
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
	<br />
		<div id="inicio">
<?php
include("seg/conec.php");
$link=Conectarse();
   
$arciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
                  6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020",11=>"2020-2021");

$consciclo=mysql_query("select count(distinct(nCiclo)) from tescuelas_ciclo order by nCiclo desc");
$numcic=mysql_fetch_array($consciclo);

$conscicact=mysql_query("select nCiclo from tescuelas_ciclo order by nCiclo desc");
$cicact=mysql_fetch_array($conscicact);

if(!isset($_GET['cicloesc']))
	$ciclo=$cicact['nCiclo'];
else
	$ciclo=$_GET['cicloesc'];
		echo "<p>";
		$consesc=mysql_query("select count(e.sClaveEscuela) 
                                from tescuelas e,tescuelas_ciclo ec 
                                where e.sClaveEscuela=ec.sClaveEscuelaCiclo and ec.nCiclo like '$ciclo' ",$link);
		$esc=mysql_fetch_array($consesc);
		echo "<strong>Escuelas incorporadas ciclo escolar $arciclos[$ciclo]:</strong>&nbsp;".$esc[0]."<br />";//Total de escuelas del ciclo actual
		
		$consfed=mysql_query("select count(e.sClaveEscuela) 
                                from tescuelas e,tescuelas_ciclo ec 
                                where e.sClaveEscuela=ec.sClaveEscuelaCiclo and e.nModalidad =1 and nNivel=2 and ec.nCiclo =$ciclo",$link);
		$escfed=mysql_fetch_array($consfed);
		echo $escfed[0]."&nbsp;Primarias Federalizadas&nbsp;&nbsp;&nbsp;&nbsp;"; //Numero de escuelas federalizadas
		
		$consest=mysql_query("select count(e.sClaveEscuela) 
                                from tescuelas e,tescuelas_ciclo ec 
                                where e.sClaveEscuela=ec.sClaveEscuelaCiclo and e.nModalidad =2 and ec.nCiclo=$ciclo and nNivel=2",$link);
		$escest=mysql_fetch_array($consest);
		echo $escest[0]."&nbsp;Primarias Estatales&nbsp;&nbsp;&nbsp;&nbsp;"; //Numero de escuelas estatales
		
		$consind=mysql_query("select count(e.sClaveEscuela) 
                                from tescuelas e,tescuelas_ciclo ec 
                                where e.sClaveEscuela=ec.sClaveEscuelaCiclo and e.nModalidad=3 and ec.nCiclo=$ciclo and nNivel=2",$link);
		$escind=mysql_fetch_array($consind);
		echo $escind[0]."&nbsp;Primarias Ind&iacute;genas&nbsp;&nbsp;&nbsp;&nbsp;<br />";//Numero de escuelas indigenas
		
		$conspresc=mysql_query("select count(e.sClaveEscuela) 
                                from tescuelas e,tescuelas_ciclo ec 
                                where e.sClaveEscuela=ec.sClaveEscuelaCiclo and e.nNivel=1 and ec.nCiclo=$ciclo",$link);
		$preesc=mysql_fetch_array($conspresc);
		echo $preesc[0]."&nbsp; Preescolar&nbsp;&nbsp;Y&nbsp;";//Numero de preescolares
		
		$consescesp=mysql_query("select count(e.sClaveEscuela) 
                                from tescuelas e,tescuelas_ciclo ec 
                                where e.sClaveEscuela=ec.sClaveEscuelaCiclo and e.nNivel=3 and ec.nCiclo=$ciclo",$link);
		$espc=mysql_fetch_array($consescesp);
		echo $espc[0]."&nbsp; Especiales&nbsp;&nbsp;<br />";//Numero de escuelas especiales
		
		$consloc=mysql_query("select count(distinct(e.sMunicipio)) 
                            from tescuelas e,tescuelas_ciclo ec 
                            where e.sClaveEscuela=ec.sClaveEscuelaCiclo and ec.nCiclo=$ciclo",$link);//Numero de municipios
		$loc=mysql_fetch_array($consloc);
		echo "En &nbsp;".$loc[0]."&nbsp;municipios";
		echo "</p>";
		
		echo "<p>";
		$consmaestro=mysql_query("select count(rh.sRFC) 
                                from trecursos_humanos rh,trecursos_hum_ciclo rhc 
                                where rh.sRFC=rhc.sRFCrhc and rh.nPuesto=2 and rhc.sCicloRhc=$ciclo",$link);//Numero de directores
		$maes=mysql_fetch_array($consmaestro);
		echo "<strong>Directores:</strong>&nbsp;".$maes[0]."<br /><br />";
		
		$consmaestro=mysql_query("select count(rh.sRFC) 
                                from trecursos_humanos rh,trecursos_hum_ciclo rhc 
                                where rh.sRFC=rhc.sRFCrhc and rh.nPuesto=1 and rhc.sCicloRhc=$ciclo ",$link);//N�mero de docentes
		$maes=mysql_fetch_array($consmaestro);
		echo "<strong>Docentes:</strong>&nbsp;".$maes[0]."<br /><br />";
		
		$consesp=mysql_query("select count(sRFCrhc) from trecursos_hum_ciclo where nPuestoRhc=3 and sCicloRhc=$ciclo",$link);//Numero de especialistas
		$esp=mysql_fetch_array($consesp);
		echo "<strong>Especialistas:</strong>&nbsp;".$esp[0]."<br />";
		echo "</p>";
		
		echo "</div>";
		
	$conscil=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
	$cicls=mysql_fetch_array($conscil);
	do{
		echo "<div id='esclink'>";
		echo "<b><a href='index.php?cicloesc=".$cicls[0]."'>-> Ver ciclo ".$arciclos[$cicls[0]]."</a></b>";
		echo "<br />";
		echo "</div>";
	}while($cicls=mysql_fetch_array($conscil));
	?>
	<br />
	</div>
	
	<div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right"; />
 <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
     Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica<br />
     Secretar&iacute;a de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
    Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>

    </div>
</div>
</body>
</html>
