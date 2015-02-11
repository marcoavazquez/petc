<?php
echo "<div style='display:none;'>";
SESSION_START();
if($_SESSION['ing']!=189){
print "<meta http-equiv=Refresh content='0 ; url= login.php'>";
exit();
}
echo "</div>";

include("seg/conec.php");
$link=Conectarse();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Buscar</title>
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
		#tabescl{
			width:700px;
		}
		a{
			text-decoration:none;
			color:#005500;
		}
		a:hover{
			color:#060;
			text-decoration:underline;
		}
		a:active{
			color:#00CC00;
			text-decoration:underline;
		}
	</style>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:110px;margin-left:610px;">
		<h1>Escuelas de Tiempo Completo</h1><h2>Consultar por clave</h2>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			 <li><a href="index.php" title="inicio">Inicio</a></li>
        	<li><a href="buscar.php" title="consultar escuelas o personal">Buscar</a></li>
			<li><a href="consultar.php"><strong>Consultas</strong></a></li>
            <li><a href="reportes/index.php" title="Mostrar escuelas">Reportes</a></li>
            <li><a target="_blank" href="admin/petc.php" title="altas, bajas o cambios">Administraci&oacute;n</a>
            </li>
        </ul>
			<ul id="MenuUbicacion">
			<a href="salir.php" title="Salir" style="float:left; color:#AA0000;" align="right" onClick="return salir()">Salir</a>
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
		<div id="Centro">
		<h3>Consultar por clave</h3><br />
		<form action="consultar.php" method="get" >
		&nbsp;&nbsp;Ingrese clave: <input type="text" name="clave" style="height:4%"><input type="submit" value="Consultar" /><br />
		</form>
       </div>
    <?php
		if(!isset($_GET['clave'])){
			$clave="";
		}else{
			$clave=$_GET['clave'];
			
		$consclave=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nZona,nSector from tescuelas where sClaveEscuela like '$clave'",$link);	
		
		if($esclav=mysql_fetch_array($consclave)){
		?>
        <table id="tabescl">
        	<tr>
            	<th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>+</th>
            </tr>
            <tr>
            	<td align="center"><?php echo $esclav['sClaveEscuela']?></td>
                <td align="center"><?php echo $esclav['sNombre']?></td>
                <td align="center"><?php echo $esclav['sLocalidad']?></td>
                <td align="center"><?php echo $esclav['sMunicipio']?></td>
               
                <td align="center"><a href="escuelas.php?clave=<?php echo $esclav['sClaveEscuela']."&escuela=".$esclav['sNombre']."
                    &localidad=".$esclav['sLocalidad']."&municipio=".$esclav['sMunicipio']."&zona=".$esclav['nZona']."&sector=".$esclav['nSector'] ?>
                    &buscarpor=escuela&consulta=8ubg" title="Detalles de la escuela">Ver m&aacute;s...</a></td>
            </tr>
        </table>	
        <?php
		}else{
			echo "<br /><span style='color:#AA0000; background-color:#FFcccc; border:1px solid #550000; padding:5px; margin:50px;'>
                Clave no encontrada</span><br />";
		}
		}
		?>
      <br />
	</div>
	<br />
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
