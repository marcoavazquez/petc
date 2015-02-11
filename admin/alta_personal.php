<?php
//echo "<div style='display:none;'>";
//session_start();
//if($_SESSION['segu']!=1){
//print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
//}
//echo "</div>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<link href="sty.css" rel="stylesheet" type="text/css" />
	<title>Escuelas de Tiempo Completo | Veracruz</title>
	<link href='imagen/sev.png' rel='shortcut icon'/>
<style>
.si{ display: inline;}
.no{ display: none; }</style>
<script>
function cambia(){
	var x=document.getElementById("cambios");
	var e=document.getElementById("cc");
	var bt=document.getElementById("bot");
	e.className="si";
	x.className="si";
	bt.className="no";
	}
function llamados(){
	if(document.baja_personal.c_puesto.value=="Docente" || document.baja_personal.c_puesto.value=="Director" ){
		var s1=document.getElementById("especial");
		var s2=document.getElementById("nom");
		
		s1.className="no";
		s2.className="no";
		}else if(document.baja_personal.c_puesto.value=="Especialista"){
		var ss=document.getElementById("especial");
		var sss=document.getElementById("nom");
		ss.className="si";
		sss.className="si";		
		}
	}	
function llamar(){
document.alta_doc_dic.txt_puesto.value=document.form_registro.txt_puestos.value;
	if(document.form_registro.txt_puestos.value=="Docente" || document.form_registro.txt_puestos.value=="Director"){
		var esc=document.getElementById("formdoc");
		esc.className="si";
		
		var per=document.getElementById("formesp");
		per.className="no";
	}else if(document.form_registro.txt_puestos.value=="Especialista"){
		var perp=document.getElementById("formesp");
		perp.className="si";
		
		var escp=document.getElementById("formdoc");
		escp.className="no";
	}
}
function convertmayusculas() {
document.form_alta.txt_rfc.value=document.form_alta.txt_rfc.value.toUpperCase();
}	

</script>
<SCRIPT TYPE="text/javascript">
function checa(){ 
	var m=document.getElementById("error");
	//var m2=document.getElementById("error2");	
if (document.form_alta.txt_rfc.value.length == 0) {
       m.innerHTML= "Escriba un RFC para realizar la b�squueda\n";
	   document.form_alta.txt_rfc.focus();
	   return false;}
	   
//Validaciones para el formulario de agregar per	   
if (document.form_registro.txt_puestos.value.length == 0) {
       m.innerHTML= "Eliga un Puesto \n";
	   document.form_registro.txt_puestos.focus();
	   return false;}
//validacion formulario docente o director	   
if (document.alta_doc_dic.txt_clave_doc.value.length == 0) {
       m.innerHTML= "Escriba la clave de la escuela \n";
	   document.alta_doc_dic.txt_clave_doc.focus();
	   return false;}
if (document.alta_doc_dic.txt_nombre_doc.value.length == 0) {
       m.innerHTML= "Escriba el Nombre\n";
	   document.alta_doc_dic.txt_nombre_doc.focus();
	   return false;}
if (document.alta_doc_dic.txt_ape_pat_doc.value.length == 0) {
       m.innerHTML= "Escriba el Apellido Paterno\n";
	   document.alta_doc_dic.txt_ape_pat_doc.focus();
	   return false;}
if (document.alta_doc_dic.txt_ape_mat_doc.value.length == 0) {
       m.innerHTML= "Escriba el Apellido Materno\n";
	   document.alta_doc_dic.txt_ape_mat_doc.focus();
	   return false;}
if (document.alta_doc_dic.txt_horario_doc.value.length == 0) {
       m.innerHTML= "Escriba el Horario\n";
	   document.alta_doc_dic.txt_ape_mat_doc.focus();
	   return false;}
//alta especialista	   
if (document.alta_especialistas.txt_clave_esp.value.length == 0) {
       m.innerHTML= "Escriba la clave de la escuela \n";
	   document.alta_especialistas.txt_clave_esp.focus();
	   return false;}
if (document.alta_especialistas.txt_nombre_esp.value.length == 0) {
       m.innerHTML= "Escriba el Nombre\n";
	   document.alta_especialistas.txt_nombre_esp.focus();
	   return false;}
if (document.alta_especialistas.txt_ape_pat_esp.value.length == 0) {
       m.innerHTML= "Escriba el Apellido Paterno\n";
	   document.alta_especialistas.txt_ape_pat_esp.focus();
	   return false;}
if (document.alta_especialistas.txt_ape_mat_esp.value.length == 0) {
       m.innerHTML= "Escriba el Apellido Materno\n";
	   document.alta_especialistas.txt_ape_mat_esp.focus();
	   return false;}
if (document.alta_especialistas.txt_esp.value.length == 0) {
       m.innerHTML= "Eliga la Especialidad\n";
	   document.alta_especialistas.txt_esp.focus();
	   return false;}	   
}




</SCRIPT>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:110px;margin-left:610px;">
					<h1>Escuelas de Tiempo Completo</h1>
					<h2>Modificar Personal</h2>
		</div>
	</div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
			<li><a href="petc.php"><strong>Modificaciones</strong></a></li>
            <li><a href="" >Admin.usuarios</a></li>
			<li><a href="salir.php" title="salir" >Salir</a></li>
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
<?php 
if(!isset($_GET['rfcde']))
	echo "";
elseif(!isset($_POST['txt_rfc']) and isset($_GET['rfcde']))
	$dato=$_GET['rfcde'];	

if(!isset($_POST['txt_rfc']))
$dato="";
else
$dato=$_POST['txt_rfc'];
	
?>
<form name="form_alta" method="post" action="alta_personal.php">
<table align="center" style="font-size:10px;">
<tr><td><input type="text" name="txt_rfc" value="<?php echo $dato;?>" onkeypress="convertmayusculas();" maxlength="13"/></td>
<td><input type="submit" value="Buscar" onclick="checa();" /></td></tr><tr><th><label>Ingrese el RFC</label></th></tr><tr><td><div id="error"></div></td></tr>
</table>
</form>

<?php 
mysql_connect("localhost","Marco","mava189mava189");
mysql_select_db("petc");

if(isset($_POST['txt_rfc'])){
$dato=$_POST['txt_rfc'];

$busca=mysql_query("select rfc from recursos_humanos where rfc like '".$dato."'");
$bus= @mysql_num_rows($busca);
if($bus==1){


$consulta=mysql_query("select recursos_humanos.rfc,recursos_humanos.nombre,recursos_humanos.ape_pat,recursos_humanos.ape_mat,recursos_humanos.puesto,recursos_humanos.doble_plaza,escuelas.nombre_escuela,recursos_humanos.activo from recursos_humanos,rec_hum_esc,escuelas where recursos_humanos.rfc=rec_hum_esc.rfc and rec_hum_esc.clave_escuela=escuelas.clave_escuela and recursos_humanos.rfc like '".$dato."'");

$resultado=mysql_fetch_array($consulta);
?>
<!-- ====================================Este es el formulario de consulta con la opcion de dar de baja y de cambios===================================-->
<form name="cambio_s" method="post" action="funciones.php">
<input type="hidden" name="rfc_pro" value="<?php echo $dato; ?>"/>
<br /><div id="cc" class="no"><p style="color:red; font-size:14px; text-align:center">Estos son los datos anteriores</p></div>
<table align="center" style="font-size:12px; border:1px solid #333;">
<tr bgcolor="#999999"><th>RFC</th><th>Nombre</th><th>Puesto</th><th>&nbsp;Plaza&nbsp;</th><th>Escuela(s)</th></tr>
<tr bgcolor="#CCCCCC"><td>&nbsp;<?php echo $resultado['rfc']?>&nbsp;</td>
<td>&nbsp;<?php echo $resultado['nombre']." ".$resultado['ape_pat']." ".$resultado['ape_mat']; ?>&nbsp;</td>
<td>&nbsp;<?php echo $resultado['puesto'] ?>&nbsp;</td><td>&nbsp;<?php echo $resultado['doble_plaza'] ?>&nbsp;</td>
<td>&nbsp;<?php echo $resultado['nombre_escuela'] ?>&nbsp;</td></tr></table><br />

<label style="color:#222; margin-left:300px" >El personal</label>&nbsp;<?php echo $resultado['activo']; ?>&nbsp;<label>est&aacute; activo</label><br /><br />
<center><div id="bot" class="si">
<input type="button" onclick="cambia()" value="Modificar Datos" />&nbsp;
&nbsp;<input type="submit" value="Eliminar Registro" name="boton1" />
</div></center>
</form><br /><br />

<div id="cambios" class="no">
<form name="baja_personal" method="post" action="funciones.php">
<input type="hidden" name="rfc_pro" value="<?php echo $dato; ?>"/>
<?php $bb=mysql_query("select clave_escuela,nombre_escuela from escuelas"); $b=mysql_fetch_array($bb);
		$ess=mysql_query("select id_esp,especialidad from especialidad"); $ss=mysql_fetch_array($ess); ?>
<table align="center" style="font-size:11px; border:1px solid #333; " >
<tr><th>RFC</th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>
<tr><td><input type="text" name="c_rfc" value="<?php echo $resultado['rfc']; ?>" size="13"/></td>
<td><input type="text" name="c_nom" value="<?php echo $resultado['nombre'] ?>" size="20"/></td>
<td><input type="text" name="c_ape_pat" value="<?php echo $resultado['ape_pat'] ?>" size="20" /></td>
<td><input type="text" name="c_ape_mat" value="<?php echo $resultado['ape_mat'] ?>" size="20" /></td></tr>
<tr><th>Puesto</th><th id="nom" class="no">Especialidad</th><th>Doble Plaza</th><th>Escuela(s)</th></tr>
<tr><td><select name="c_puesto" onchange="llamados();">
										<option value="">[Selecciona]</option>
										<option value="Docente">Docente</option>
                                        <option value="Director">Director</option>
                                        <option value="Especialista">Especialista</option>
                                    </select></td><td id="especial" class="no"><select name="c_esp"><option value="">[Selecciona]</option>
    			<?php do{
					echo "<option value='".$ss['id_esp']."'>".$ss['especialidad']."</option>";
					}while ($ss=mysql_fetch_array($ess));
    										?>
                                        </select></td>
                                        
<td>S&iacute;<input type="radio" name="c_plaza" value="si" />&nbsp;No<input type="radio" name="c_plaza" value="no" checked="checked"/></td>
<td><select name="c_esc">
	<option value="nc">[Selecciona]</option>
    			<?php do{
					echo "<option value='".$b['clave_escuela']."'>".$b['nombre_escuela']."</option>";
					}while ($b=mysql_fetch_array($bb));
    										?>
                                        </select></td></tr>
</table><br /><br />
<input type="submit" value="Cambiar" name="boton1" />
</form>
</div>
<!--======================================================================== -->

<?php }//cierra el if de la busqueda del rfc 
else{?>
<label>El RFC</label><label><div style="color:red; font-weight:bold">"<?php echo $dato;?>"</div> no ha sido registrado, seleccione un puesto para continuar el registro</label>
<form name="form_registro" >
<table>
	<tr>
		<td><select name="txt_puestos" onchange="llamar();">
        		<option value="">[Selecciona]</option>
        		<option value="Docente">Docente</option>
                <option value="Director">Director</option>
                <option value="Especialista">Especialista</option>
        	</select></td>
	</tr>
</table>
</form>
<div id="formdoc" class="no">
<center><legend>Alta de Docentes y Directores</legend></center>
<form name="alta_doc_dic" method="post" action="funciones.php">
<table width="806" align="center">
<tr><input type="hidden" name="txt_rfc_doc" value="<?php echo $dato; ?>"/><input type="hidden" name="txt_puesto" value="" />
	<td width="273" height="63"><label>RFC</label>&nbsp;<div style="color:red;font-weight:bold"><?php echo $dato; ?></div></td><td><label>Clave de la escuela de trabajo</label>&nbsp;<input type="text" name="txt_clave_doc" /></td><td><label>Ciclo 2011-2012</label></td>
</tr>
<tr>
	<td height="49"><input type="text" name="txt_nombre_doc" /><br />Nombre(s)</td><td width="347"><input type="text" name="txt_ape_pat_doc" /><br />Apellido Paterno</td><td width="170"><input type="text" name="txt_ape_mat_doc" /><br />Apellido Materno</td>
</tr>
<tr>
	<td height="43"><label>�Tiene doble plaza?</label>&nbsp;No<input type="radio" value="no" name="txt_plaza" />&nbsp;S&iacute;<input type="radio" value="si" name="txt_plaza" /></td>
    <td><label>�Esta dentro del programa?</label>&nbsp;No<input type="radio" value="no" name="txt_prog_doc" />&nbsp;S&iacute;<input type="radio" value="si" name="txt_prog_doc" /></td>
</tr>
<tr><td><label>Horario de trabajo</label>&nbsp;<input type="text" name="txt_horario_doc" /></td><td><input type="submit" value="Registrar" onclick="checa();" /></td></tr><tr><td><div id="error2"></div></td></tr>
</table>
</form>
</div>

<div id="formesp" class="no">
<center><legend>Alta de Especialistas</legend></center>
<form name="alta_especialistas" method="post" action="funciones.php">
<table align="center">
<tr><input type="hidden" name="txt_rfc_esp" value="<?php echo $dato; ?>"/><input type="hidden" value="Especialista" name="txt_puesto"/>
	<td height="43"><label>RFC</label>&nbsp;<div style="color:red; font-weight:bold"><?php echo $dato; ?></div></td><td><label>Clave de la escuela</label>&nbsp;<input type="text" name="txt_clave_esp" /></td><td><label>Ciclo 2011-2012</label></td>
</tr>
<tr>
	<td height="65"><input type="text" name="txt_nombre_esp" /><br /><label>Nombre(s)</label></td><td><input type="text" name="txt_ape_pat_esp" /><br />Apellido Paterno</td><td><input type="text" name="txt_ape_mat_esp" /><br />Apellido Materno</td>
</tr>
<tr>
<?php 
$sel=mysql_query("select id_esp,especialidad from especialidad");
$s=mysql_fetch_array($sel);

?>
	<td><label>Especialidad</label>&nbsp;<select name="txt_esp">
    			<?php do{
					echo "<option value='".$s['id_esp']."'>".$s['especialidad']."</option>";
					}while ($s=mysql_fetch_array($sel));
    										?>
                                        </select></td><td><input type="submit" value="Registrar" onclick="checa();"/></td>
</tr>
</table>
</form>
</div>


<?php 
}//esta llave cierra el else en caso de que el rfc no este registrado
}
?>



 <div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right"; />
 <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
	Subsecretar�a de Educaci�n B�sica<br />
	Secretar�a de Educaci�n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
Col SAHOP, C.P. 91190, Xalapa Veracruz, M�XICO.</div></div>
    </div>
</div>
</body>
</html>
