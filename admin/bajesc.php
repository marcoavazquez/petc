<?php
SESSION_START();
if($_SESSION['segu']!=1){
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
	function preguntar(){
				if(confirm(String.fromCharCode(191)+"Esta seguro de dar a esta escuela de baja con todo su personal?")){
		document.foraltas.clave.submit();
	}
	else{
		return false		
	}
	}
     function salir(){
            if(confirm(String.fromCharCode(191)+"Esta seguro de dar a esta escuela de baja con todo su personal?")){
                location.href="salir.php";
            }else{
                return false		
            }
        }
</script>
<style>
#cambio{
	color:#550000;
	border:1px solid #f66;
	background-color:#FFDDDD;
	width:500px;
	padding:10px;
	margin: 10px;
}
</style>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:110px;margin-left:610px;">
					<h1>Escuelas de Tiempo Completo</h1>
					<h2>Escuelas</h2>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			<li><a href="petc.php"><strong>Admin. Escuelas</strong></a></li>
            <li><a href="admUsr/coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a href="admUsr/usuarios.php" >Admin. Usuarios</a></li>
			<li><a href="salir.php" title="Salir" style="float:left; color:#AA0000;" onClick="return salir()">Salir</a></li>
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
<div id="cambio">
<br />
<form action="bajaescuelaok.php" method="post">
<?php
if($_POST['claves']=="undef")
$clave=$_POST['clave'];
else
$clave=$_POST['claves'];

$conesc=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nZona,nSector from tescuelas where sClaveEscuela like '".$clave."'");
	if($esc=mysql_fetch_array($conesc)){
	?>
	<strong>DATOS DE LA ESCUELA</strong><br />
	<br />
	<strong>Clave:</strong>&nbsp;<?php echo $esc['sClaveEscuela']?>
	&nbsp;&nbsp;
	<strong>Escuela:</strong>&nbsp;<?php echo $esc['sNombre']?>
	<br /><br>
	<strong>Zona:</strong>&nbsp;<?php echo $esc['nZona']?>&nbsp;&nbsp; <strong> Sector:</strong>&nbsp;<?php echo $esc['nSector']?>
	&nbsp;&nbsp;
	<br />
	<strong>Localidad:</strong>&nbsp;<?php echo $esc['sLocalidad']?>&nbsp;
	&nbsp;<strong>Municipio:</strong>&nbsp;<?php echo $esc['sMunicipio']?>
	<br /><br />
	<input type="hidden" name="clave" value="<?php echo $clave; ?>" /> 
	       <br />
          </div>
<?php
			//DOCENTES
		
			/////////////////////////////ESPECIALISTAS/////////////////////////		
		
				echo "<br /><input type='submit' value='DAR DE BAJA' style='color:#FF0000; border-color:#ff0000' onclick='return preguntar()'>";
	}else{
			echo "<span style='color:#FF0000; background-color:#FFDDDD; border: 1px solid #aa0000; padding: 5px; margin-left:30px;'>Clave no encontrada</span><br />";
			echo "<br /><a href='bajaescuela.php' style='color:#222222'>Volver</a>";
		}
?>
</form>
</div>
</div>
<div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right"; />
 <div></div></div>
</div>
</div>
</body>
</html>
