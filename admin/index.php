<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Veracruz</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
	<script language="javascript">
	    window.document.getElementById("usuario").focus();
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
					<h2>Modificar</h2>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
		    <li><a><strong>Administraci&oacute;n</strong></a></li>
            <li><a href="../"><strong>Inicio</strong></a></li>
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
	   	<div id="Centro">
    	    <br />
			<form method="post" action="index.php" id="forlogin" name="forlog">
				<table>
					<tr><td align="right">Usuario:</td><td><input type="text" name="user0" id="usuario" /></td></tr>
					<tr><td>Contrase&ntilde;a:</td><td><input type="password" name="pass" /></td></tr>
					<tr><td></td><td><br /><input type="submit" value="Ingresar" name="ingresar" ></td>
					</tr>
				</table>
				<?php
if(!isset($_POST["user0"]) or !isset($_POST["pass"])){
	$user="";
	$pass="";
} else{
	$user=$_POST["user0"];
	$pass=$_POST["pass"];
	$user=str_replace("'","_",$user);
	$user=str_replace("#","-",$user);
	
	$conexion = mysql_connect("localhost", "root", "");
	mysql_select_db("usr", $conexion) or die(mysql_error());
	$consulta = "SELECT * FROM usuario WHERE usuario like '$user' AND contrasena like '$pass' and tipo like 'adm'";
	$datos = mysql_query($consulta, $conexion);
	$numDatos = @mysql_num_rows($datos);
	if ($numDatos != 1) {
		echo "<div id='Error'>Error en el nombre de usuario y/o contrase�a</div>";
	} else {
		$_SESSION['segu']=1;
		$_SESSION['nombre']="administrador";
		print "<meta http-equiv=Refresh content='0 ; url= petc.php'>";
	}
}
?>
</form>	
<br />
	<br />	
</div>
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
