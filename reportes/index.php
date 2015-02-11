<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="css/sty.css" rel="stylesheet" type="text/css" />
    <link href='imagenes/sev.png' rel='shortcut icon'/>
    <title>Reportes | Escuelas de Tiempo Completo</title>
    <style>
	.pdf{
		color:#FFF;
		background-color:#DD0000;
		border:1px solid #000;
		text-decoration:none;
		padding:4px;
		font-size:15px;
		float:right;
	}
	.pdf:hover{
		background-color:#F00;	
	}
	</style>
</head>
<body>
<div id="Contenido">
    <div id="Cabecera">
	<div id="nometc" style="font-family:Verdana;font-size:10pt;position:absolute;top:30px;margin-left:160px;">
		<h1>Reportes: Escuelas de Tiempo Completo</h1>
	</div>
    </div>
<div id="ContenedorMenuNavegacion">
    	<ul id="MenuNavegacion">
            <li><a href="index.php?r=b">B&aacute;sicos</a></li>
            <li><a href="index.php?r=a">Avanzados</a></li>
            <li><a href="../index.php">Inicio</a></li>
        </ul>
            <ul id="MenuUbicacion">
		<li><script language="javascript">
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
    if(!isset($_GET['r']))
        $r="n";
    else
        $r=$_GET['r'];
    
    if(!isset($_GET['tipo'])) $tipo="";
    
    else $tipo=$_GET['tipo'];
    
     if(!isset($_GET['rn'])) $rn="";
    
    else $rn=$_GET['rn'];
    
    if($r=="b"){
?>
    <h2>Reportes B&aacute;sicos</h2>
    <ol class="menuRep">
        <li><a href="index.php?tipo=1" >Maestros y directores del ciclo actual</a></li>
        <li><a href="index.php?tipo=2" >Escuelas del ciclo actual</a></li>
        <li>Escuelas por modalidad:
            <ul>
                <li><a href="index.php?tipo=3_1">Federalizadas</a></li>
                <li><a href="index.php?tipo=3_2">Estatales</a></li>
                <li><a href="index.php?tipo=3_3">Ind&iacute;genas</a></li>
            </ul>
        </li>
        <li>Escuelas por nivel:
            <ul>
                <li><a href="index.php?tipo=4_1">Primarias</a></li>
                <li><a href="index.php?tipo=4_2">Preescolares</a></li>
                <li><a href="index.php?tipo=4_3">Especiales</a></li>
            </ul>
        </li>
        <li>Personal del ciclo actual:
            <ul>
                <li><a href="index.php?tipo=5_1">Directores</a></li>
                <li><a href="index.php?tipo=5_2">Docentes</a></li>
                <li><a href="index.php?tipo=5_3">Especialistas</a></li>
            </ul>
        </li>
        <li>Apoyos econ&oacute;micos:
             <ul>
                <li><a href="index.php?tipo=6_1">Directores</a></li>
                <li><a href="index.php?tipo=6_2">Docentes</a></li>
                <li><a href="index.php?tipo=6_3">Especialistas</a></li>
            </ul>
        </li>
            <li>Escuelas por zona o sector:
                <ul>
                <li><a href="index.php?tipo=7_1">Zona</a></li>
                <li><a href="index.php?tipo=7_2">Sector</a></li>
            </ul>
        </li>
        <li><a href="index.php?tipo=8" >Escuelas con mayor antig&uuml;edad</a></li>
        <li><a href="index.php?tipo=9" >Escuelas dadas de baja</a></li>
        <li><a href="index.php?tipo=10" >Personal con doble plaza</a></li>
        <li><a href="index.php?tipo=11" >Escuelas con mayor cantidad de alumnos</a></li>
        <li><a href="index.php?tipo=12" >Escuelas que ya recibieron capacitaci&oacute;n</a></li>
        <li><a href="index.php?tipo=13" >Tel&eacute;fonos y correo electr&oacute;nicos</a></li>
    </ol>
        <?php
    }elseif($r=="a"){
?>
    <h2>Reportes Avanzados</h2>
    <ol class="menuRep">
        <li>Especialistas por &aacute;rea de trabajo
            <ul>
                <li><a href="index.php?rn=1_1">Fortalecimineto del aprendizaje</a></li>
                <li><a href="index.php?rn=1_2">Uso did&aacute;cticos de las TIC's</a></li>
                <li><a href="index.php?rn=1_3">Lengua Adicional</a></li>
                <li><a href="index.php?rn=1_4">Arte y Cultura</a></li>
                <li><a href="index.php?rn=1_5">Alimentaci&oacute;n Saludable</a></li>
                <li><a href="index.php?rn=1_6">Recreaci&oacute;n y desarrollo f&iacute;sico</a></li>
            </ul>
        </li>
        <li><a href="index.php?rn=2" >Escuelas sin especialistas</a></li>
        
        <li>Personal que NO ha recibido apoyos econ&oacute;micos
            <ul>
                <li><a href="index.php?rn=3_1">Directores</a></li>
                <li><a href="index.php?rn=3_2">Docentes</a></li>
                <li><a href="index.php?rn=3_3">Especialistas</a></li>
            </ul>
        </li>
        <li>Personal que ya recibi&oacute; apoyos econ&oacute;micos
            <ul>
                <li><a href="index.php?rn=4_1">Directores</a></li>
                <li><a href="index.php?rn=4_2">Docentes</a></li>
                <li><a href="index.php?rn=4_3">Especialistas</a></li>
            </ul>
        </li>
        <li><a href="index.php?rn=5" >Escuelas ordenadas al n&uacute;mero de personal que labora</a></li>
        <li>Personal ordenados de acuerdo al monto que reciben mensualmente por parte del programa
             <ul>
                <li><a href="index.php?rn=6_1">Directores</a></li>
                <li><a href="index.php?rn=6_2">Docentes</a></li>
                <li><a href="index.php?rn=6_3">Especialistas</a></li>
            </ul>
        </li>
        <li>Personal con mayor antig&uuml;edad dentro del programa
            <ul>
                <li><a href="index.php?rn=7_1">Directores</a></li>
                <li><a href="index.php?rn=7_2">Docentes</a></li>
                <li><a href="index.php?rn=7_3">Especialistas</a></li>
            </ul>
        </li>
        <li>Escuelas de otro ciclo escolar
            <ul>
                <li><a href="index.php?rn=8_1">2012-2013</a>
                    <ul>
                        <li><a href="index.php?rn=8_2">Federalizadas</a>
                            <ul>
                                <li><a href="index.php?rn=8_3">Primarias</a></li>
                                <li><a href="index.php?rn=8_4">Preescolares</a></li>
                                <li><a href="index.php?rn=8_5">Especiales</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?rn=8_55">Estatales</a>
                            <ul>
                                <li><a href="index.php?rn=8_6">Primarias</a></li>
                                <li><a href="index.php?rn=8_7">Preescolares</a></li>
                                <li><a href="index.php?rn=8_8">Especiales</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?rn=8_85">Ind&iacute;genas</a>
                            <ul>
                                <li><a href="index.php?rn=8_9">Primarias</a></li>
                                <li><a href="index.php?rn=8_10">Preescolares</a></li>
                                <li><a href="index.php?rn=8_11">Especiales</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="index.php?rn=8_12">2011-2012</a>
                    <ul>
                        <li><a href="index.php?rn=8_13">Federalizadas</a>
                            <ul>
                                <li><a href="index.php?rn=8_14">Primarias</a></li>
                                <li><a href="index.php?rn=8_15">Preescolares</a></li>
                                <li><a href="index.php?rn=8_16">Especiales</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?rn=8_17">Estatales</a>
                            <ul>
                                <li><a href="index.php?rn=8_18">Primarias</a></li>
                                <li><a href="index.php?rn=8_19">Preescolares</a></li>
                                <li><a href="index.php?rn=8_20">Especiales</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?rn=8_21">Ind&iacute;genas</a>
                            <ul>
                                <li><a href="index.php?rn=8_22">Primarias</a></li>
                                <li><a href="index.php?rn=8_23">Preescolares</a></li>
                                <li><a href="index.php?rn=8_24">Especiales</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="index.php?rn=8_25">2010-2011</a>
                    <ul>
                        <li><a href="index.php?rn=8_26">Federalizadas</a>
                            <ul>
                                <li><a href="index.php?rn=8_27">Primarias</a></li>
                                <li><a href="index.php?rn=8_28">Preescolares</a></li>
                                <li><a href="index.php?rn=8_29">Especiales</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?rn=8_30">Estatales</a>
                            <ul>
                                <li><a href="index.php?rn=8_31">Primarias</a></li>
                                <li><a href="index.php?rn=8_32">Preescolares</a></li>
                                <li><a href="index.php?rn=8_33">Especiales</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?rn=8_34">Ind&iacute;genas</a>
                            <ul>
                                <li><a href="index.php?rn=8_35">Primarias</a></li>
                                <li><a href="index.php?rn=8_36">Preescolares</a></li>
                                <li><a href="index.php?rn=8_37">Especiales</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>Escuelas con mayor cantidad de docentes y alumnos y almenos un especialista
            <ul>
                <li><a href="index.php?rn=9_1">Federalizadas</a>
                    <ul>
                         <li><a href="index.php?rn=9_2">Primarias</a></li>
                         <li><a href="index.php?rn=9_3">Preescolares</a></li>
                         <li><a href="index.php?rn=9_4">Especiales</a></li>
                    </ul>
                </li>
                <li><a href="index.php?rn=9_5">Estatales</a>
                     <ul>
                         <li><a href="index.php?rn=9_6">Primarias</a></li>
                         <li><a href="index.php?rn=9_7">Preescolares</a></li>
                         <li><a href="index.php?rn=9_8">Especiales</a></li>
                    </ul>
                </li>
                <li><a href="index.php?rn=9_9">Ind&iacute;genas</a>
                     <ul>
                         <li><a href="index.php?rn=9_10">Primarias</a></li>
                         <li><a href="index.php?rn=9_11">Preescolares</a></li>
                         <li><a href="index.php?rn=9_12">Especiales</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ol>
<?php
    }else{
      
    }
    if(isset($tipo) and $tipo!=''){
        include ('repBasicos.php');
    echo "<a href='PDFbasicos.php?tipo=$tipo' title='Guardar reporte en archivo PDF' class='pdf' target='_blank'><b> &nbsp; PDF &nbsp; </b></a>";   
?>
   <br />
    <table id="tRes">

<?php echo imprimir($tipo); ?>
   
    </table>
    
 <?php
    }elseif(isset($rn) and $rn!=''){
       include('repAvanzados.php');
	   echo "<a href='PDFavanzados.php?tipo=$rn' title='Guardar reporte en archivo PDF' class='pdf' target='_blank'><b> &nbsp; PDF &nbsp; </b></a> ";
 ?>		
 	 <br />
     <table id="tRes">

<?php   echo imprimirA($rn); ?>
   
    </table>
	
 <?php } ?>  
 

</div>

<div id="Pie"><div id="ContenedorPie"><img src="imagenes/PiePagina.png" align="right" />
<div ></div></div>
    </div>
</div>
</body>
</html>