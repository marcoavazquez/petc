<?php
SESSION_START();
if($_SESSION['segu']!=1 or !isset($_SESSION['segu'])){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
}
include("conec.php");
$link=Conectarse();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Modificaciones por escuela</title>
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
#cambio{
	border:1px solid #666;
	background-color:#DADADA;
	padding:15px;
	margin: 10px;
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
            <li><a onclick="return advertencia ('admSist/');" href="admSist/" >Admin. Sistema</a></li>
            <li><a href="admUsr/coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a href="admUsr/usuarios.php" >Admin. Usuarios</a></li>
			<li><a href="salir.php" title="Salir" style="color:#AA0000;" onClick="return salir()">Salir</a></li>
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
<div id="cambio">
<h3>Cambios a escuela</h3>
<form action="cambesc.php" method="get">
Por clave de escuela:<input type="text" name="clave" size="12"/>
<?php if(isset($_GET['error']) and $_GET['error']==1) 
	echo "&nbsp;<b style='color:#FF0000'>Clave No encontrada</b>"; ?>
<br />o<br />
Seleccione una escuela:<select name="claves">
						<option value="undef">[-- Seleccione una escuela --]</option>
		<?php
        	$consesc=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio from tescuelas where nAfiliada=1 order by sNombre");
				if($esc=mysql_fetch_array($consesc)){
					do{
						echo "<option value='".$esc['sClaveEscuela']."'>"
						.$esc['sNombre']." - ".$esc['sLocalidad']." (".$esc['sMunicipio'].")</option>";
					}while($esc=mysql_fetch_array($consesc));
				}
		?>
        </select>
        
        <?php if(isset($_GET['error']) and $_GET['error']==1) 
	echo "&nbsp;<b style='color:#FF0000'>o NO ha seleccionado escuela</b>"; ?>
        
        <br /><br />
<input type="submit" value="Continuar" />
</form>
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
