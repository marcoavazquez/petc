<?php
SESSION_START();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
}
include("conec.php");
$link=Conectarse();

if($_GET['claves']=="undef")
	$clave=$_GET['clave'];
else
	$clave=$_GET['claves'];
    
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
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

$conesc=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector 
					from tescuelas where sClaveEscuela like '".$clave."'");
					
	if(mysql_num_rows($conesc)==0){ //si la clave no es correcta
		header("Location:cambiosescuela.php?error=1");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        
		<link type="text/css" href="jsm3/css/custom-theme/jquery-ui-1.8.18.custom.css" rel="stylesheet" />	
        <script type="text/javascript" src="jsm3/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" src="jsm3/js/jquery-ui-1.8.18.custom.min.js"></script>
        <script type="text/javascript" src="js/validanguage_uncompressed.js"></script> 
        <script type="text/javascript" src="js/jquery-tooltip/jquery.tooltip.js"></script>
		<script type="text/javascript" src="js/solicitud.js"></script> 
		<script type="text/javascript" src="js/validarCambios.js"></script> 
        <link href="sty.css" rel="stylesheet" type="text/css" />
		
		<title>Escuelas de Tiempo Completo | Modificaciones por escuela</title>
		<link href='imagen/sev.png' rel='shortcut icon'/>
	<script>
		function mostrarocultar(p){
			var muo=document.getElementById(p);
			if(muo.className=="nov"){
				muo.className="vis";
			}else if(muo.className=="vis"){
				muo.className="nov";
			}
		}
        
        function salir(){
            if(confirm(String.fromCharCode(191)+"Salir?")){
                location.href="salir.php";
            }else{
                return false		
            }
        }
		function eliminar(rfc,clave,ciclo){
			 if(confirm(String.fromCharCode(191)+"Desea realmente eliminar a esta persona del programa y de la escuela?")){
                location.href="guardarCambios.php?formag=bajap&rfc="+rfc+"&clavesc="+clave+"&ciclo="+ciclo;
            }else{
                return false		
            }
		}
		
	</script>
<style>
#cambio{
	padding:10px;
	
}
#abtn{
	color:#334;
	text-decoration:none;
	padding:5px;
	background-color:#CCCCDD;
	border: 1px solid #559;
	float: right;
	margin:5px;
}
#abtn:hover{
	color:#445;
	background-color:#DDDDFF;
}
#abtn:active{
	color:#334;
	background-color:#CFCFDF;
}
.nov{
	display:none
}
.vis{
	display:inline;
}
#cambio a{
	color:#005;
	text-decoration:none;
}
#cambio a:hover{
	color:#009;
	text-decoration:underline;
}
.error{
	color:#F00;
}
.btnbaja{
	color:#F00 !important;
	background-color:#fcfCfC;
	font-size:10px;
	border: 1px solid #600;
	padding:1px;
}
.btnbaja:hover{
	background-color:#FFDDDD;
	text-decoration:none !important;
}
</style>
</head>
<body>
<div id="Contenido">
	<div id="Cabecera">
		<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:110px;margin-left:610px;">
					<h1>Escuelas de Tiempo Completo</h1>
					<h2>Cambios</h2>
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
<?php
	$esc=mysql_fetch_array($conesc);
	echo "<table id='tescuela' style='border:1px solid #555; padding: 0px; ' ><tr bgcolor='#BABABA'>
			<th>CLAVE</th><th>ESCUELA</th><th>LOCALIDAD</th><th>MUNICIPIO</th><th>NIVEL</th><th>MODALIDAD</th><th>ZONA</th><th>SECTOR</th></tr>";
	echo "<tr bgcolor='#CCCCCC' align='center'><td>&nbsp;".$esc['sClaveEscuela']."&nbsp;</td><td>&nbsp;".$esc['sNombre']."&nbsp;</td>
			<td>&nbsp;".$esc['sLocalidad']."&nbsp;</td><td>&nbsp;".$esc['sMunicipio']."&nbsp;</td><td>&nbsp;".$arniv[$esc['nNivel']]."&nbsp;</td>
			<td>&nbsp;".$armod[$esc['nModalidad']]."&nbsp;</td><td>&nbsp;".$esc['nZona']."&nbsp;</td><td>".$esc['nSector']."</tr>";
	echo "</table>";
    
   //*****************************************DATOS DE UBICACIÃ“N**********************//
	?>
	<br />
    <div class="copc" style='border:2px solid #777; padding:10px; margin:5px; background-color:#DDDDDD'>
	<a href="#" onclick="mostrarocultar('dgen')" ><b>Datos Generales</b></a><br />
	<span id="dgen" class="nov">
	<br />
	<?php
	//////////////////////--DIRECCION--//////////////////////////////////////////////////////////////////////////////////////
	$consubic=mysql_query("select sCalle,sNumero,sColonia,nCP,sTelefono,sEmail from tescuelas where sClaveEscuela like '$clave'");
	$ubicacion=mysql_fetch_array($consubic);
	?>
	<form name="fordir" method="post" action="guardarCambios.php" >
    <table><tr>
		<input type="hidden" name="formag" value="fdir" />
		<input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
        <td><b>Calle:</b><input type="text" name="calle" id="calle" value='<?php echo $ubicacion["sCalle"]; ?>' />
  
		</td>
        <td>  
        <b>No.:</b><input type="text" name="numero" id="numero" value='<?php echo $ubicacion['sNumero']; ?>' size="7" />
  
  		</td>
        <td>
        <b>Colonia:</b><input type="text" name="colonia" id="colonia" value="<?php echo $ubicacion['sColonia']; ?>" />

        </td>
        <td>
        <strong>C.P.</strong><input type='text' name='cp' id="cp" value='<?php echo $ubicacion['nCP']; ?>' size="6"/>
        <!-- <validanguage target="cp" mode="allow" expression="numeric -()" required="true" maxlength="5" errorMsg="Campo CP vacío"> -->
          </td></tr>
          <tr>
          <td colspan="2">
        <strong>Tel&eacute;fono:</strong><input type='text' name='tel' id="tel"  value='<?php echo $ubicacion['sTelefono']; ?>' />
	<!-- <validanguage target="tel" mode="allow" onkeyup="validanguage.format('(xxx)x-xx-xx-xx', '-() ', '.')" expression="numeric -()" required="true" maxlength="15" errorMsg="Campo Tel vacío"> -->
         </td>
         <td colspan="2">
        <strong>Correo electr&oacute;nico:</strong><input type='text' name='email' id="email" value='<?php echo $ubicacion['sEmail']; ?>' /><br />
        </td></tr>
        <tr><td colspan="4"><b id="errorDom" style="color:#FF0000"></b></td></tr>
        </table>
        <input type='submit' value=' Guardar ' style='float:right' onclick="return validarDir()" /><br />
	</form>
	</span>
</div>
<!--//**************************ALUMNOS*****************************************************************-->
	<div style='border:2px solid #777; padding:10px; margin:5px; background-color:#DDDDDD'>
	<a href="#" onclick="mostrarocultar('almnos')" ><b>Alumnos</b></a>
	
	<span id="almnos" class="nov">
	<br /><br />
	<?php
	 $consdifcic=mysql_query("select idAlumnos,sClaveEscuelaAl,sCicloAl from tAlumnos where sClaveEscuelaAl like '$clave' order by sCicloAl desc");
	if($difciclos=mysql_fetch_array($consdifcic)){
        do{
            $consal=mysql_query("select nAlumnos,nGrupos,nGrado from tNum_alum na 
                                 where idNumAlum='".$difciclos['idAlumnos']."' order by nGrado asc",$link);
            if($grupos = mysql_fetch_array($consal)){
                echo "<table style='background-color:#BBF; border:1px solid #555; padding:1px;'>";
                echo "<tr><th colspan='2' bgcolor='#BBBBCC'>Numero de alumnos y de grupos por grado escolar</th>";
                echo "<th bgcolor='#BBBBFF'>Ciclo: ".$arciclos[$difciclos['sCicloAl']]."</th></tr>
                    <tr><th>Grado</th><th>No. Grupos</th><th>No. Alumnos</th></tr>";
                do{
                    echo "<tr align='center' bgcolor='#DDDDFF'><td>".$grupos["nGrado"]."o</td><td>".$grupos["nGrupos"]."</td><td>".$grupos["nAlumnos"]."</td></tr>";
                }while ($grupos = mysql_fetch_array($consal));
                    echo "</table>";
            }
         }while($difciclos=mysql_fetch_array($consdifcic));
    }else{
        echo "<strong style='color:#FF0000'>No hay datos almacenados</strong>";
    }
	?><br />
	<form name="foralum" method="post" action="guardarCambios.php" style="border:2px ridge #aaa">
		<input type="hidden" name="formag" value="fal" />
		<input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
        <input type="hidden" name="niv" value="<?php $esc['nNivel'] ?>" />
        <table><tr><th colspan="7" >N&uacute;mero de alumnos y de grupos por grado escolar:</th></tr>
			<tr><th>Grado:</th><th>1o</th><th>2o</th><th>3o</th> <?php if($esc['nNivel']==2){ ?><th>4o</th><th>5o</th><th>6o</th> <?php } ?></tr>
			<tr>
			<td align="right">Num. de grupos</td>
			<td><input type="text" id="g[1]" name="g[1]" size="2" />
            <!-- <validanguage target="g[1]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo vacío"> -->
            </td>
            <td><input type="text" id="g[2]" name="g[2]" size="2" />
            <!-- <validanguage target="g[2]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo vacío"> -->
            </td>
			<td><input type="text" id="g[3]" name="g[3]" size="2" />
            <!-- <validanguage target="g[3]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.4 vacío"> -->
            </td>
            <?php if($esc['nNivel']==2){ ?>
            <td><input type="text" id="g[4]" name="g[4]" size="2" />
            <!-- <validanguage target="g[4]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.4 vacío"> -->
            </td>
			<td><input type="text" id="g[5]" name="g[5]" size="2" />
            <!-- <validanguage target="g[5]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.4 vacío"> -->
            </td>
            <td><input type="text" id="g[6]" name="g[6]" size="2" />
            <!-- <validanguage target="g[6]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.4 vacío"> -->
            </td>
             <?php } ?>
			<td><b style="color:#FF0000; font-weight:bold;" id="errorg" ></b></td><td>
	Ciclo escolar:
		<select name="cicloal">
<?php
	do{
		echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
	}while($ciclo=mysql_fetch_array($cocic));
?>
		</select></td>
			</tr>
				<td align="right">Num. de alumnos</td>
				<td><input type="text" name="a[1]" id="a[1]" size="2" />
                 <!-- <validanguage target="a[1]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo vacío"> -->
                 </td><td><input type="text" name="a[2]" id="a[2]" size="2" /> <!-- <validanguage target="a[2]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.2 vacío"> --></td>
				<td><input type="text" name="a[3]" id="a[3]" size="2" />
                 <!-- <validanguage target="a[3]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.3 vacío"> --></td>
            <?php if($esc['nNivel']==2){ ?>
                <td><input type="text" name="a[4]" id="a[4]" size="2" /> <!-- <validanguage target="a[4]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.4 vacío"> --></td>
				<td><input type="text" name="a[5]" id="a[5]" size="2" /> <!-- <validanguage target="a[5]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.5 vacío"> --></td><td><input type="text" name="a[6]" id="a[6]" size="2" /> <!-- <validanguage target="a[6]" mode="allow" expression="numeric -()" required="true" maxlength="4" errorMsg="Campo No.6 vacío"> --></td>
            <?php } ?>
			</tr>
</table>
	<input type='submit' value=' Actualizar ' style='float:right' onclick="return checaal()" /><br />
	<br />
	<strong id="erroral" class="error"></strong>
</form>
</span>
	</div>
<!--//*********************************/GUARDAR ARCHIVO/***********************************************************//-->
	<div style='border:2px solid #777; padding:10px; margin:5px; background-color:#DDDDDD'>
	<a href="#" onclick="mostrarocultar('subpdf')" ><b>Material entregado</b></a><br />
	<span id="subpdf" class="nov">
	<br />
	<form name="formmat" action="guardarCambios.php" method="post" enctype="multipart/form-data" >
	<input type="hidden" name="formag" value="sbpdf" />
	<input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
		Seleccione archivo: <input type="file" name="archivo" id="ar" /><br />
		<input type='submit' value='Guardar archivo' id="ar" style='float:right' />
        <!-- <validanguage target="ar" required="true" errorMsg="<b style='color:#F00'>No se ha seleccionado archivo</b>"> -->
	</form>
    <?php if(isset($_GET['fileup']) and $_GET['fileup']==1)
			echo "<b style='color:#0A0'><script>alert('Archivo cargado correctamente');</script></b>"; ?>
	</span>
	</div>
<!--//********************************/APOYOS EOCNOMIMOCOS*********************************************************************//-->	
	<div style='border:2px solid #777; padding:10px; margin:5px; background-color:#DDDDDD'>
	<a href="#" onclick="mostrarocultar('apyecn')" ><b>Apoyos Econ&oacute;micos</b></a>
	<span id="apyecn" class="nov">
	<form name="formpers" method="post" action="guardarCambios.php" >
	<input type="hidden" name="formag" value="fper" />
		
			<br />
		<?php   ///////DIRECTOR////
			echo "<input type='hidden' name='clavesc' value='$clave' />";
			$consdir=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                    from trecursos_humanos rh,trecursos_hum_ciclo rhe 
                    where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc like '$clave' and rh.nPuesto=2 and rhe.nEstado=1",$link);
			if($direc=mysql_fetch_array($consdir)){
			echo "<strong>Director:&nbsp;</strong><br /><strong style='color:#AA0000'>"
                .$direc["sNombreRH"]."&nbsp;".$direc["sApellidoPaternoRH"]."&nbsp;".$direc["sApellidoMaternoRH"]."</strong>";
			?>
			<table style="background-color:#F0F0F0; border:1px solid #888;">
				<tr bgcolor="#BFBFBF"><th>Ciclo escolar</th>
				<th>Periodo</th>
				<th>Bruto Mensual</th>
				<th>ISR Mensual</th>
				<th>Neto Mensual</th>
				<th>Neto Periodo</th><th></th>
			</tr>
      <?php
      $conapdir=mysql_query("select idApoyosEcon,nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal 
                            from tapoyos_economicos where sRFCae like '".$direc['sRFC']."'");
   		if($apoydir=mysql_fetch_array($conapdir)){
			do{
				echo "<tr bgcolor='#DADADA' align='center'>";
				echo "<td><input type='text' value='".$arciclos[$apoydir['nCiclo']]."' disabled='disabled' size='9'/></td>";
				echo "<td><input type='text' value='".$armeses[$apoydir['nFechaInicio']]." - ".$armeses[$apoydir['nFechaFinal']]."'
							 disabled='disabled' /></td>";
				echo "<td><input type='text' value='".$apoydir['nBrutoMensual']."' disabled='disabled' size='6'/></td>";
				echo "<td><input type='text' value='".$apoydir['nIsrMensual']."' disabled='disabled' size='6'/></td>";
                echo "<td><input type='text' value='".($apoydir['nBrutoMensual']-$apoydir['nIsrMensual'])."' disabled='disabled' size='6'/></td>";
				echo "<td><input type='text' value='"
                        .($apoydir['nBrutoMensual']-$apoydir['nIsrMensual'])*($apoydir['nFechaFinal']-$apoydir['nFechaInicio']+1)."'
						 disabled='disabled' size='6'/></td>";
				echo "<td><a href='guardarCambios.php?idap=".$apoydir['idApoyosEcon']."&clavesc=$clave&formag=delapec' title='eliminar' >
                        <img src='imagen/cerrar.png' /></a></td></tr>";
			}while($apoydir=mysql_fetch_array($conapdir));
		}
		echo "<tr bgcolor='#D0D0D0' align='center'>";
				echo "<input type='hidden' name='rfc[0]' value='".$direc['sRFC']."' />";
				echo "<input type='hidden' name='exdir' value='si' />"; //campo para indicar si hay director o no dentro de la escuela
        ?>
				<td> 
                     <select name ="ciclo[0]">
                     <?php
                        $cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
                        $ciclo=mysql_fetch_array($cocic);
                        
                        do{
                            echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
                        }while($ciclo=mysql_fetch_array($cocic));
                     ?>
                    </select> 
                </td>
				<td>Mes inicio:
                    <select name="mesInic[0]" id="mesInic[0]">
                        <option value="1">Agosto</option><option value="2">Septiembre</option>
                        <option value="3">Octubre</option><option value="4">Noviembre</option>
                        <option value="5">Diciembre</option><option value="6">Enero</option>
                        <option value="7">Febrero</option><option value="8">Marzo</option>
                        <option value="9">Abril</option><option value="10">Mayo</option>
                        <option value="11">Junio</option><option value="12">Julio</option>
                    </select>
                    Mes final:
                    <select name="mesFin[0]" id="mesFin[0]">
                        <option value="1">Agosto</option><option value="2">Septiembre</option>
                        <option value="3">Octubre</option><option value="4">Noviembre</option>
                        <option value="5">Diciembre</option><option value="6">Enero</option>
                        <option value="7">Febrero</option><option value="8">Marzo</option>
                        <option value="9">Abril</option><option value="10">Mayo</option>
                        <option value="11">Junio</option><option value="12">Julio</option>
                    </select>
                </td>
				<td><input type='text' size='6' name='bm[0]' id="bm[0]" />
                </td>
				<td><input type='text' size='6' name='isrm[0]' id="isrm[0]" />
                </td>
				<td><input type='text' size='6' name='netm[0]' id="c" disabled='disabled' />
                </td>
				<td><input type='text' size='6' name='netp[0]' id="d" disabled="disabled"/>
                </td>
				</tr>
		</table><br />
        <?php
		}else{
			echo "<b style='color:#CC0000'>No hay director dado de alta</b><br /><br />";
		}
  		//////////////////DOCENTES//////////////////////////////////////
			$conspers=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                    from trecursos_humanos rh,trecursos_hum_ciclo rhe 
                    where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc like '$clave' and rh.nPuesto=1 and rhe.nEstado=1",$link);
			$numdyd=mysql_num_rows($conspers);
			echo "<input type='hidden' name='numdoc' value='$numdyd' />";
			if ($pers = mysql_fetch_array($conspers)){
				echo "<div id='docentes'><strong>Docentes:</strong><br /><br />";
				$contdet=0;
				do {
					$contdet++;
					echo $contdet.".- <strong style='color:#990000'>".$pers["sNombreRH"]."&nbsp;"
					.$pers["sApellidoPaternoRH"]."&nbsp;".$pers["sApellidoMaternoRH"]."</strong>";
	   ?>
    	<table style="background-color:#F0F0F0; border:1px solid #888;">
				<tr bgcolor="#BFBFBF"><th>Ciclo escolar</th>
				<th>Periodo</th>
				<th>Bruto Mensual</th>
				<th>ISR Mensual</th>
				<th>Neto Mensual</th>
				<th>Neto Periodo</th><th></th>
			</tr>
      <?php
      $conapdoc=mysql_query("select idApoyosEcon,nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal 
                            from tapoyos_economicos where sRFCae like '".$pers['sRFC']."'");
   		if($apoydoc=mysql_fetch_array($conapdoc)){
			do{
				echo "<tr bgcolor='#DADADA' align='center'>";
				echo "<td><input type='text' value='".$arciclos[$apoydoc['nCiclo']]."' disabled='disabled' size='9'/></td>";
				echo "<td><input type='text' value='".$armeses[$apoydoc['nFechaInicio']]." - ".$armeses[$apoydoc['nFechaFinal']]."'
							 disabled='disabled' /></td>";
				echo "<td><input type='text' value='".$apoydoc['nBrutoMensual']."' disabled='disabled' size='6'/></td>";
				echo "<td><input type='text' value='".$apoydoc['nIsrMensual']."' disabled='disabled' size='6'/></td>";
                echo "<td><input type='text' value='".($apoydoc['nBrutoMensual']-$apoydoc['nIsrMensual'])."' disabled='disabled' size='6'/></td>";
				echo "<td><input type='text' value='"
                        .($apoydoc['nBrutoMensual']-$apoydoc['nIsrMensual'])*($apoydoc['nFechaFinal']-$apoydoc['nFechaInicio']+1)."'
							 disabled='disabled' size='6'/></td>";
				echo "<td><a href='guardarCambios.php?idap=".$apoydoc['idApoyosEcon']."&clavesc=$clave&formag=delapec' title='eliminar' >
                        <img src='imagen/cerrar.png' /></a></td></tr>";
			}while($apoydoc=mysql_fetch_array($conapdoc));
		}
		echo "<tr bgcolor='#D0D0D0' align='center'>";
				echo "<input type='hidden' name='rfc[$contdet]' value='".$pers['sRFC']."' />";
        ?>
				<td> 
                     <?php
                        echo "<select name ='ciclo[$contdet]'>";
                        $cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
                        $ciclo=mysql_fetch_array($cocic);
                        
                        do{
                            echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
                        }while($ciclo=mysql_fetch_array($cocic));
                        echo "</select>"
                     ?>
                   
                </td>
				<td>Mes inicio:
                    <select name="mesInic[<?php echo $contdet; ?>]" id="mesInic[<?php echo $contdet; ?>]">
                        <option value="1">Agosto</option><option value="2">Septiembre</option>
                        <option value="3">Octubre</option><option value="4">Noviembre</option>
                        <option value="5">Diciembre</option><option value="6">Enero</option>
                        <option value="7">Febrero</option><option value="8">Marzo</option>
                        <option value="9">Abril</option><option value="10">Mayo</option>
                        <option value="11">Junio</option><option value="12">Julio</option>
                    </select>
                    Mes final:
                    <select name="mesFin[<?php echo $contdet; ?>]" id="mesFin[<?php echo $contdet; ?>]">
                        <option value="1">Agosto</option><option value="2">Septiembre</option>
                        <option value="3">Octubre</option><option value="4">Noviembre</option>
                        <option value="5">Diciembre</option><option value="6">Enero</option>
                        <option value="7">Febrero</option><option value="8">Marzo</option>
                        <option value="9">Abril</option><option value="10">Mayo</option>
                        <option value="11">Junio</option><option value="12">Julio</option>
                    </select>
                </td>
                <?php
				echo "<td><input type='text' size='6' name='bm[$contdet]' id='bm[$contdet]' /></td>
                    <td><input type='text' size='6' name='isrm[$contdet]' id='isrm[$contdet]'/></td>
                    <td><input type='text' size='6' name='netm[$contdet]' disabled='disabled' /></td>
                    <td><input type='text' size='6' name='netp[$contdet]' disabled='disabled' /></td>";
                ?>
				</tr>
		</table><br />
    <?php
	} while ($pers = mysql_fetch_array($conspers));
		echo "</div><b id='errordoc' class='error'></b><br />
                <input type='submit' value='Guardar Apoyos Econ&oacute;micos' style='width:40%;font-size:15px' 
				onclick=\"return validaAE($contdet)\"/>
				</form>";		
	} else {
		echo "<b style='color:#bb0000'>No hay personal dado de alta</b>";
	}
	
	echo "<br /><hr /><br />";
	?>	
    	<form name="formesp" method="post" action="guardarCambios.php" >
		<input type="hidden" name="formag" value="fesp" />
    <?php		/////////////////////////////ESPECIALISTAS//////////////////////////////////////////////////////////////////////////////////////////////////	
			$consesp=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                    from trecursos_humanos rh,trecursos_hum_ciclo rhe 
                    where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc like '$clave' and rh.nPuesto=3 and rhe.nEstado=1",$link);
			$numesp=mysql_num_rows($consesp);
			if ($esp = mysql_fetch_array($consesp)){
				echo "<div id='espec'><strong>Especialistas</strong>";
				echo "<form name='foresp' method='post' action='guardarCambios.php'>";
				echo "<input type='hidden' name='numesp' value='$numesp' />";
				echo "<input type='hidden' name='formag' value='fesp' />";
				echo "<input type='hidden' name='clavesc' value='$clave' />";
				$contesp=0;
				do {
					echo "<p>".($contesp+1).".-<strong style='color:#bb0000'>".$esp["sNombreRH"]."&nbsp;"
					.$esp["sApellidoPaternoRH"]."&nbsp;".$esp["sApellidoMaternoRH"]."</strong>";
		        ?>
		<table style="background-color:#F0F0F0; border:1px solid #888;">
			<tr bgcolor='#adadad'><th>Ciclo escolar</th>
			<th>Periodo</th>
			<th>Bruto Mensual</th>
			<th>ISR Mensual</th>
			<th>Neto Mensual</th>
			<th>Neto Periodo</th><th></th>
			</tr>
    <?php
      $conape=mysql_query("select idApoyosEcon,nCiclo,nBrutoMensual,nIsrMensual,sRFCae,nFechaInicio,nFechaFinal 
                            from tapoyos_economicos where sRFCae like '".$esp['sRFC']."'");
   		if($apoye=mysql_fetch_array($conape)){
			do{
				echo "<tr bgcolor='#DADADA' align='center'>";
				echo "<td><input type='text' value='".$arciclos[$apoye['nCiclo']]."' disabled='disabled' size='9'/></td>";
				echo "<td><input type='text' value='".$armeses[$apoye['nFechaInicio']]." - ".$armeses[$apoye['nFechaFinal']]."' 
							disabled='disabled' /></td>";
				echo "<td><input type='text' value='".$apoye['nBrutoMensual']."' disabled='disabled' size='6'/></td>";
				echo "<td><input type='text' value='".$apoye['nIsrMensual']."' disabled='disabled' size='6'/></td>";
                echo "<td><input type='text' value='".($apoye['nBrutoMensual']-$apoye['nIsrMensual'])."' disabled='disabled' size='6'/></td>";
				echo "<td><input type='text' value='".($apoye['nBrutoMensual']-$apoye['nIsrMensual'])*
													  ($apoye['nFechaFinal']-$apoye['nFechaInicio']+1)."' disabled='disabled' size='6'/></td>";
				echo "<td><a href='guardarCambios.php?idap=".$apoye['idApoyosEcon']."&clavesc=$clave&formag=delapec' title='eliminar' >
                        <img src='imagen/cerrar.png' /></a></td></tr>";
			}while($apoye=mysql_fetch_array($conape));
		}
		echo "<tr bgcolor='#D0D0D0' align='center'>";
        
			echo "<td><select name ='cicloesp[$contesp]'>";
            $cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
            $ciclo=mysql_fetch_array($cocic);
                      
           do{
               echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
            }while($ciclo=mysql_fetch_array($cocic));
                echo "</select></td>";
                 ?>
                   
                </td>
				<td>Mes inicio:
                    <select name="mesInicesp[<?php echo $contesp; ?>]" id="mesInicesp[<?php echo $contesp; ?>]">
                        <option value="1">Agosto</option><option value="2">Septiembre</option>
                        <option value="3">Octubre</option><option value="4">Noviembre</option>
                        <option value="5">Diciembre</option><option value="6">Enero</option>
                        <option value="7">Febrero</option><option value="8">Marzo</option>
                        <option value="9">Abril</option><option value="10">Mayo</option>
                        <option value="11">Junio</option><option value="12">Julio</option>
                    </select>
                    Mes final:
                    <select name="mesFinesp[<?php echo $contesp; ?>]" id="mesFinesp[<?php echo $contesp; ?>]">
                        <option value="1">Agosto</option><option value="2">Septiembre</option>
                        <option value="3">Octubre</option><option value="4">Noviembre</option>
                        <option value="5">Diciembre</option><option value="6">Enero</option>
                        <option value="7">Febrero</option><option value="8">Marzo</option>
                        <option value="9">Abril</option><option value="10">Mayo</option>
                        <option value="11">Junio</option><option value="12">Julio</option>
                    </select>
                </td>
                <?php
				echo "<input type='hidden' name='rfcesp[$contesp]' value='".$esp['sRFC']."' />";
				echo "<td><input type='text' size='6' name='bmesp[$contesp]' id='bmesp[$contesp]'/></td>";
				echo "<td><input type='text' size='6' name='isrmesp[$contesp]' id='isrmesp[$contesp]'/></td>";
				echo "<td><input type='text' size='6' name='netmesp[$contesp]' disabled='disabled' /></td>";
				echo "<td><input type='text' size='6' name='netpesp[$contesp]' disabled='disabled' /></td>";
				echo "</tr></table></p>";
				$contesp++;
			}while ($esp = mysql_fetch_array($consesp));
				echo "</div>";
			echo "<input type='submit' value='Guardar Apoyos Econ&oacute;micos de Especialistas' onclick='return validaAEesp($contesp)' style='width:40%;font-size:15px'/>";
			echo "<b id='erroresp' class='error'></b><br />";
			}else{
				echo "<br /><b style='color:#BB5555' >No hay especialistas en este centro de trabajo</b>";
			}
		?>
		</form>
	</span>
	</div>
    
    <!--|||||||||||CAPACITACIONES***********//////////////////////////////////////////////////////// -->
	<div style='border:2px solid #777; padding:10px; margin:5px; background-color:#dadada'>
	<a href="#" onclick="mostrarocultar('capac')" ><b>Capacitaciones</b></a>
	<span id="capac" class="nov">
    <br /><br />
    <?php
		$consCap=mysql_query("select cap.sCapacitacion,sFechaCap 
						from tCapacitaciones inner join tCapacitacion cap on idCapacitacion=nCapacitacion
						where sClaveEscuelaCap like '$clave'");
						
		if($capEsc=mysql_fetch_array($consCap)){
	?>
       	<table style="border:1px solid #333333;">
        	<tr bgcolor="#999999"><th>Capacitaci&oacute;nes ya realizadas</th><th>Fecha impartida</th>
    
	<?php
			do{
				$cont++;
				echo "<tr bgcolor='".$color[$cont%2]."'><td>$capEsc[0]</td><td>$capEsc[1]</td></tr>";
			}while($capEsc=mysql_fetch_array($consCap));
			echo "</table>";
		}else{
			echo "<b style='color:#AA0000'>No hay capacitaciones en esta escuela</b>";
		}
	?>
    	<form name="forcap" method="post" action="guardarCambios.php" >
        <input type="hidden" name="formag" value="fcap" />
        <input type="hidden" name="tcap" value="1"  />
        <input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
			<br /><b>Agregar capacitaci&oacute;n:</b>
            <select name="capacitacion">
            <?php
				$conscap=mysql_query("select * from tCapacitacion");
				while($cap=mysql_fetch_array($conscap)){
					echo "<option value='".$cap['idCapacitacion']."'>".$cap['sCapacitacion']."</option>";
				}				
			?>
            </select>
            <label for="fnacimiento">Fecha:
            </label>
			<input id="fnacimiento"  maxlength="20"    onchange="javascript:imprimeEdad()"  name="fechacap" type="text" 
            style="width:100px;" title="día, mes y año de su Fecha de Nacimiento" />
            <!-- <validanguage target="fnacimiento" required="true" errorMsg="<b style='color:#F00'>Campo FECHA vac&iacute;o</b>"> --> 
          <input type="submit" value="Añadir capacitaci&oacute;n a escuela" />
        	<br /><br />
         </form>
         <hr />
         <form method="post" name="forcap2" action="guardarCambios.php">
        	<b>S&iacute; la capacitaci&oacute;n NO aparece en la lista agrega una nueva:</b>
        	 <input type="hidden" name="formag" value="fcap" />
             <input type="hidden" name="tcap" value="2"  />
             <input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
            <input type="text" name="nuevaCap" id="nueva" size="80"  />
            <!-- <validanguage target="nueva" mode="allow" required="true" maxlength="60" minlength="10" errorMsg="Campo  vacío"> -->
        	<input type="submit" value="Agregar a capacitaciones" />
        </form>
	</span>
    
	</div>
    
<!--//*************************************************AÑADIR PERSONAL A ESCUELA **********************************************************//-->
	<div style='border:2px solid #777; padding:10px; margin:5px; background-color:#dadada'>
	<a href="#" onclick="mostrarocultar('agperyesp')" ><b>A&ntilde;adir Personal a Escuela</b></a>
	<span id="agperyesp" class="nov"><br /><br />
	<b>Agregar Docente o Director</b>
	<form name="foradyd" action="guardarCambios.php" method="post" >
	<input type="hidden" name="formag" value="fadyd" />
	<input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
<table style="border:1px solid #888; padding:5px"> 
	<tr><td align="right">RFC:</td><td><input type="text" name="rfc"   id="rfc" size="13" onkeyup="cambiarMay(this.id)"/>
    </td>
		<td align="right">Puesto:</td><td>
		<select name="pst">
			<option value="1">Docente</option>
			<option value="2">Director</option>
		</select>
		</td>
		<td align="right">Ciclo escolar:</td>
		<td><select name="ciclod">
<?php
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
	do{
		echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
	}while($ciclo=mysql_fetch_array($cocic));
?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">Nombre(s):</td><td><input type="text" name="nombres" id="nombres"/>
        <!-- <validanguage target="nombres" mode="allow" expression="alpha" required="true" maxlength="28" errorMsg="<b style='color:#F00'>Campo nombre vacío</b>"> -->
        </td>
		<td align="right">Ape. Paterno:</td><td><input type="text" name="appat" id="appat"/>
        <!-- <validanguage target="appat" mode="allow" expression="alpha" required="true" maxlength="28" errorMsg="<b style='color:#F00'>Campo ap paterno vacío</b>"> -->
        </td>
		<td align="right">Ape. Materno:</td><td><input type="text" name="apmat" id="apmat" />
        <!-- <validanguage target="apmat" mode="allow" expression="alpha" required="true" maxlength="28" errorMsg="<b style='color:#F00'>Campo ap materno vacío</b>"> -->
        </td>
	</tr>
	<tr>
    	<td align="right">Fecha de ingreso:</td><td><input type="text" name="fechaIngreso" id="fecha" />
        <!-- <validanguage target="fecha" mode="allow" expression="numeric -()" required="true" maxlength="13" errorMsg="<b style='color:#F00'>Campo fecha vacío</b>"> -->
        </td>
        <td align="right">Fecha de nacimiento:</td><td><input type="text" name="fechaNac" id="fecha1"/>
        <!-- <validanguage target="fecha1" mode="allow" expression="numeric -()" required="true" maxlength="13" errorMsg="<b style='color:#F00'>Campo fecha vacío</b>"> -->
        </td>
		<td align="right">Doble Plaza:</td><td><input type="radio" name="plaza" value="1" />si
		<input type="radio" name="plaza" value="0" checked="checked" />no
		</td>
	</tr>
    <tr><td align="right">Nivel de estudios:</td><td>
    	<select name="nivEstudio">
        <?php
			$consNivEst=mysql_query("select * from tNivel_estudios");
			$NivEst=mysql_fetch_array($consNivEst);
			do{
				echo "<option value='".$NivEst[0]."'>".$NivEst[1]."</option>";
			}while($NivEst=mysql_fetch_array($consNivEst));
		?>
        </select>
    </td>
	<tr><td><input type="submit" value=" Agregar Personal "  /><!--onclick="return checaadd()" /--></td></tr>
</table>
<strong id="erroradoc" class="error"></strong>
<br />
</form>
<br />
<b>Agregar Especialista</b>
<form name="foraesp" action="guardarCambios.php" method="post" >
	<input type="hidden" name="formag" value="faesp" />
	<input type="hidden" name="clavesc" value="<?php echo $clave; ?>" />
<table style="border:1px solid #888; padding:5px;">
	<tr>
		<td align="right">RFC:</td><td><input type="text" name="rfcesp" size="13" id="rfce" onkeyup="cambiarMay(this.id)" />
         <!-- <validanguage target="rfce" mode="allow" expression="alpha" required="true" maxlength="8" errorMsg="<b style='color:#F00'>Campo Calle vacío</b>"> -->
        </td>
		<td align="right">Ciclo escolar:</td>
		<td><select name="cicloesp">
<?php
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);
	do{
		echo "<option value='".$ciclo[0]."'>".$arciclos[$ciclo[0]]."</option>";
	}while($ciclo=mysql_fetch_array($cocic));
?>
		</select>
		</td>
	</tr>
	<tr>
		<td align="right">Nombre(s):</td><td><input type="text" name="nombesp"id="nom" />
         <!-- <validanguage target="nom" mode="allow" expression="alpha" required="true" maxlength="18" errorMsg="<b style='color:#F00'>Campo nombre vacío</b>"> -->
        </td>
		<td align="right">Ap. Paterno:</td><td><input type="text" name="appatesp" id="pat" />
         <!-- <validanguage target="pat" mode="allow" required="true" showAlert="true" maxlength="18" errorMsg="<b style='color:#F00'>Campo ap paterno vacío</b>"> -->
        </td>
		<td align="right">Ap. Materno:</td><td><input type="text" name="apmatesp" id="mat" />
         <!-- <validanguage target="mat" mode="allow" expression="alpha" required="true" maxlength="18" errorMsg="<b style='color:#F00'>Campo ap materno vacío</b>"> -->
        </td>
	</tr>
	<tr>
		<td align="right">Especialidad:</td><td colspan="3" >
			<select name="especialidad">
				<option value="0">   [-Seleccionar una especialidad-] </option>
				<option value="1">Fortalecimiento del aprendizaje sobre contenidos curriculares</option>
				<option value="2">Uso did&aacute;ctico de las Tecnologias de la Inform. y Comunic.</option>
				<option value="3">Aprendizaje de una lengua adicional</option>
				<option value="4">Arte y Cultura</option>
				<option value="5">Alimentaciï¿½n saludable</option>
				<option value="6">Recreaci&oacute;n y Desarrollo F&iacute;sico</option>
		</select></td>
        
		<td align="right">Hora trabajo:</td><td><input type="text" name="horesp" size="15" value="3 Horas diarias"/></td>
        
	</tr>
	<tr>
    	<td align="right">Fecha de ingreso:</td><td><input type="text" name="fechaIngresoEsp" id="fecha" />
        <!-- <validanguage target="fecha" mode="allow" expression="numeric -()" required="true" maxlength="13" errorMsg="<b style='color:#F00'>Campo fecha vacío</b>"> -->
        </td>
        <td align="right">Fecha de nacimiento:</td><td><input type="text" name="fechaNacEsp" id="fnacimientoesp" />
        <!-- <validanguage target="fnacimientoesp" mode="allow" expression="numeric -()" required="true" maxlength="13" errorMsg="<b style='color:#F00'>Campo fecha vacío</b>"> -->
        </td>
       
        
       
		<td><input type="submit" value="Agregar Especialista" onclick="return checaae()"/></td>
	</tr>
</table>
<br /><br />
<strong id="erroraesp" class="error"></strong>
</form>
	</span>
	</div>
    
<!--//******************************BAJA DE PERSONAL/**********************************************-->	

<div style='border:2px solid #777; padding:10px; margin:5px; background-color:#dddddd'>
	<a href="#" onclick="mostrarocultar('bajpers')" ><b>Baja de Personal</b></a>
	<span id="bajpers" class="nov">
	<br />
<?php   ///////DIRECTOR////
$cocic=mysql_query("select distinct(nCiclo) from tescuelas_ciclo order by nCiclo desc");
$ciclo=mysql_fetch_array($cocic);

	$consdir=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
				from tRecursos_humanos rh,trecursos_hum_ciclo rhe where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc='$clave' and 
				rh.nPuesto=2 and rhe.nEstado=1",$link);
	if($direc=mysql_fetch_array($consdir)){
		echo "<strong>Director:&nbsp;</strong><br /><strong style='color:#AA0000'>"
		.$direc["sNombreRH"]."&nbsp;".$direc["sApellidoPaternoRH"]."&nbsp;".$direc["sApellidoMaternoRH"]."</strong>&nbsp;&nbsp;";
		echo "<a onClick=\"return eliminar('".$direc['sRFC']."','$clave','".$ciclo[0]."')\"  title='Dar de baja' class='btnbaja'>
				Dar de baja</a><br /><br />";
	}else{
		echo "No hay director<br /><br />";
	}
  	//////////////////DOCENTES//////////////////////////////////////
	$conspers=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                            from tRecursos_humanos rh,trecursos_hum_ciclo rhe   
                            where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc='$clave' and rh.nPuesto=1 and rhe.nEstado=1",$link);
		
	if ($pers = mysql_fetch_array($conspers)){
		echo "<div id='docentes'><strong>Docentes:</strong><br />";
		echo "<table>";
		$contdet=0;
		do {
			$contdet++;
			echo "<tr><td>$contdet.- <strong style='color:#990000'>"
			.$pers["sNombreRH"]."&nbsp;".$pers["sApellidoPaternoRH"]."&nbsp;".$pers["sApellidoMaternoRH"]."</strong>&nbsp;&nbsp;</td>";
			echo "<td>&nbsp;&nbsp;<a onClick=\"return eliminar('".$pers['sRFC']."','$clave','".$ciclo[0]."')\" 
				 title='Dar de baja' class='btnbaja'>Dar de baja</a></td></tr>";
		}while ($pers = mysql_fetch_array($conspers));
		echo "</table></div>";
	} else {
		echo "<b style='color:#bb0000'>No hay personal</b>";
	}
	/////////////////////////////ESPECIALISTAS//////////////////////////////////////////////////////////////////////////////////////////////////	
	$consesp=mysql_query("select rh.sRFC,rh.sNombreRH,rh.sApellidoPaternoRH,rh.sApellidoMaternoRH 
                            from tRecursos_humanos rh,trecursos_hum_ciclo rhe   
                            where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc='$clave' and rh.nPuesto=3 and rhe.nEstado=1",$link);
	$numesp=mysql_num_rows($consesp);
	if ($esp = mysql_fetch_array($consesp)){
		echo "<br /><div id='espec'><strong>Especialistas</strong><br /><br />";
		$contesp=0;
		do {
			echo ($contesp+1).".-<strong style='color:#bb0000'>"
			.$esp["sNombreRH"]."&nbsp;".$esp["sApellidoPaternoRH"]."&nbsp;".$esp["sApellidoMaternoRH"]."</strong>&nbsp;";
			echo "&nbsp;<a onClick=\"return eliminar('".$esp['sRFC']."','$clave','".$ciclo[0]."')\" 
					title='Dar de baja' class='btnbaja' >Dar de baja</a><br /><br />";
			$contesp++;
		}while ($esp = mysql_fetch_array($consesp));
		echo "</div>";
	}else{
		echo "<br /><b style='color:#BB5555' >No hay especialistas</b>";
	}
?>
	</span>
	</div>
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