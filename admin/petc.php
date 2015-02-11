<?php
echo "<div style='display:none;'>";
session_start();
if($_SESSION['segu']!=1){
header("Location:index.php");
}
echo "</div>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Veracruz</title>
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
		#tabesc{
			padding:3px;
			margin:0px auto;
		}
		#tabesc a{
			text-decoration:none;
			padding: 5px;
			color:#333;
			background-color:#AAA;
			border:1px solid #555;
		}
		#tabesc a:hover{
			color:#000;
			background-color:#BFBFBF;
		}
	</style>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:110px;margin-left:610px;">
					<h1>Escuelas de Tiempo Completo</h1>
					<h2></h2>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			<li><a href="petc.php"><strong>Admin. Escuelas</strong></a></li>
            <li><a href="admSist/" >Admin. Sistema</a></li>
            <li><a href="admUsr/coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a href="admUsr/usuario.php" >Admin. Usuarios</a></li>
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
<div id="Cuerpo"><br />
	<table id="tabesc">
		<tr>
			<td><a href="cambiosescuela.php" title="Realizar cambios a escuela" ><b>Cambios a escuela</b></a></td>
			<td><a href="altaescuela.php" title="Dar de alta una escuela nueva" ><b>Alta de escuela</b></a></td>
			<td><a href="bajaescuela.php" title="Dar de baja una escuela" ><b>Baja de escuela</b></a></td>
		</tr> 
	</table>
  <br />&nbsp;
  &nbsp;
  <br /><br />
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
