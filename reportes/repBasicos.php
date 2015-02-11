<?php
include ('seg/conec.php');
$link=  Conectarse();

function imprimir($tipo){
    
    $colr=array("#FFFFFF","#DDDDEE");
    $cont=1;
    
    $mod=array(1=>"Federalizada",2=>"Estatal",3=>"Ind&iacute;gena");
    $niv=array(1=>"Preescolar",2=>"Primaria",3=>"Especial");
    $puesto=array(1=>"Docente",2=>"Director",3=>"Especialista");
    $ciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
                    6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020");
    $meses=array(1=>"Agosto",2=>"Septiembre",3=>"Octubre",4=>"Noviembre",5=>"Diciembre",6=>"Enero",
                    7=>"Febrero",8=>"Marzo",9=>"Abril",10=>"Mayo",11=>"Junio",12=>"Julio");

    
    if($tipo==""){
        $reporte="<hr />";
        
    //************** MAESTROS Y DIRECTORES DEL CICLO ACTUAL*******************//  
        
    }elseif($tipo==1){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH,
                                (select sPuesto from tPuestos where idPuesto=nPuesto), esc.sNombre
                                from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc 
                                 inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela where esc.nAfiliada =1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Personal laborando en el ciclo actual (Docentes y directores)</h2>";
            $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>RFC</th><th>Nombre</th><th>Puesto</th><th>Escuela</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res['sRFC']."</td>
                   <td>".$res['sNombreRH']." ".$res['sApellidoPaternoRH']." ".$res['sApellidoMaternoRH']."</td>
                   <td>".$res[4]."</td><td>".$res['sNombre']."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*********************ESCUELAS INSCRITAS AL CICLO ACTUAL*****************//
        
    }elseif($tipo==2){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel
                                and e.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas inscritas al ciclo actual</h2>";
            $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                        <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>";  
               $cont++;
            }while($res=mysql_fetch_array($consulta));
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
            $reporte="<h2>Escuelas Federalizadas</h2>";
            $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                        <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>";  
               $cont++;
            }while($res=mysql_fetch_array($consulta));
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
            $reporte="<h2>Escuelas Estatales</h2>";
             $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                        <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
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
            $reporte="Escuelas Ind&iacute;genas</h2>";
             $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                        <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>";  
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
     //**********************+* ESCUELAS PRIMARIAS ***************************//
   
    }elseif($tipo=="4_1"){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel 
                                and n.idNivel=2 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Primarias</h2>";
            $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                        <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>";  
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
     
    //***************ESCUELAS PREESCOLARES ***********************************//
   
        }elseif($tipo=="4_2"){ 
        $consulta=  mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel nZona, nSector 
                                from tEscuelas e, tModalidad m, tNivel n where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel 
                                and n.idNivel=1 and e.nAfiliada = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Preescolares</h2>";
             $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                        <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
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
            $reporte="<h2>Escuelas Especiales</h2>";
             $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                           <th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res['nSector']."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
     //********************DIRECTORES DEL CICLO ACTUAL ***********************//
        
    }elseif($tipo=="5_1"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tPuestos p, tEscuelas esc, tRecursos_hum_ciclo rhc 
                                where rh.sRFC=rhc.sRFCrhc and rhc.sClaveEscuelaRhc=esc.sClaveEscuela and nPuesto=2 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Directores</h2>";
            $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    //************************* DOCENTES DEL CICLO ACTUAL ********************//
        
    }elseif($tipo=="5_2"){ 
        $consulta=  mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tEscuelas esc, tRecursos_hum_ciclo rhc
                                where rh.sRFC=rhc.sRFCrhc and rhc.sClaveEscuelaRhc=esc.sClaveEscuela and nPuesto=1 and esc.nAfiliada=1");
        
        if($res=  mysql_fetch_array($consulta)){
            $reporte="<h2>Docentes del ciclo actual</h2>";
            $reporte.= "<tr bgcolor='#CCCCCC'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>";  
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
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
             $reporte="<h2>Especialistas del ciclo actual</h2>";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>RFC</th><th>Nombre</th><th>Especialidad</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    //***************** APOYOS ECONÓMICOS DE DIRECTORES **********************//
        
    }elseif($tipo=="6_1"){
        $consulta=mysql_query("select sRFCae,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,nCiclo,nFechaInicio,nFechaFinal,nBrutoMensual,nIsrMensual,
                                e.sNombre, e.sLocalidad, e.sMunicipio
                                from tApoyos_economicos aerh inner join tRecursos_humanos rh on aerh.sRFCae=rh.sRFC 
                                inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc inner join tEscuelas e on rhe.sClaveEscuelaRhc=e.sClaveEscuela
                                where nPuesto=2 and e.nAfiliada =1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Apoyos Econ&oacute;micos de Directores</h2>";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>RFC</th><th>Nombre</th><th>Ciclo</th><th>Fecha Inicio</th><th>Fecha Final</th>
                 <th>Bruto Mensual</th><th>ISR Mensual</th><th>Total</th><th>Escuela</th><th>Localidad</th><th>municipio</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$ciclos[$res[4]]."</td><td>".$meses[$res[5]]."</td><td>".$meses[$res[6]]."</td><td>".$res[7]."</td><td>".$res[8]."</td>
                       <td>".($res[7] - $res[8])*($res[6]-$res[5] +1)."</td><td>".$res[9]."</td><td>".$res[10]."</td><td>".$res[11]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
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
            $reporte="<h2>Apoyos Econ&oacute;micos de Directores</h2>";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>RFC</th><th>Nombre</th><th>Ciclo</th><th>Fecha Inicio</th><th>Fecha Final</th>
                 <th>Bruto Mensual</th><th>ISR Mensual</th><th>Total</th><th>Escuela</th><th>Localidad</th><th>municipio</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$ciclos[$res[4]]."</td><td>".$meses[$res[5]]."</td><td>".$meses[$res[6]]."</td><td>".$res[7]."</td><td>".$res[8]."</td>
                       <td>".($res[7] - $res[8])*($res[6]-$res[5] +1)."</td><td>".$res[9]."</td><td>".$res[10]."</td><td>".$res[11]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
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
            $reporte="<h2>Apoyos Econ&oacute;micos de Directores</h2>";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>RFC</th><th>Nombre</th><th>Ciclo</th><th>Fecha Inicio</th><th>Fecha Final</th>
                 <th>Bruto Mensual</th><th>ISR Mensual</th><th>Total</th><th>Escuela</th><th>Localidad</th><th>municipio</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$ciclos[$res[4]]."</td><td>".$meses[$res[5]]."</td><td>".$meses[$res[6]]."</td><td>".$res[7]."</td><td>".$res[8]."</td>
                       <td>".($res[7] - $res[8])*($res[6]-$res[5] +1)."</td><td>".$res[9]."</td><td>".$res[10]."</td><td>".$res[11]."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
     //****************** ESCUELAS POR ZONA ESCOLAR **************************//
        
    }elseif($tipo=="7_1"){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel,nZona
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada =1 ORDER BY nZona");
        
        if($res=  mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas por ZONA escolar</h2>";
            $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th>
                        <th>Modalidad</th><th>Nivel</th><th>Zona</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                            <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    //****************** ESCUELAS POR SECTOR //*******************************//
        
    }elseif($tipo=="7_2"){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel,nSector
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada =1 ORDER BY nSector");
        
        if($res=  mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas por SECTOR</h2>";
            $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th>
                        <th>Nivel</th><th>Sector</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                            <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>";              
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
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
             $reporte="<h2>Escuelas Antiguas</h2>";
             $reporte.= "<tr><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                            <td>".$res[4]."</td><td>".$res[5]."</td></tr>";  
               $cont++; 
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    //************************* ESCUELAS DADAS DE BAJA ***********************//
        
    }elseif($tipo==9){ 
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada =0");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas dadas de baja</h2>";
             $reporte.= "<tr><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                            <td>".$res[4]."</td><td>".$res[5]."</td></tr>";  
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    //********************* PERSONAL CON dOBLE PLAZA *************************//
        
    }elseif($tipo==10){ 
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad,esc.sMunicipio 
                                from tRecursos_humanos rh, tEscuelas esc, tRecursos_hum_ciclo rhe 
                                where rh.sRFC=rhe.sRFCrhc and rhe.sClaveEscuelaRhc=esc.sClaveEscuela and esc.nAfiliada=1 and nDoblePlaza = 1");
        
        if($res=mysql_fetch_array($consulta)){
             $reporte="<h2>Personal con Doble Plaza</h2>";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
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
            $reporte="<h2>Escuelas seg&uacute;n cantidad de alumnos</h2>";
            $reporte.="<tr bgcolor='#BBBBBB'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                            <td>".$res[4]."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
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
             $reporte="<h2>Escuelas seg&uacute;n capacitaci&oacute;n</h2>";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                 <th>Capacitaci&oacute;n</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td>
                   <td>".$res[3]."</td><td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res= mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    //**************TELÉFONOS Y CORREOS ELECTRÓNICOS DE LAS ESCUELAS **********/
        
    }elseif($tipo==13){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, m.sModalidad, n.sNivel, sTelefono, sEmail 
                                from tEscuelas e, tModalidad m, tNivel n 
                                where e.nModalidad=m.idModalidad and e.nNivel=n.idNivel and nAfiliada=1 order by sEmail desc");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Tel&eacute;fonos y Correo electr&oacute;nicos";
             $reporte.= "<tr bgcolor='#BBBBBB'><th>#</th><th>Clave</th><th>Nombre</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th><th>Nivel</th>
                 <th>Tel&eacute;fono</th><th>e-mail</th></tr>";
            do{
               $reporte.= "<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td>
                   <td>".$res[3]."</td><td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=  mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados"; 
        }
        
    }
    return $reporte;
}
?>