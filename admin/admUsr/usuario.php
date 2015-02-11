<?php 

echo "<div style='display:none;'>";
session_start();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
}
echo "</div>";

mysql_connect("localhost","root","");
mysql_select_db("usr");
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
                location.href="../salir.php";
            }else{
                return false		
            }
        }    

  function validar(){ 
	var m=document.getElementById("error");
if (document.frm_usu.usr_tipo.value.length ==0) {
       m.innerHTML= "Selecciona el tipo de usuario\n";
	   document.frm_usu.usr_tipo.focus();
	   return false;}
	   	   
if (document.frm_usu.usr_usuario.value.length <= 5) {
       m.innerHTML= "Usuario invalido \n";
	   document.frm_usu.usr_usuario.focus();
	   return false;}
if (document.frm_usu.usr_pass.value.length <= 5 || document.frm_usu.usr_pass.value == document.frm_usu.usr_usuario.value) {
       m.innerHTML= "Contraseña invalida \n";
	   document.frm_usu.usr_pass.focus();
	   return false;}	   
}
function salir(m){
            if(confirm(String.fromCharCode(191)+"Seguro que quiere eliminar éste dato?")){
				location.href="eliminar_usr.php?id="+m;
            }else{
                return false		
            }
        }
  </script>
</head>

<body>
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
            <li><a href="../admSist/" >Admin. Sistema</a></li>
            <li><a href="coordinacion.php">Admin. Coordinaci&oacute;n</a>
            <li><a><b>Admin. Usuarios</b></a></li>
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
<div id="Cuerpo">
<?php 
$consulta=mysql_query("select * from usuario");
$row=mysql_fetch_array($consulta);

if($row==0){echo"No hay resultados";}
else{
echo"<table align='center' border='1px'>
	<tr bgcolor='#555555' style='color:#FFF'>
		<th>USUARIO</th>
		<th>TIPO</th>
		<th>EDITAR</th>
		<th>MODIFICAR</th>
	</tr>";
	do{
	echo"<tr>
		<td>".$row['usuario']."</td>
		<td>".$row['tipo']."</td>
		<td><a href='modificar_usr.php?id=".$row['id']."'>Modificar</a></td>
		<td><a href='#' onclick='return salir(".$row['id'].");'>Eliminar</a></td>
		</tr>";
				} while($row=mysql_fetch_array($consulta));
echo "</table>";
}
?>
<br /><br /><br />
<form name="frm_usu" action="usuario.php" method="post" style="border:1px solid #AAA">
<table align="center">
<tr bgcolor="#DADADA"><th colspan="4">A&Ntilde;ADIR NUEVO USUARIO</th></tr>
<tr>
<th>*Tipo <select name="usr_tipo">
				<option value="">[Selecciona]</option>
                <option value="usr">Usuario</option>
                <option value="adm">Adminitrador</option>
			</select></th>
<th>*Usuario <input type="text" name="usr_usuario" maxlength="12" size="14"/></th>            
</tr>
<tr>
<th colspan="2">Contrase&ntilde;a <input type="password" name="usr_pass" maxlength="12" size="14" /></th>
</tr>
<tr><td><div id="error"></div></td></tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Guardar" onclick="return validar();" /></td>
</tr>
</table>
</form>

<?php 
extract ($_REQUEST);
if(!isset($usr_tipo,$usr_usuario,$usr_pass)){}
else{
	mysql_query("insert into usuario (usuario,contrasena,tipo) values ('$usr_usuario','$usr_pass','$usr_tipo')");
	$pagina="usuario.php";
             header("Location: $pagina");
	}

?>
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