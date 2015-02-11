<?php 

echo "<div style='display:none;'>";
session_start();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
}
echo "</div>";

mysql_connect("localhost","root","");
mysql_select_db("e_t_c");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="../sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Veracruz</title>
	<link href='../imagen/sev.png' rel='shortcut icon'/>
    <link rel="stylesheet" type="text/css" media="all" href="calendario/calendar-green.css" title="win2k-cold-1" />
  <script type="text/javascript" src="calendario/calendar.js"></script>
  <script type="text/javascript" src="calendario/lang_calendar-es.js"></script>
  <script type="text/javascript" src="calendario/calendar-setup.js"></script>
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
if (document.frm_cor.cor_evento.value.length == 0) {
       m.innerHTML= "Ingrese un evento\n";
	   document.frm_cor.cor_evento.focus();
	   return false;}
	   	   
if (document.frm_cor.cor_fecha.value.length == 0) {
       m.innerHTML= "Selecciona una fecha \n";
	   document.frm_cor.cor_fecha.focus();
	   return false;}
if (document.frm_cor.cor_hora.value.length == 0) {
       m.innerHTML= "Selecciona la hora \n";
	   document.frm_cor.cor_hora.focus();
	   return false;}	   
if (document.frm_cor.cor_min.value.length == 0) {
       m.innerHTML= "Selecciona los minutos \n";
	   document.frm_cor.cor_min.focus();
	   return false;}	  
if (document.frm_cor.cor_lugar.value.length == 0) {
       m.innerHTML= "Ingrese el lugar \n";
	   document.frm_cor.cor_lugar.focus();
	   return false;}	    
}
function salir(m){
	if(confirm(String.fromCharCode(191)+"Seguro que quiere eliminar éste dato?")){
		location.href="eliminar_adm.php?id="+m;
		}else{
			return false;
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
            <li><a><b>Admin. Coordinaci&oacute;n</b></a>
            <li><a href="usuario.php">Admin. Usuarios</a></li>
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
$consulta=mysql_query("select * from coordinacion");
$row=mysql_fetch_array($consulta);

if($row==0){echo"No hay resultados";}
else{
echo"<table align='center' border='1px'>
	<tr>
		<th>EVENTO</th>
		<th>FECHA</th>
		<th>HORA</th>
		<th>LUGAR</th>
	</tr>";
	do{
	echo"<tr>
		<td>".$row['nom_evento']."</td>
		<td>".$row['fecha']."</td>
		<td>".$row['hora']."</td>
		<td>".$row['lugar']."</td>
		<td><a href='modificar_adm.php?id=".$row['id_adm']."'>Modificar</a></td>
		<td><a href='#' onclick='return salir(".$row['id_adm'].")'>Eliminar</a></td>
		</tr>";
				} while($row=mysql_fetch_array($consulta));
echo "</table>";
}
?>
<form name="frm_cor" action="coordinacion.php" method="post">
	<table align="center">
    	<tr>
        	<th>*Evento <br /> <textarea name="cor_evento"  cols="33"></textarea></th>
            <th>*Fecha<br /> <input type="text" name="cor_fecha" id="cor_fecha" maxlength="" /><input type="button" id="lanzador" value="..." />
			<script type="text/javascript">
    Calendar.setup({
        inputField     :    "cor_fecha",      
        ifFormat       :    "%d/%m/%Y",       
        button         :    "lanzador"   
    	
	});
</script></th>
            <th>*Hora <br /> <select name="cor_hora">
            					<option value="">--</option>
            					<option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
            				</select>:<select name="cor_min">
                            			<option value="">--</option>
                                        <option value="00">00</option>
                            			<option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>	
                            		</select></th>
          <th>*Lugar <br /><input type="text" name="cor_lugar" /></th>                          
        </tr>
        <tr><td colspan="4" align="center"><div id="error"></div></td></tr>
        <tr><td colspan="4" align="center"><input type="submit" value="Guardar"  onclick="return validar();"/></td></tr>
    </table>
</form>
</body>
<?php 
extract ($_REQUEST);
if(!isset($cor_evento,$cor_fecha,$cor_hora,$cor_min,$cor_lugar)){}
else{
	$cor_hh=$cor_hora.":".$cor_min;
	mysql_query("insert into coordinacion (nom_evento,fecha,hora,lugar) values ('$cor_evento','$cor_fecha','$cor_hh','$cor_lugar')");
	$pagina="coordinacion.php";
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