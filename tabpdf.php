<?php
require('/fpdf/fpdf.php');
$pdf=new FPDF('L','mm','A4');
$pdf->SetTitle("Escuela",false);
$pdf->AddPage();
$pdf->Image('sevrd.jpg',15,5,-200);
$pdf->Image('escver.png',100,5,-430);
$pdf->Image('estp.gif',165,5,-190);
$pdf->Image('PiePagina.png',215,8,-100);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Escuelas de Tiempo Completo',0,2);
$pdf->SetFont('Arial','B',12);

extract($_REQUEST);

include("seg/conec.php");
$link=Conectarse();

if(!isset($mostrar)) $mostrar="NADA";

if($mostrar=="escuelas"){
///////////////////////////////CICLO ESCOLAR/////////////////////////////////
if(!isset($ciclos)) $ciclos="tds";
if(!isset($cic)) $cic="no";

if($ciclos=="tds") $ciclo=" - ";
else $ciclo=$ciclos;
/////////////////////////////////////////////////////////////////////////////////
$cicm=$ciclo;
$escum="";
$modalm="";
$ban=0;
$consulta="select e.clave_escuela,nombre_escuela,localidad,municipio,domicilio,CP,tel_director,email_direc,nivel,tipo,zona,sector from escuelas e";

if($cic=="si" and $ciclos!="tds"){
	$cic_="";
	$consulta=$consulta.",escuelas_ciclo ec where e.clave_escuela=ec.clave_escuela and ec.ciclo like '$ciclos'";
	$ban=1;
}
if($ban==0){
	if(!isset($nivel)){
		$nivel="no";
	}elseif($nivel=="si"){
		if($mniv=="tdsn"){
			$consulta=$consulta."";
		}elseif($mniv=="prim"){
			$consulta=$consulta." where nivel like 'Primaria'";
			$modalm=" primarias";
			$ban=1;
		}elseif($mniv=="pre"){
			$consulta=$consulta." where nivel like 'Preescolar'";
			$modalm=" preescolares";
			$ban=1;
		}elseif($mniv=="esp"){
			$consulta=$consulta." where nivel like 'Especial'";
			$modalm=" especiales";
			$ban=1;
		}
	}
}elseif($ban==1){
	if(!isset($nivel)){
		$nivel="no";
	}elseif($nivel=="si"){
		if($mniv=="tdsn"){
			$consulta=$consulta."";
		}elseif($mniv=="prim"){
			$consulta=$consulta." and nivel like 'Primaria'";
			$modalm=" primarias";
		}elseif($mniv=="pre"){
			$consulta=$consulta." and nivel like 'Preescolar'";
			$modalm=" preescolares";
		}elseif($mniv=="esp"){
			$consulta=$consulta." and nivel like 'Especial'";
			$modalm=" especiales";
		}
	}
}
if($ban==0){
	if(!isset($mod)){
		$mod="no";
	}elseif($mod=="si"){
		if($mmod=="tdsm"){
			$consulta=$consulta."";
		}elseif($mmod=="est"){
			$consulta=$consulta." where tipo like 'Estatal'";
			$escum=" estatales";
			$ban=1;
		}elseif($mmod=="fed"){
			$consulta=$consulta." where tipo like 'Federalizada'";
			$escum=" federalizadas";
			$ban=1;
		}elseif($mmod=="ind"){
			$consulta=$consulta." where tipo like 'Indigena'";
			$escum=" indigenas";
			$ban=1;
		}
	}
}elseif($ban==1){
	if(!isset($mod)){
		$mod="no";
	}elseif($mod=="si"){
		if($mmod=="tdsm"){
			$consulta=$consulta."";
		}elseif($mmod=="est"){
			$consulta=$consulta." and tipo like 'Estatal'";
			$escum=" estatales";
		}elseif($mmod=="fed"){
			$consulta=$consulta." and tipo like 'Federalizada'";
			$escum=" federalizadas";
		}elseif($mmod=="ind"){
			$consulta=$consulta." and tipo like 'Indigena'";
			$escum=" indigenas";
		}
	}
}
	if($orderby=="oclave"){
		$consulta=$consulta." order by clave_escuela";
	}elseif($orderby=="onombesc"){
		$consulta=$consulta." order by nombre_escuela";
	}elseif($orderby=="oniv"){
		$consulta=$consulta." order by nivel";
	}elseif($orderby=="omod"){
		$consulta=$consulta." order by tipo";
	}

$pdf->Cell(40,10,'Escuelas'.$modalm." ".$escum." ".$cicm ,0,2);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(8,5,"#",1,0);
$pdf->Cell(30,5,"Clave",1,0);
$pdf->Cell(50,5,"Escuela",1,0);
$pdf->Cell(50,5,"Localidad",1,0);
$pdf->Cell(50,5,"Municipio",1,0);
$pdf->Cell(20,5,"Nivel",1,0);
$pdf->Cell(25,5,"Modalidad",1,0);
$pdf->Cell(10,5,"Zona",1,0);
$pdf->Cell(12,5,"Sector",1,1);

$consesc=mysql_query($consulta);
$esc=mysql_fetch_array($consesc);
$i=1;
do{
	$consesp=mysql_query("select nombre,ape_pat,ape_mat from especialistas where clave like '".$esc['clave_escuela']."' ",$link);
	$espe=mysql_fetch_array($consesp);
	$consdir=mysql_query("select nombre,ape_pat,ape_mat from recursos_humanos rh,rec_hum_esc rhe where puesto like 'director' and rh.rfc=rhe.rfc and rhe.clave_escuela like '".$esc['clave_escuela']."' ",$link);
	$dire=mysql_fetch_array($consdir);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(8,5,$i,1,0);
	$pdf->Cell(30,5,$esc['clave_escuela'],1,0);
	$pdf->Cell(50,5,$esc['nombre_escuela'],1,0);
	$pdf->Cell(50,5,$esc['localidad'],1,0);
	$pdf->Cell(50,5,$esc['municipio'],1,0);
	$pdf->Cell(20,5,$esc['nivel'],1,0);
	$pdf->Cell(25,5,$esc['tipo'],1,0);
	$pdf->Cell(10,5,$esc['zona'],1,0);
	$pdf->Cell(12,5,$esc['sector'],1,1);
	$i++;
}while($esc=mysql_fetch_array($consesc));

$pdf->Output();

}elseif($mostrar=="personal"){////////////////////////////TABLA DE PERSONAL////////////////////////////////////////////////////////////////////////////////////

$pdf->SetFont('Arial','B',9);
$pdf->Cell(8,5,"#",1,0);
$pdf->Cell(30,5,"RFC",1,0);
$pdf->Cell(70,5,"Nombre",1,0);
$pdf->Cell(20,5,"Puesto",1,0);
$pdf->Cell(30,5,"Clave CT",1,0);
$pdf->Cell(50,5,"Nombre CT",1,1);

$consprs="select rfc,nombre,ape_pat,ape_mat,puesto,doble_plaza from recursos_humanos";
	if($dntrop=="si"){
		$consprs=$consprs." where activo like 'si'";
	}elseif($dntrop=="no"){
		$consprs=$consprs." where activo like ''";
	}elseif($dntrop=="2"){
		$consprs=$consprs." ";
	}
	
	if($ordebyp=="rfc"){
		$consprs=$consprs." order by rfc";
	}elseif($ordebyp=="nomb"){
		$consprs=$consprs." order by ape_pat ";
	}elseif($ordebyp=="ClaveCT"){
		$consprs=$consprs." ";
	}elseif($ordebyp=="puesto"){
		$consprs=$consprs." order by puesto";
	}
	
	$consp=mysql_query($consprs);
$pers=mysql_fetch_array($consp);

$cont=1;
do{
	$consescp=mysql_query("select clave_escuela from rec_hum_esc where rfc like '".$pers['rfc']."' ",$link);
	$escper=mysql_fetch_array($consescp);
	$conscnep=mysql_query("select clave_escuela,nombre_escuela from escuelas where clave_escuela like '".$escper['clave_escuela']."' ",$link);
	$cne=mysql_fetch_array($conscnep);
	$consapec=mysql_query("select ciclo,periodo,bruto_mensual,isr_mensual,neto_mensual,neto_periodo from rec_hum_apoyos_ec where rfc like '".$pers['rfc']."'");
	$apoec=mysql_fetch_array($consapec);

	
$pdf->Cell(8,5,$cont,1,0);
$pdf->Cell(30,5,$pers['rfc'],1,0);
$pdf->Cell(70,5,$pers['ape_pat']." ".$pers['ape_mat']." ".$pers['nombre'],1,0);
$pdf->Cell(20,5,$pers['puesto'],1,0);
$pdf->Cell(30,5,$cne['clave_escuela'],1,0);
$pdf->Cell(50,5,$cne['nombre_escuela'],1,1);

	/*/////////APOYOS ECONÓMICOS/////////////////////////////7

	if(!isset($apec)) echo "";
	elseif($apec=='si')
	echo "<td>".$apoec['ciclo']."</td><td align='center'>".$apoec['periodo']."</td><td align='center'>".$apoec['bruto_mensual']."</td><td align='center'>".$apoec['isr_mensual']."</td><td align='center'>".$apoec['neto_mensual']."</td><td align='center'>".$apoec['neto_periodo']."</td>";
*/////////////////////////////////////////////////////////////////////////////////////////////////////////
	$cont++;
}while($pers=mysql_fetch_array($consp));
$pdf->Output();
}else{
	echo "<script>alert('solo soportado para escuelas')";
}
?>