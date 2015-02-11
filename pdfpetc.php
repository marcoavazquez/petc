<?php
include("seg/conec.php");
$link=Conectarse();
require('/fpdf/fpdf.php');
extract($_REQUEST);

$pdf=new FPDF('P','mm','Letter');
$pdf->SetTitle("$escuela",false);
$pdf->AddPage();
$pdf->Image('sevrd.jpg',15,5,-200);
$pdf->Image('PiePagina_.png',65,5,-90);
$pdf->Image('PiePagina.png',135,8,-100);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,"Escuela: $escuela",0,2);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,10,"Nivel: $nivel",0,0);
$pdf->Cell(40,10,"Clave: $clave",0,1);
$pdf->Cell(60,10,"Localidad: $loc",0,0);
$pdf->Cell(60,10,"Municipio: $mun",0,1);
$pdf->Cell(40,10,"Zona: $zona",0,0);
$pdf->Cell(40,10,"Sector: $sector",0,0);
$pdf->Cell(40,10,"Modalidad: $mod",0,1);
$pdf->Ln(1);
$consdir=mysql_query("select rh.rfc,rh.nombre,rh.ape_pat,rh.ape_mat from recursos_humanos rh,rec_hum_esc rhe where rh.rfc=rhe.rfc and rhe.clave_escuela='$clave' and rh.puesto like 'director' and rhe.activo like 'si'",$link);
$direc=mysql_fetch_array($consdir);

$pdf->Cell(60,10,"Director: ".$direc["nombre"]." ".$direc["ape_pat"]." ".$direc["ape_mat"],0,1);
$pdf->Cell(20,10,"Docentes:",0,1);
$pdf->Ln(1);
$conspers=mysql_query("select rh.rfc,rh.nombre,rh.ape_pat,rh.ape_mat,rh.dentro_prog from recursos_humanos rh,rec_hum_esc where rh.rfc=rec_hum_esc.rfc and rec_hum_esc.clave_escuela='$clave' and rh.puesto like 'docente' and rec_hum_esc.activo like 'si'",$link);
	if ($pers = mysql_fetch_array($conspers)){
		$contdet=0;
		do {
			$contdet++;
			$pdf->Cell(50,5,$contdet.".- ".$pers["nombre"]." ".$pers["ape_pat"]." ".$pers["ape_mat"],0,1);
		}while($pers = mysql_fetch_array($conspers));
	}

	
$consesp=mysql_query("select rfc,nombre,ape_pat,ape_mat,horario_trabajo from especialistas where clave='$clave' and activo like 'si'",$link);
	if ($esp = mysql_fetch_array($consesp)){
		$pdf->Cell(20,10,"Especialistas:",0,1);
		$pdf->Ln(1);
		$contesp=0;
			do{
				$contesp++;
				$pdf->Cell(20,10,$esp["nombre"]." ".$esp["ape_pat"]." ".$esp["ape_mat"],0,1);
			}while($esp = mysql_fetch_array($consesp));
	}
	
$pdf->Output();

?>
