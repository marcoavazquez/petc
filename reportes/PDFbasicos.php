<?php
require('../fpdf/fpdf.php');
$pdf=new FPDF('L','mm','A4');
$pdf->SetTitle("Escuela",false);
$pdf->AddPage();
$pdf->Image('../imagen/sevrd.jpg',15,5,-200);
$pdf->Image('../imagen/escver.png',100,5,-430);
$pdf->Image('../imagen/estp.gif',165,5,-190);
$pdf->Image('../imagen/PiePagina.png',215,8,-100);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(40,10,'Escuelas de Tiempo Completo',0,2);
$pdf->SetFont('Arial','B',12);

include ('seg/conec.php');
$link=  Conectarse();
extract($_REQUEST);
    $cont=1;
    
    $mod=array(1=>"Federalizada",2=>"Estatal",3=>"Ind&iacute;gena");
    $niv=array(1=>"Preescolar",2=>"Primaria",3=>"Especial");
    $puesto=array(1=>"Docente",2=>"Director",3=>"Especialista");
    $ciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
                    6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020");
    $meses=array(1=>"Agosto",2=>"Septiembre",3=>"Octubre",4=>"Noviembre",5=>"Diciembre",6=>"Enero",
                    7=>"Febrero",8=>"Marzo",9=>"Abril",10=>"Mayo",11=>"Junio",12=>"Julio");

    
    if($tipo==""){        
    //************** MAESTROS Y DIRECTORES DEL CICLO ACTUAL*******************//  
        
    }elseif($tipo==1){
		
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(30,5,"RFC",1,0);
		$pdf->Cell(60,5,"Nobre",1,0);
		$pdf->Cell(30,5,"Puesto",1,0);
		$pdf->Cell(50,5,"Escuela",1,1);
		
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH,
                                (select sPuesto from tPuestos where idPuesto=nPuesto), esc.sNombre
                                from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc 
                                 inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela where esc.nAfiliada =1");
        
        if($res=mysql_fetch_array($consulta)){
            do{
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont++,1,0);
				$pdf->Cell(30,5,$res['sRFC'],1,0);
				$pdf->Cell(60,5,$res['sNombreRH']." ".$res['sApellidoPaternoRH']." ".$res['sApellidoMaternoRH'],1,0);
				$pdf->Cell(30,5,$res[4],1,0);
				$pdf->Cell(50,5,$res['sNombre'],1,1);
				$cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados";            
        }
        
    //*********************ESCUELAS INSCRITAS AL CICLO ACTUAL*****************//
        
    }elseif($tipo==2){ 
		$pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel
                                and e.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
           	
            do{
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
                $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
    
    //*******************ESCUELAS FEDERALIZADAS*******************************//
        
    }elseif($tipo=="3_1"){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad 
                                and e.nNivel=n.idNivel and m.idModalidad=1 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
			$pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //*************************ESCUELAS ESTATALES *************************///
        
    }elseif($tipo=="3_2"){ 
        $consulta=  mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad 
                                and e.nNivel=n.idNivel and m.idModalidad=2 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //************************ ESCUELAS INDÍGENAS ****************************//
        
    }elseif($tipo=="3_3"){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad 
                                and e.nNivel=n.idNivel and m.idModalidad=3 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
           $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //**********************+* ESCUELAS PRIMARIAS ***************************//
   
    }elseif($tipo=="4_1"){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel 
                                and n.idNivel=2 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
     
    //***************ESCUELAS PREESCOLARES ***********************************//
   
        }elseif($tipo=="4_2"){ 
        $consulta=  mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel 
                                and n.idNivel=1 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
           $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //*************************** ESCUELAS ESPECIALIES ***********************//
        
    }elseif($tipo=="4_3"){ 
        $consulta=  mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel 
                                and n.idNivel=3 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
           $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //********************DIRECTORES DEL CICLO ACTUAL ***********************//
        
    }elseif($tipo=="5_1"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tPuestos p, tEscuelas esc, tRecursos_hum_ciclo rhc 
                                where rh.sRFC=rhc.sRFCrhc and rhc.sClaveEscuelaRhc=esc.sClaveEscuela and nPuesto=2 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(60,5,"Nombre",1,0);
			$pdf->Cell(50,5,"Escuela",1,0);
			$pdf->Cell(50,5,"Localidad",1,0);
			$pdf->Cell(50,5,"Municipio",1,1);
            do{
                $pdf->SetFont('Arial','',9);
			$pdf->Cell(8,5,$cont,1,0);
			$pdf->Cell(30,5,$res[0],1,0);
			$pdf->Cell(60,5,$res[1]." ".$res[2]." ".$res[3],1,0);
			$pdf->Cell(50,5,$res[4],1,0);
			$pdf->Cell(50,5,$res[5],1,0);
			$pdf->Cell(50,5,$res[6],1,1);
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //************************* DOCENTES DEL CICLO ACTUAL ********************//
        
    }elseif($tipo=="5_2"){ 
        $consulta=  mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tEscuelas esc, tRecursos_hum_ciclo rhc
                                where rh.sRFC=rhc.sRFCrhc and rhc.sClaveEscuelaRhc=esc.sClaveEscuela and nPuesto=1 and esc.nAfiliada=1");
        
        if($res=  mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(60,5,"Nombre",1,0);
			$pdf->Cell(50,5,"Escuela",1,0);
			$pdf->Cell(50,5,"Localidad",1,0);
			$pdf->Cell(50,5,"Municipio",1,1);
            do{
                $pdf->SetFont('Arial','',9);
			$pdf->Cell(8,5,$cont,1,0);
			$pdf->Cell(30,5,$res[0],1,0);
			$pdf->Cell(60,5,$res[1]." ".$res[2]." ".$res[3],1,0);
			$pdf->Cell(50,5,$res[4],1,0);
			$pdf->Cell(50,5,$res[5],1,0);
			$pdf->Cell(50,5,$res[6],1,1);
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //**************** ESPECIALISTAS DEL CICLO ACTUAL ************************//
        
    }elseif($tipo=="5_3"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH,
                             (select sEspecialidad from tEspecialidad where idEspecialidad = nEspecialidad),
                              esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tEscuelas esc, tRecursos_hum_ciclo rhc
                                where rh.sRFC=rhc.sRFCrhc and rhc.sClaveEscuelaRhc=esc.sClaveEscuela and nPuesto=3 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(60,5,"Nombre",1,0);
			$pdf->Cell(50,5,"Escuela",1,0);
			$pdf->Cell(50,5,"Localidad",1,0);
			$pdf->Cell(50,5,"Municipio",1,1);
            do{
                $pdf->SetFont('Arial','',9);
			$pdf->Cell(8,5,$cont,1,0);
			$pdf->Cell(30,5,$res[0],1,0);
			$pdf->Cell(60,5,$res[1]." ".$res[2]." ".$res[3],1,0);
			$pdf->Cell(50,5,$res[4],1,0);
			$pdf->Cell(50,5,$res[5],1,0);
			$pdf->Cell(50,5,$res[6],1,1);
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //***************** APOYOS ECONÓMICOS DE DIRECTORES **********************//
        
    }elseif($tipo=="6_1"){
        $consulta=mysql_query("select sRFCae,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,nCiclo,nFechaInicio,nFechaFinal,nBrutoMensual,nIsrMensual,
                                e.sNombre, e.sLocalidad, e.sMunicipio
                                from tApoyos_economicos aerh inner join tRecursos_humanos rh on aerh.sRFCae=rh.sRFC 
                                inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc inner join tEscuelas e on
								 rhe.sClaveEscuelaRhc=e.sClaveEscuela
                                where nPuesto=2 and e.nAfiliada =1");
        
        if($res=mysql_fetch_array($consulta)){
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(7,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(50,5,"Nombre",1,0);
			$pdf->Cell(18,5,"Ciclo",1,0);
			$pdf->Cell(35,5,"Periodo",1,0);
			$pdf->Cell(15,5,"Bruto m.",1,0);
			$pdf->Cell(15,5,"Isr m.",1,0);
			$pdf->Cell(15,5,"Total",1,0);
			$pdf->Cell(35,5,"Escuela",1,0);
			$pdf->Cell(35,5,"Localidad",1,0);
			$pdf->Cell(30,5,"Municipio",1,1);
			
            do{
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(7,5,$cont,1,0);
				$pdf->Cell(30,5,$res[0],1,0);
				$pdf->Cell(50,5,$res[1]." ".$res[2]." ".$res[3],1,0);
				$pdf->Cell(18,5,$ciclos[$res[4]],1,0);
				$pdf->Cell(35,5,$meses[$res[5]]." - ".$meses[$res[6]],1,0);
				$pdf->Cell(15,5,"$ ".$res[7],1,0);
				$pdf->Cell(15,5,"$ ".$res[8],1,0);
				$pdf->Cell(15,5,"$ ".($res[7] - $res[8])*($res[6]-$res[5] +1),1,0);
				$pdf->Cell(35,5,$res[9],1,0);
				$pdf->Cell(35,5,$res[10],1,0);
				$pdf->Cell(30,5,$res[11],1,1);
         
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //***************** APOYOS ECONÓMICOS DE DOCENTES **********************//
        
    }elseif($tipo=="6_2"){
        $consulta=  mysql_query("select sRFCae,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,nCiclo,nFechaInicio,nFechaFinal,nBrutoMensual,nIsrMensual,
                                e.sNombre, e.sLocalidad, e.sMunicipio
                                from tApoyos_economicos aerh inner join tRecursos_humanos rh on aerh.sRFCae=rh.sRFC 
                                inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc inner join tEscuelas e on rhe.sClaveEscuelaRhc=e.sClaveEscuela
                                where nPuesto=1 and e.nAfiliada =1");
        
        if($res=mysql_fetch_array($consulta)){
          $pdf->SetFont('Arial','B',9);
			$pdf->Cell(7,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(50,5,"Nombre",1,0);
			$pdf->Cell(18,5,"Ciclo",1,0);
			$pdf->Cell(35,5,"Periodo",1,0);
			$pdf->Cell(15,5,"Bruto m.",1,0);
			$pdf->Cell(15,5,"Isr m.",1,0);
			$pdf->Cell(15,5,"Total",1,0);
			$pdf->Cell(35,5,"Escuela",1,0);
			$pdf->Cell(35,5,"Localidad",1,0);
			$pdf->Cell(30,5,"Municipio",1,1);
			
            do{
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(7,5,$cont,1,0);
				$pdf->Cell(30,5,$res[0],1,0);
				$pdf->Cell(50,5,$res[1]." ".$res[2]." ".$res[3],1,0);
				$pdf->Cell(18,5,$ciclos[$res[4]],1,0);
				$pdf->Cell(35,5,$meses[$res[5]]." - ".$meses[$res[6]],1,0);
				$pdf->Cell(15,5,"$ ".$res[7],1,0);
				$pdf->Cell(15,5,"$ ".$res[8],1,0);
				$pdf->Cell(15,5,"$ ".($res[7] - $res[8])*($res[6]-$res[5] +1),1,0);
				$pdf->Cell(35,5,$res[9],1,0);
				$pdf->Cell(35,5,$res[10],1,0);
				$pdf->Cell(30,5,$res[11],1,1);
         
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //***************** APOYOS ECONÓMICOS DE ESPECIALISTAS **********************//
        
    }elseif($tipo=="6_3"){
        $consulta=  mysql_query("select sRFCae,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,nCiclo,nFechaInicio,nFechaFinal,nBrutoMensual,nIsrMensual,
                                e.sNombre, e.sLocalidad, e.sMunicipio
                                from tApoyos_economicos aerh inner join tRecursos_humanos rh on aerh.sRFCae=rh.sRFC 
                                inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc inner join tEscuelas e on rhe.sClaveEscuelaRhc=e.sClaveEscuela
                                where nPuesto=3 and e.nAfiliada =1");
        
        if($res=mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
			$pdf->Cell(7,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(50,5,"Nombre",1,0);
			$pdf->Cell(18,5,"Ciclo",1,0);
			$pdf->Cell(35,5,"Periodo",1,0);
			$pdf->Cell(15,5,"Bruto m.",1,0);
			$pdf->Cell(15,5,"Isr m.",1,0);
			$pdf->Cell(15,5,"Total",1,0);
			$pdf->Cell(35,5,"Escuela",1,0);
			$pdf->Cell(35,5,"Localidad",1,0);
			$pdf->Cell(30,5,"Municipio",1,1);
			
            do{
				$pdf->SetFont('Arial','',9);
				$pdf->Cell(7,5,$cont,1,0);
				$pdf->Cell(30,5,$res[0],1,0);
				$pdf->Cell(50,5,$res[1]." ".$res[2]." ".$res[3],1,0);
				$pdf->Cell(18,5,$ciclos[$res[4]],1,0);
				$pdf->Cell(35,5,$meses[$res[5]]." - ".$meses[$res[6]],1,0);
				$pdf->Cell(15,5,"$ ".$res[7],1,0);
				$pdf->Cell(15,5,"$ ".$res[8],1,0);
				$pdf->Cell(15,5,"$ ".($res[7] - $res[8])*($res[6]-$res[5] +1),1,0);
				$pdf->Cell(35,5,$res[9],1,0);
				$pdf->Cell(35,5,$res[10],1,0);
				$pdf->Cell(30,5,$res[11],1,1);
         
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //****************** ESCUELAS POR ZONA ESCOLAR **************************//
        
    }elseif($tipo=="7_1"){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel,nZona,nSector
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada =1 ORDER BY nZona");
        
        if($res=  mysql_fetch_array($consulta)){
              $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //****************** ESCUELAS POR SECTOR //*******************************//
        
    }elseif($tipo=="7_2"){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel,nSector
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada =1 ORDER BY nSector");
        
        if($res=  mysql_fetch_array($consulta)){
             $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(12,5,"Zona",1,0);
		$pdf->Cell(12,5,"Sector",1,1);
           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(12,5,$res[6],1,0);
				$pdf->Cell(12,5,$res['nSector'],1,1);
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //**********ESCUELAS CON MAYOR ANTIGÜEDAD EN EL PROGRAMA ****************//
        
    }elseif($tipo==8){
        $consulta=  mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel 
                                from tEscuelas e, tModalidad m, tNivel n, tEscuelas_ciclo ec
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel 
                                and sClaveEscuela=ec.sClaveEscuelaCiclo and nAfiliada=1 and nCiclo=1");
        
        if($res=  mysql_fetch_array($consulta)){
              $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,1);

           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,1);
	
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //************************* ESCUELAS DADAS DE BAJA ***********************//
        
    }elseif($tipo==9){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada =0");
        
        if($res=mysql_fetch_array($consulta)){
             $pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(25,5,"Clave",1,0);
			$pdf->Cell(60,5,"Escuela",1,0);
			$pdf->Cell(50,5,"Localidad",1,0);
			$pdf->Cell(50,5,"Municipio",1,0);
			$pdf->Cell(20,5,"Modalidad",1,0);
			$pdf->Cell(20,5,"Nivel",1,1);

           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,1);
	
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //********************* PERSONAL CON dOBLE PLAZA *************************//
        
    }elseif($tipo==10){ 
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tEscuelas esc, tRecursos_hum_ciclo rhe 
                                where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc=esc.sClaveEscuela and esc.nAfiliada=1 and nDoblePlaza = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(30,5,"RFC",1,0);
			$pdf->Cell(60,5,"Nombre",1,0);
			$pdf->Cell(50,5,"Escuela",1,0);
			$pdf->Cell(50,5,"Localidad",1,0);
			$pdf->Cell(50,5,"Municipio",1,1);
            do{
                $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(30,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1]." ".$res[2]." ".$res[3],1,0);
				$pdf->Cell(50,5,$res[4],1,0);
				$pdf->Cell(50,5,$res[5],1,0);
				$pdf->Cell(50,5,$res[6],1,1);
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
   //***************** ESCUELAS CON MAYOR CANTIDAD DE ALUMNOS ****************//
        
    }elseif($tipo==11){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, (select sum(nAlumnos) from tNum_alum na, tAlumnos a 
                                 where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos 
                                 from tEscuelas e 
                                 where nAfiliada=1 order by alumnos desc");
        
        if($res=mysql_fetch_array($consulta)){
           $pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(25,5,"Clave",1,0);
			$pdf->Cell(60,5,"Escuela",1,0);
			$pdf->Cell(50,5,"Localidad",1,0);
			$pdf->Cell(50,5,"Municipio",1,0);
			$pdf->Cell(20,5,"# Alumnos",1,1);
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,1);
	
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
     //************** ESCUELAS CON CIERTA CAPACITACIÓN ***********************//
        
    }elseif($tipo==12){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, cs.nCapacitacion 
                                from tEscuelas e, tModalidad m, tNivel n,tCapacitaciones cs 
                                where e.nModalidad=m.idModalidad and cs.sClaveEscuelaCap=e.sClaveEscuela and e.nNivel=n.idNivel 
                                and nAfiliada=1");
        
        if($res= mysql_fetch_array($consulta)){
             $pdf->SetFont('Arial','B',9);
		$pdf->Cell(8,5,"#",1,0);
		$pdf->Cell(25,5,"Clave",1,0);
		$pdf->Cell(60,5,"Escuela",1,0);
		$pdf->Cell(50,5,"Localidad",1,0);
		$pdf->Cell(50,5,"Municipio",1,0);
		$pdf->Cell(20,5,"Modalidad",1,0);
		$pdf->Cell(20,5,"Nivel",1,0);
		$pdf->Cell(20,5,"Capacitación",1,1);

           
            do{
              $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(50,5,$res[2],1,0);
				$pdf->Cell(50,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(20,5,$res[6],1,1);
	
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    //**************TELÉFONOS Y CORREOS ELECTRÓNICOS DE LAS ESCUELAS **********/
        
    }elseif($tipo==13){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, sTelefono, sEmail 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada=1 order by sEmail desc");
        
        if($res=mysql_fetch_array($consulta)){
			$pdf->SetFont('Arial','B',9);
			$pdf->Cell(8,5,"#",1,0);
			$pdf->Cell(25,5,"Clave",1,0);
			$pdf->Cell(60,5,"Escuela",1,0);
			$pdf->Cell(45,5,"Localidad",1,0);
			$pdf->Cell(45,5,"Municipio",1,0);
			$pdf->Cell(20,5,"Modalidad",1,0);
			$pdf->Cell(20,5,"Nivel",1,0);
			$pdf->Cell(25,5,"Teléfono",1,0);
			$pdf->Cell(35,5,"email",1,1);
            
            do{
               $pdf->SetFont('Arial','',9);
				$pdf->Cell(8,5,$cont,1,0);
				$pdf->Cell(25,5,$res[0],1,0);
				$pdf->Cell(60,5,$res[1],1,0);
				$pdf->Cell(45,5,$res[2],1,0);
				$pdf->Cell(45,5,$res[3],1,0);
				$pdf->Cell(20,5,$res[4],1,0);
				$pdf->Cell(20,5,$res[5],1,0);
				$pdf->Cell(25,5,$res[6],1,0);
				$pdf->Cell(35,5,$res[7],1,1);
	
               $cont++;
            }while($res=mysql_fetch_array($consulta));
			$pdf->Output();
        }else{
            $reporte="No hay resultados"; 
        }
        
    }
?>