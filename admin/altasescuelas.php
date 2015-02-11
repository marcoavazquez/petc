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
	<title>Escuelas de Tiempo Completo | Modificaciones por escuela</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
	<script src="validar.js" language="Javascript" ></script>
    <link type="text/css" href="jsm3/css/custom-theme/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
        <script type="text/javascript" src="jsm3/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="jsm3/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" src="js/validanguage_uncompressed.js"></script> 
        <script type="text/javascript" src="js/jquery-tooltip/jquery.tooltip.js"></script>
		<script type="text/javascript" src="js/solicitud.js"></script> 
        <script language="Javascript">
         function salir(){
            if(confirm(String.fromCharCode(191)+"Salir?")){
                location.href="salir.php";
            }else{
                return false		
            }
        }
    </script>
<style>
#alta{
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
					<h2>Escuelas</h2>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			<li><a href="petc.php"><strong>Admin. Escuelas</strong></a></li>
            <li><a href="admSist/" >Admin. Sistema</a></li>
            <li><a href="admUsr/coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a href="admUsr/usuarios.php" >Admin. Usuarios</a></li>
			<li><a href="#" title="Salir" style="color:#550000;" onClick="return salir()">Salir</a></li>
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
<strong>Datos de la escuela:</strong><br />
<?php
include("conec.php");
$link=Conectarse();
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc",$link);
$ciclo=mysql_fetch_array($cocic);
	
$color=array("#FAFAFA","#DADADA");
$cont=1;
$armod=array(1=>"Federalizada",2=>"Estatal",3=>"Ind&iacute;gena");
$arniv=array(1=>"Preescolar",2=>"Primaria",3=>"Especialista");
$arpuesto=array(1=>"Docente",2=>"Director",3=>"Especialista");
$arciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
              6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020");
			  
$armeses=array(1=>"Agosto",2=>"Septiembre",3=>"Octubre",4=>"Noviembre",5=>"Diciembre",6=>"Enero",
             7=>"Febrero",8=>"Marzo",9=>"Abril",10=>"Mayo",11=>"Junio",12=>"Julio");
?>
<br />
<form method="post" action="escpers.php" name="foraltas">
<table>
<tr><td align="right">Ciclo:</td><td><select name="ciclo">
<?php
	do{
		echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
	}while($ciclo=mysql_fetch_array($cocic));
?>
		</select></td></tr>
	<tr><td align="right">Clave escuela:</td>
	<td><input type="text" id="clave" name="clave" size="12" onkeyup="validarclave()" />
    <small style="color:#FF0000; font-weight:bold;" id="errorclave"></small></td>
	<td align="right">Nombre escuela:</td><td  colspan="2"><input type="text" name="nombreesc" size="30"/>
    <small style="color:#FF0000; font-weight:bold;" id="errornomb"></small>
    </td></tr>
<tr><td align="right">Nivel:</td>
<td><select name="nivel">
<option value="0">[ seleccione ]</option>
	<option value="1">Preescolar</option>
	<option value="2">Primaria</option>
	<option value="3">Especial</option>
</select><small style="color:#FF0000; font-weight:bold;" id="errorniv"></small></td>	
<td align="right" >Modalidad:</td><td>
<select name="mod">
	<option value="0">[ seleccione ]</option>
	<option value="1">Federalizada</option>
    <option value="2">Estatal</option>
    <option value="3">Ind&iacute;gena</option>
 </select><small style="color:#FF0000; font-weight:bold;" id="errormod"></small>
</td>
<tr>
<td align="right">Zona:</td><td><input type="text" name="zona" id="zona" size="4"/>
 <!-- <validanguage target="zona" mode="allow" expression="numeric -()" required="true" maxlength="5" errorMsg="Campo CP vacío"> -->
<small style="color:#FF0000; font-weight:bold;" id="errorzona"></small></td>
<td align="right">Sector:</td><td><input type="text" name="sector" id="sector" size="4"/>
 <!-- <validanguage target="sector" mode="allow" expression="numeric -()" required="true" maxlength="5" errorMsg="Campo CP vacío"> -->
<small style="color:#FF0000; font-weight:bold;" id="errorsec"></small></td></tr>
</tr>
<tr>
<td align="right">Tel&eacute;fono:</td><td><input type="text" name="tel" size="15" id="tel" />
<!-- <validanguage target="tel" mode="allow" onkeyup="validanguage.format('(xxx)x-xx-xx-xx', '-() ', '.')" expression="numeric -()" maxlength="15"> -->
<small style="color:#FF0000; font-weight:bold;" id="errortel" ></small></td>
<td align="right">e-mail:</td><td><input type="text" name="email" />
<small style="color:#FF0000; font-weight:bold;" id="errormail" ></small></td>
</tr>
<tr>
<td align="right">Calle</td><td><input type="text" name="calle" size="30"/>
<small style="color:#FF0000; font-weight:bold;" id="errorcalle" ></small></td>
<td align="right">C.P:</td><td><input type="text" name="cp" id="cp" size="5"/>
 <!-- <validanguage target="cp" mode="allow" expression="numeric -()" required="true" maxlength="5" errorMsg="Campo CP vacío"> -->
<small style="color:#FF0000; font-weight:bold;" id="errorcp" ></small></td></tr>
<tr>
<tr>
<td align="right">N&uacute;mero:</td><td><input type="text" name="num" size="5" />
<small style="color:#FF0000; font-weight:bold;" id="errornum" ></small></td>
<td align="right">Colonia:</td><td><input type="text" name="col" size="30"/>
<small style="color:#FF0000; font-weight:bold;" id="errorcol" ></small></td></tr>
<tr>
	<td align="right" >Localidad:</td><td><input type="text" name="loc" size="30"/>
    <small style="color:#FF0000; font-weight:bold;" id="errorloc"></small></td>
	<td align="right">Municipio:</td><td colspan="2"><input type="text" name="mun" size="30"/>
    <small style="color:#FF0000; font-weight:bold;" id="errormun"></small></td></tr>
</table>
<br />
<input type="submit" value="Dar de alta" style="float:inherit;font-size:14px;padding:5px;width:30%" onclick="return validarfor()" />

</form>
</div>
</div>
<div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right" />
 <div>Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
	Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica<br />
	Secretar&iacute;a de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>
</div>
</div>
</body>
</html>
