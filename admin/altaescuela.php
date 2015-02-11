<?php
echo "<div style='display:none;'>";
session_start();
if($_SESSION['segu']!=1){
print "<meta http-equiv=Refresh content='0 ; url= index.php'>";
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
    <script type="text/javascript" src="js/validarAlta.js"></script>
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
            <li><a href="admUsr/usuarios.php" >Admin. Usuarios</a></li>
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
    &nbsp;<h3>Dar de alta una escuela</h3>
    <form method="post" action="altaescuela.php" style="border:1px solid #AAA; width:80%; margin-left:20px; padding:10px;">
    &nbsp;Primeramente ingrese la clave del centro de trabajo (10 d&iacute;gitos):
    <input type="text" name="bclave" size="12" />
    <input type="submit" value=" buscar " />
    <br />
    <a href="alta_escya.php" style="font-size:14px">O dar de alta escuela ya almacenada</a>
    </form>
    <?php
	include("seg/conec.php");
        $link=Conectarse();
    if(isset($_POST['bclave'])){
            $bclave=$_POST['bclave'];
     
		$consExistEsc=mysql_query("select * from tescuelas where sClaveEscuela like '$bclave'",$link);   
    	if($existEsc=mysql_fetch_array($consExistEsc)){
			echo "<div style='font-size:12px; border:1px solid #55A;padding:15px;background-color:#D0D0FF;color:#005'>";
			echo "La escuela con clave <b>$bclave</b> ya se encuentra almacenada dentro del sistema";
				if($existEsc['nAfiliada']==0){
					echo " pero <b>NO</b> est&aacute; dada del alta <br />(<b><a href='alta_escya.php'>Dar de alta escuela ya almacenada</a>)</b>";
				}	
			echo "</div>";
		}else{		
		
        include("conec_bde.php");
        $coonex=ConectarseBDE();
        
        $consescbde=mysql_query("select * from escuelas_nivel_basico where CCT like '$bclave'",$coonex);
        if($escnb=mysql_fetch_array($consescbde)){
     
            echo "<form name='foralta' method='post' action='darDeAlta.php'>
				&nbsp;Rellene los campos vac&iacute;os:
				<table style='font-size:12px;border:1px solid #AAA;margin-left:30px;background-color:#888'>
                <tr bgcolor='#BBBBBB'><th>CCT</th><th>Nombre CCT</th><th colspan='3'>Domicilio</th></tr>";
            do{
                echo "<tr bgcolor='#DFDFDF'><td><input type='text' name='cct' value='".$escnb['CCT']."' size='11' /></td>
					<td><textarea name='nombCT'>".$escnb['nom_ct']."</textarea></td>
					<td colspan='3'>
					<span style='color:#444; font-size:10px'>".$escnb['dom_ct']."</span><hr />
					Calle:<br /><textarea name='calle'></textarea>
					N&uacute;mero:<input type='text' name='num' size='6' />
					C.P:<input type='text' name='cp' size='6' /><br />
					Colonia:<input type='text' name='col' /></td></tr>
					<tr bgcolor='#BBBBBB'><th>Municipio</th><th>Localidad</th><th>Tel&eacute;fono</th><th>Zona</th><th>Sector</th></tr>
					<tr bgcolor='#DFDFDF'>
					<td><textarea name='mun'>".$escnb['nom_mun']."</textarea></td>
					<td><textarea name='loc' >".$escnb['nom_loc']."</textarea></td>
					<td><input type='text' name='tel' value='".$escnb['telefono']."' /></td>
					<td><input type='text' name='zona' value='".$escnb['zona']."' size='3' /></td>
					<td><input type='text' name='sector' value='".$escnb['sector']."' size='3'/></td>
                    </tr>
					<tr bgcolor='#BBBBBB'>
					<th colspan='3'>Nivel y Modalidad</th></tr>
					<tr bgcolor='#DFDFDF'>
					<td colspan='3'><span style='color:#444; font-size:11px'>".$escnb['nivel']."<span><hr />";
                echo "Nivel:<select name='nivel'>
							<option value='0'>[-Escoger-]</option>
                            <option value='1'>Primaria</option>
                            <option value='2'>Preescolar</option>
                            <option value='3'>Especial</option>
                        </select>
						&nbsp;&nbsp;
                        Modalidad:<select name='mod'>
						<option value='0'>[-Escoger-]</option>
                            <option value='1'>Federalizada</option>
                            <option value='2'>Estatal</option>
                            <option value='3'>Ind&iacute;gena</option>
                        </select>
                    </td></tr>";
            }while($escnb=mysql_fetch_array($consescbde));
                echo "<tr bgcolor='#CCCCCC'><td colspan='5' align='center'>
				<input type='submit' value='Dar de alta' style='font-size:14px;width:40%' onclick='return validarAlta()'/>
				</td></tr></table><br />
                &nbsp;&nbsp;<b id='errorAlta' style='color:#F00'></b>
                     </form>";
        }else{
            echo "<b style='padding:5px;margin:50px;color:#F00;font-size:16px'>Clave NO encontrada</b>
				<br /><br />
				&nbsp;<button onclick=\"javascript:location.href='altasescuelas.php'\" style='font-size:15px; width:30%'>
				Agregar escuela manualmente</button>";
        }
    } 
	}
    
    ?>
    <br /><br />
    <div id="Pie"><div id="ContenedorPie"><img src="imagen/PiePagina.png" align="right" />
 <div >Programa  Escuelas  de  Tiempo  Completo  Veracruz<br />
     Subsecretar&iacute;a de Educaci&oacute;n B&aacute;sica<br />
	Secretar&iacute;a de Educaci&oacute;n &copy; 2010 - Todos los derechos reservados<br />
	Tel +52(228) 841 7700 ext 7477 Km. 4.5 Carretera Federal Xalapa-Veracruz<br />
    Col SAHOP, C.P. 91190, Xalapa Veracruz, M&Eacute;XICO.</div></div>
    </div>
</div>
</body>
</html>
