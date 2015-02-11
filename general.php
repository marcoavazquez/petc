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
	<title>Escuelas de Tiempo Completo - Datos Generales</title>
	<link href='sev.png' rel='shortcut icon'/>
<script type="text/javascript" src="js_general.js"></script>
<style type="text/css">
.si{ display: inline;}
.no{ display: none; }

#opciones{
border:1px solid #555555;
padding:1px;
margin:5px;
}

#escopc{
	color:#333333;
	background-color:#efefef;
	padding:5px;
	margin:0px auto;
}
#peropc{
	color:#333333;
	background-color:#efefef;
	font-size:10px;
	padding:5px;
	margin:0px auto;
}
#btnm{
	color:#333;
	background-color:#FAFAFA;
	margin: 5px;
	padding: 2px 4px 2px 4px;
	border:1px solid #222;
	text-decoration:none;
}
#btnm:hover{
	color:#000;
	background-color:#DFdFDF;
	margin: 5px;
	font-size:12px;
	padding: 2px 4px 2px 4px;
	border:1px solid #222;
	text-decoration:none;
}
#btnm:active{
	color:#FFF;
	background-color:#AAA;
	margin: 5px;
	font-size:12px;
	border:1px solid #222;
	text-decoration:none;
}
#btnpdf{
	color:#FFF;
	background-color:#DD0000;
	padding: 2px;
	padding-left: 10px;
	padding-right:10px;
	border: 1px solid #600;
	text-decoration:none;
}
#btnpdf:hover{
	color:#FFF;
	background-color:#FF0000;
}
#btnpdf:active{
	background-color:#FF0000;
}
</style>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana; font-size:10pt; position:absolute; top:85px; margin-left:610px; left: 79px;">
					<h1>Escuelas de Tiempo Completo</h1>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			<li><a href="index.php">Inicio</a></li>
        	<li><a href="buscar.php" title="Consultas de escuelas y personal">Buscar</a></li>
			<li><a href="consultar.php" title="Buscar por clave">Consultas</a></li>
			<li><a><b>General</b></a></li>
            <li><a href="reportes/.php" title="Mostrar escuelas">Reportes</a></li>
			<li><a target="_blank" href="admin/petc.php" title="altas, bajas o cambios">Modificaciones</a></li>
        </ul>
			<ul id="MenuUbicacion">
				<a href="salir.php" title="Salir" style="float:left; color:#AA0000;" align="right" >Salir</a>
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
			</script></li>
            </ul>
	</div>
<div id="Cuerpo">
	<div id="opciones">
		<form name="selcamp" method="post" action="" >
			Mostrar:&nbsp;<select name="mostrarpor" onchange="seleccionar()" >
					<option value="escuelas">Escuelas</option>
					<option value="personal">Personal</option>
				</select><br />
				<table id="escopc" class="si">
				<tr bgcolor="#CFCFCF">
					<td><input type="checkbox" name="clave" checked />Clave CT</td>
					<td><input type="checkbox" name="nombrect" checked />Nombre CT</td>
					<td><input type="checkbox" name="loc"/>Localidad</td>
					<td><input type="checkbox" name="mun"/>Municipio</td>
                     <td rowspan="2"><input type="checkbox" name="cic">Ciclo:<br />
						<select name="ciclos">
							<option value="tds">Todos</option>
						<?php
							//include("seg/conec.php");
							function Conectarse(){
if (!($link=mysql_connect("localhost","Marco","mava189mava189")))
{
exit();
}
if (!mysql_select_db("e_t_c",$link))
{
exit();
}
return $link;
} 
							$link=Conectarse();
							$consciclo=mysql_query("select distinct(ciclo) from escuelas_ciclo");
							$numcic=mysql_fetch_array($consciclo);
								do{
									echo "<option value='".$numcic[0]."'>".$numcic[0]."</option>";
								}while($numcic=mysql_fetch_array($consciclo));
						?>
						</select></td>
                    <td rowspan="2"><input type="checkbox" name="nivel"/>Nivel:<br />
						<select name="mniv">
                        	<option value="tdsn">Todos</option>
							<option value="prim">Primaria</option>
							<option value="pre">Preescolar</option>
							<option value="esp">Especial</option>
						</select>
					</td>
					<td rowspan="2"><input type="checkbox" name="mod">Modalidad:<br />
						<select name="mmod">
                        	<option value="tdsm">Todas</option>
							<option value="est">Estatal</option>
							<option value="fed">Federalizadas</option>
							<option value="ind">Ind&iacute;gena</option>
						</select>
					</td>
               	</tr>
				<tr bgcolor="#CFCFCF">
                	<td><input type="checkbox" name="zona"/>Zona</td>
                    <td><input type="checkbox" name="sec"/>Sector</td>
                    <td><input type="checkbox" name="dir"/>Director</td>
                    <td><input type="checkbox" name="esp"/>Especialistas</td></tr>
                 <tr bgcolor="#CFCFCF">
                    <td><input type="checkbox" name="tel"/>Tel&eacute;fono</td>
                    <td><input type="checkbox" name="dom"/>Domicilio</td>
                   	<td><input type="checkbox" name="email"/>e-mail</td>
                	<td colspan="3" >Ordenar por: <select name="orderby" >
                			<option value="oclave" >Clave</option>
							<option value="onombesc" >Nombre de la escuela</option>
							<option value="omod" >Modalidad</option>
                			<option value="oniv" >Nivel</option>
						</select> </td>
				</tr>
				<tr><td colspan="5"><small>*Las escuelas en <span style="color:#FF0000">ROJO</span> ya NO se encuentran dentro del programa.</small></td></tr>
                </table>
<!------------------------------------------------------------------------------------------------------------------------ -->
				<table id="peropc" class="no">
				<tr bgcolor="#CFCFCF"><td><input type="checkbox" name="rfc"/>RFC</td>
				<td><input type="checkbox" name="nombp"/>Nombre</td>
				<td><input type="checkbox" name="clavepct"/>Clave CT</td>
				<td><input type="checkbox" name="nombpct"/>Nombre CT</td>
				<td>Dentro del programa:
					<select name="dntrop">
						<option value="si">Si</option>
						<option value="no">No</option>
						<option value="2">Ambos</option>
					</td></tr>
				<tr bgcolor="#CFCFCF"><td><input type="checkbox" name="puesto"/>Puesto</td>
					<td><input type="checkbox" name="dp"/>Doble Plaza</td>
				<td><input type="checkbox" name="gimp"/>Grupo imp.</td>
				<td><input type="checkbox" name="apec" />Apoyos Econ&oacute;micos</td>
				<td>Ordenar por: <select name="ordenapor">
					<option value="ClaveCT">Clave CT</option>
					<option value="rfc">RFC</option>
					<option value="nomb">Nombre</option>
					<option value="puesto">Puesto</option>
				</select></td>
				</tr>
				</table>
				<a onclick="mostrar(1)" title=" Mostrar resultados " id="btnm" >Mostrar tabla</a>
                <a href="#" onclick="mostrar(2)" title=" Guardar resultados en archivo PDF" id="btnpdf" target="_blank"><b>PDF</b></a>
		</form>
	</div>
<!-------------------------------------------------------------------- -->
<iframe src="tablas.php" width="100%" height="800px" name="tab">
</div>
<div id="Pie"><div id="ContenedorPie"><img src="PiePagina.png" align="right"; />
 <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
	Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica<br />
	Secretar&iacute;a de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>

    </div>
</div>
</body>
</html>