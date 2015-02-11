<?php
session_start();
session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
	<style>
	table{
		color:#333;
		background-color:#ddd;
		border: 1px solid #555;
		padding:5px;
	}
	#Error{
		font-size:10px;
		color:#A00;
		border:1px solid #F00;
		background-color:#FCC;
		padding:2px 0px 2px 15px;
	}
	._txt{
		height:120%;
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
        </ul>
			<ul id="MenuUbicacion">
			<li>
			<ul>
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
				  textosemana[6]="Sábado";

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
			</ul>
		</li>
       </ul>
	</div>

	<div id="Cuerpo">
		<div id="Centro">
		<strong>Acceso al sistema: </strong>
			<form method="post" action="login.php">
				<table><tr>
				<td align="right">Usuario:</td><td><input type="text" name="user" class="_txt" /></td></tr>
				<tr><td>Contrase&ntilde;a:</td><td> <input type="password" name="pass" class="_txt"/></td>
				<td><input type="submit" value=" Ingresar "></td>
				</tr>
			</form>
	<?php
if(!isset($_POST["user"]) or !isset($_POST["pass"])){
	$user="";
	$pass="";
} else{
	$user=$_POST["user"];
	$pass=$_POST["pass"];
	$user=str_replace("'","",$user);
	$user=str_replace("#","",$user);
	$user=str_replace("<","",$user);
	$user=str_replace(">","",$user);
	
	$conexion = mysql_connect("localhost", "Marco", "mava189mava189");
	mysql_select_db("usr", $conexion) or die(mysql_error());
	$consulta = "SELECT * FROM usuario WHERE usuario like '$user' AND contrasena like '$pass'";
	$datos = mysql_query($consulta, $conexion);
    $uoa=  mysql_fetch_array($datos);
	$numDatos = @mysql_num_rows($datos);
	if ($numDatos != 1) {
		echo "<tr><td colspan='3'><div id='Error'>Error en el nombre de usuario y/o contrase&ntilde;a</div></td>";
	} else{
        if($uoa['tipo']=="usr"){
            print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
            session_start();
            $_SESSION['ing']=189;
            $_SESSION['nombre']="Usuario";
        }elseif($uoa['tipo']=="adm"){
             print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
            session_start();
            $_SESSION['ing']=189;
            $_SESSION['segu']=1;
            $_SESSION['nombre']="Administrador";
        }
	}
}
?>
</table>
		</div>
		<br />
	</div>
	<div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right"; />
    <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
	Subsecretar&iacute;a de Educac&oacute;n B&aacute;sica<br />
	Secretaría de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>

    </div>
</div>
</body>
</html>
