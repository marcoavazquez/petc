<?php
echo "<div style='display:none;'>";
session_start();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
}
echo "</div>";
include("../seg/conec.php");
$link=Conectarse();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="../sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Veracruz</title>
	<link href='../imagen/sev.png' rel='shortcut icon'/>
    <script>
 function salir(){
            if(confirm(String.fromCharCode(191)+"Salir?")){
                location.href="salir.php";
            }else{
                return false		
            }
        }   
	function eliminarEsp(p){
		 if(confirm(String.fromCharCode(191)+"Eliminar especialidad?")){
                location.href="guardar.php?for=delesp&id="+p;
          }else{
                return false		
            }  
	}
	function eliminarNivE(p){
		 if(confirm(String.fromCharCode(191)+
		 "Realmente desea eliminar este dato, si este nivel de estudio está siendo utlizado por el sistema, podría causar algunos errores en la muestra de datos?")){
                location.href="guardar.php?for=delNivE&id="+p;
          }else{
                return false		
            }  
	}
	function eliminarPst(p){
		 if(confirm(String.fromCharCode(191)+
		 "Realmente desea eliminar este dato, si este PUESTO está siendo utlizado por el sistema, podría causar algunos errores en la muestra de datos?")){
                location.href="guardar.php?for=delpst&id="+p;
          }else{
                return false		
            }  
	}  
</script>
    <style>
		.vined{
			margin:0px auto;
			text-decoration:none;
			padding: 2px;
			color:#222;
		}
		.vined:hover{
			color:#FFF;
			background-color:#666;
		}
		.desp{
			color:#FF0000;
			text-decoration:none;	
		}
		.desp:hover{
			text-decoration:underline;	
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
			<li><a href="../petc.php">Admin. Escuelas</a></li>
            <li><a href="admSist/" ><b>Admin. Sistema</b></a></li>
            <li><a href="../admUsr/coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a href="../admUsr/usuario.php" >Admin. Usuarios</a></li>
			<li><a href="../salir.php" title="Salir" style="color:#550000;" onClick="return salir()">Salir</a></li>
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
<h3>Administraci&oacute;n del sistema</h3>
 &nbsp;<table style="font-size:13px;">
<tr style="border:1px double #555555" bgcolor="#bbbbbb">
<td><a href="index.php?edt=esc" class="vined">Datos principales de escuela</a></td>
<td><a href="index.php?edt=pers" class="vined">Datos de personal</a></td>
<td><a href="index.php?edt=esp" class="vined">Especialidades</a></td>
<td><a href="index.php?edt=nivest" class="vined">Nivel de estudios</a></td>
<td><a href="index.php?edt=pst" class="vined">Puestos</a></td>
</tr></table>
<br />
<div style="background-color:#F0F0F0;padding:10px;">
<?php
extract($_REQUEST);
if(!isset($edt)) $edt="";

switch($edt){
	///**********************************DATOS DE LA ESCUELA **************************************************************//
	case "esc":
?>
	<b>DATOS DE ESCUELA</b><BR />
    <form method="post" action="index.php?f=1&edt=esc">
	Ingrese clave de la escuela:<input type="text" name="bclave"/><input type="submit" value="Buscar" />
    </form>
    <br /><br />
    <?php
	if(isset($f)){
		extract($_REQUEST);
		if($f==1){ 
		
			$conse=mysql_query("select * from tescuelas where sClaveEscuela like '$bclave' ");
			if($e=mysql_fetch_array($conse)){
	?>
    		<form method="post" action="guardar.php">
            <input type="hidden" name="for" value="esc" />
            <input type="hidden" name="claveo" value="<?php echo $bclave; ?>" />
			<table style="font-size:12px">
    		<tr>
        	<td align="right">Clave:</td><td><input type="text" size="12" name="clave" value="<?php echo $e['sClaveEscuela']; ?>"/></td>
            <td align="right">Localidad:</td>
            <td><input type="text" size="40" name="loc" value="<?php echo $e['sLocalidad']; ?>"/></td>
        	</tr>
        	<tr>
        	<td align="right">Nombre de la escuela:</td>
            <td><input type="text" size="40" name="nomb" value="<?php echo $e['sNombre']; ?>"/></td>
            <td align="right">Municipio:</td><td><input type="text" size="40" name="mun" value="<?php echo $e['sMunicipio']; ?>"/></td>
        	</tr>
        	<tr>
        	<td align="right">Modalidad:</td><td><select name="mod">
            	<option value=""> [ Escoger ] </option>
                <option value="1">Federalizada</option>
                <option value="2">Estatal</option>
                <option value="3">Ind&iacute;gena</option>
            </select></td>
            <td align="right">Nivel:</td><td><select name="nivel">
            	<option value=""> [ Escoger ] </option>
                <option value="1">Preescolar</option>
                <option value="2">Primaria</option>
                <option value="3">Especial</option>
            </select></td>
        	</tr>
        	<tr>
        	<td align="right">Zona:</td><td><input type="text" size="3" name="zona" value="<?php echo $e['nZona']; ?>"/></td>
            <td align="right">Sector:</td><td><input type="text" size="3" name="sector" value="<?php echo $e['nSector']; ?>"/></td>
            </tr>
    		</table>
    		<input type="submit" value=" Guardar " />
            </form>
<?php
			}else{
				echo "<b>Clave no encontrada</b>";	
			}
		}
	}
	break;
	case "pers":
?>
	<b>DATOS DE PERSONAL</b><BR />
    <form method="post" action="index.php?f=2&edt=pers">
	Ingrese RFC:<input type="text" name="brfc"/><input type="submit" value="Buscar" />
    </form>
    <br /><br />
    <?php
	if(isset($f)){
		extract($_REQUEST);
		if($f==2){ 
		
			$conse=mysql_query("select * from trecursos_humanos where sRFC like '$brfc' ");
			if($e=mysql_fetch_array($conse)){
	?>
    		<form method="post" action="guardar.php">
            <input type="hidden" name="for" value="pers" />
            <input type="hidden" name="rfco" value="<?php echo $brfc; ?>" />
			<table style="font-size:12px">
    		<tr>
        	<td align="right">RFC:</td><td><input type="text" size="12" name="rfc" value="<?php echo $e['sRFC']; ?>"/></td>
            <td align="right">Nombre:</td>
            <td><input type="text" size="40" name="nombp" value="<?php echo $e['sNombreRH']; ?>"/></td>
        	</tr>
        	<tr>
        	<td align="right">Ap. Paterno:</td>
            <td><input type="text" size="40" name="appat" value="<?php echo $e['sApellidoPaternoRH']; ?>"/></td>
            <td align="right">Ap. Materno:</td><td><input type="text" size="40" name="apmat" value="<?php echo $e['sApellidoMaternoRH']; ?>"/></td>
        	</tr>
    		</table>
    		<input type="submit" value=" Guardar " />
            </form>
<?php
			}else{
				echo "<b>RFC No encontrado</b>";	
			}
		}
	}
	break;
	case "esp":
	
	$consesp=mysql_query("select * from tEspecialidad");
	if($espc=mysql_fetch_array($consesp)){
		echo "<table style='border:1px solid #555;font-size:12px' border='1px'><tr bgcolor='#CCCCCC'><th colspan='2'>Especialidades</th></tr>";
		do{
			echo "<tr><td>".$espc[1]."</td><td><a href='#' onclick='return eliminarEsp(".$espc[0].")' class='desp'>eliminar</td></tr>";
		}while($espc=mysql_fetch_array($consesp));
		echo "</table><br />";
	}else{
		echo "<b>No hay datos almacenados<(b>";	
	}
	?>
    <form method="post" action="guardar.php">
    	<input type="hidden" name="for" value="esp" />
		<input type='text' name='nesp' size='70' /><input type='submit' value=' A&ntilde;adir especialidad ' />
	</form>
	<?php
	break;
	case "nivest":
	
	$consne=mysql_query("select * from tnivel_estudios");
	if($nivE=mysql_fetch_array($consne)){
		echo "<table style='border:1px solid #555;font-size:12px' border='1px'><tr bgcolor='#CCCCCC'><th colspan='2'>Nivel de estudios</th></tr>";
		do{
			echo "<tr><td>".$nivE[1]."</td><td><a href='#' onclick='return eliminarNivE(".$nivE[0].")' class='desp'>eliminar</td></tr>";
		}while($nivE=mysql_fetch_array($consne));
		echo "</table><br />";
	}else{
		echo "<b>No hay datos almacenados<(b>";	
	}
	?>
    <form method="post" action="guardar.php">
    	<input type="hidden" name="for" value="nivE" />
		<input type='text' name='nne' size='70' /><input type='submit' value=' A&ntilde;adir Nivel de Estudio ' />
	</form>
	<?php
	break;
	case "pst":
		
	$consp=mysql_query("select * from tpuestos");
	if($pst=mysql_fetch_array($consp)){
		echo "<table style='border:1px solid #555;font-size:12px' border='1px'><tr bgcolor='#CCCCCC'><th colspan='2'>Puestos</th></tr>";
		do{
			echo "<tr><td>".$pst[1]."</td><td><a href='#' onclick='return _eliminarPst(".$pst[0].")' class='desp'>eliminar</td></tr>";
		}while($pst=mysql_fetch_array($consp));
		echo "</table><br />";
	}else{
		echo "<b>No hay datos almacenados<(b>";	
	}
	?>
    <form method="post" action="guardar.php">
    	<input type="hidden" name="for" value="pst" />
		<input type='text' name='npst' size='50' /><input type='submit' value=' A&ntilde;adir Puesto ' />
	</form>
    <?php
	break;
	default:
		echo "";
	break;
}
?>

</div>

    <div id="Pie"><div id="ContenedorPie"><img src="../imagen/PiePagina.png" align="right"; />
 <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
	Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica<br />
	Secretar&iacute;a de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>
    </div>
</div>
</body>
</html>
