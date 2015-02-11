<?php
include ('seg/conec.php');
$link=  Conectarse();

function imprimirA($rn){
    
    $colr=array("#FFFFFF","#DDDDFF");
    $cont=1;
    
    $mod=array(1=>"Federalizada",2=>"Estatal",3=>"Ind&iacute;gena");
    $niv=array(1=>"Preescolar",2=>"Primaria",3=>"Especialista");
    $puesto=array(1=>"Docente",2=>"Director",3=>"Especialista");
    $ciclos=array(1=>"2010-2011",2=>"2011-2012",3=>"2012-2013",4=>"2013-2014",5=>"2014-2015",
                  6=>"2015-2016",7=>"2016-2017",8=>"2017-2018",9=>"2018-2019",10=>"2019-2020");
    $meses=array(1=>"Agosto",2=>"Septiembre",3=>"Octubre",4=>"Noviembre",5=>"Diciembre",6=>"Enero",
                    7=>"Febrero",8=>"Marzo",9=>"Abril",10=>"Mayo",11=>"Junio",12=>"Julio");
    
    if($rn==""){
        $reporte="<hr />";
        
    //************** Especialistas por area de trabajo | Fortalecimiento del aprendizaje*******************//  
        
    }elseif($rn=="1_1"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad, esc.sMunicipio 
                                from tRecursos_humanos esp inner join tRecursos_hum_ciclo ee on esp.sRFC=ee.sRFCrhc 
                                inner join tEscuelas esc on ee.sClaveEscuelaRhc=esc.sClaveEscuela
                                where nEspecialidad = 1 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas por area de trabajo | Fortalecimiento del aprendizaje</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESPECIALIDAD NUMERO 2*******************//  
        
    }elseif($rn=="1_2"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad, esc.sMunicipio 
                                from tRecursos_humanos esp inner join tRecursos_hum_ciclo ee on esp.sRFC=ee.sRFCrhc 
                                inner join tEscuelas esc on ee.sClaveEscuelaRhc=esc.sClaveEscuela
                                where nEspecialidad = 2 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas por area de trabajo | Uso did&aacute;ctico de las TIC's</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESPECIALIDAD NUMERO 3*******************//  
        
    }elseif($rn=="1_3"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad, esc.sMunicipio 
                                from tRecursos_humanos esp inner join tRecursos_hum_ciclo ee on esp.sRFC=ee.sRFCrhc 
                                inner join tEscuelas esc on ee.sClaveEscuelaRhc=esc.sClaveEscuela
                                where nEspecialidad = 3 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas por area de trabajo | Lengua Adicional</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESPECIALIDAD NUMERO 4*******************//  
        
    }elseif($rn=="1_4"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad, esc.sMunicipio 
                                from tRecursos_humanos esp inner join tRecursos_hum_ciclo ee on esp.sRFC=ee.sRFCrhc 
                                inner join tEscuelas esc on ee.sClaveEscuelaRhc=esc.sClaveEscuela
                                where nEspecialidad = 4 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas por area de trabajo | Arte y Cultura</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESPECIALIDAD NUMERO 5*******************//  
        
    }elseif($rn=="1_5"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad, esc.sMunicipio 
                                from tRecursos_humanos esp inner join tRecursos_hum_ciclo ee on esp.sRFC=ee.sRFCrhc 
                                inner join tEscuelas esc on ee.sClaveEscuelaRhc=esc.sClaveEscuela
                                where nEspecialidad = 5 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas por area de trabajo | Alimentaci&oacute;n Saludable</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //Especialidad numero 6//  
        
    }elseif($rn=="1_6"){
        $consulta=mysql_query("select sRFC, sNombreRH, sApellidoPaternoRH, sApellidoMaternoRH, esc.sNombre, esc.sLocalidad, esc.sMunicipio 
                                from tRecursos_humanos esp inner join tRecursos_hum_ciclo ee on esp.sRFC=ee.sRFCrhc 
                                inner join tEscuelas esc on ee.sClaveEscuelaRhc=esc.sClaveEscuela
                                where nEspecialidad = 6 and esc.nAfiliada=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas por area de trabajo | Recreaci&oacute;n y Desarrollo F&iacute;sico</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS SIN ESPECIALISTAS******************************//  
        
    }elseif($rn==2){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, nModalidad, nNivel, nZona, nSector 
                                from tEscuelas 
                                where not exists(select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC 
                                where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)");
               
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2></h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th>
                        <th>Nivel</th><th>Zona</th><th>Sector</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                   <td>".$mod[$res[4]]."</td><td>".$niv[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** DIRECTORES SIN APOYOS ECONÓMICOS*************************//  
        
    }elseif($rn=="3_1"){
        $consulta=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,sNombre,sLocalidad,sMunicipio 
                        from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc
                        inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela 
                        where nPuesto = 2 and rh.sRFC like (select sRFCae from tApoyos_economicos 
                        where nBrutoMensual = 0 and sRFCae like rh.sRFC group by sRFCae)");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Directores sin apoyos econ&oacute;micos</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************DOCENTES SIN APOYOS ECONÓMICOS *******************//  
        
    }elseif($rn=="3_2"){
        $consulta=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,sNombre,sLocalidad,sMunicipio 
                        from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc
                        inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela 
                        where nPuesto = 1 and rh.sRFC like (select sRFCae from tApoyos_economicos 
                        where nBrutoMensual = 0 and sRFCae like rh.sRFC group by sRFCae)");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Docentes sin apoyos econ&oacute;micos</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESPECIALISTAS SIN APOYOS ECONÓMICOS *******************//  
        
    }elseif($rn=="3_3"){
        $consulta=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,sNombre,sLocalidad,sMunicipio 
                        from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc
                        inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela 
                        where nPuesto = 3 and rh.sRFC like (select sRFCae from tApoyos_economicos 
                        where nBrutoMensual = 0 and sRFCae like rh.sRFC group by sRFCae)");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas sin apoyos econ&oacute;micos</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************DIRECTORES CON APOYO ECONÓMICOS*******************//  
        
    }elseif($rn=="4_1"){
        $consulta=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,sNombre,sLocalidad,sMunicipio 
                        from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc
                        inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela 
                        where nPuesto = 2 and rh.sRFC like (select sRFCae from tApoyos_economicos 
                        where nBrutoMensual <> 0 and sRFCae like rh.sRFC group by sRFCae)");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Directores con apoyos econ&oacute;micos</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************DOCENTES CON APOYOS ECONÓMICOS *******************//  
        
    }elseif($rn=="4_2"){
        $consulta=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,sNombre,sLocalidad,sMunicipio 
                        from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc
                        inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela 
                        where nPuesto = 1 and rh.sRFC like (select sRFCae from tApoyos_economicos 
                        where nBrutoMensual <> 0 and sRFCae like rh.sRFC group by sRFCae)");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Docentes con apoyos econ&oacute;micos</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESPECIALISTAS CON APOYOS ECONÓMICOS *******************//  
        
    }elseif($rn=="4_3"){
        $consulta=mysql_query("select sRFC,sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,sNombre,sLocalidad,sMunicipio 
                        from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on rh.sRFC=rhe.sRFCrhc
                        inner join tEscuelas esc on rhe.sClaveEscuelaRhc=esc.sClaveEscuela 
                        where nPuesto = 3 and rh.sRFC like (select sRFCae from tApoyos_economicos 
                        where nBrutoMensual <> 0 and sRFCae like rh.sRFC group by sRFCae)");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Especialistas con apoyos econ&oacute;micos</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS DE ACUERDO A CANTIDAD DE DOCENTES*******************//  
        
    }elseif($rn==5){
        $consulta=mysql_query("select sClaveEscuela, sNombre, sLocalidad, sMunicipio, nModalidad, nNivel, 
                              (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                              from tEscuelas where nAfiliada=1 order by docen desc");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas de acuerdo a cantidad de presonal que labora</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Modalidad</th>
                        <th>Nivel</th><th># Docentes</th></tr>";
            do{
               $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td>
                            <td>".$res[3]."</td><td>".$mod[$res[4]]."</td><td>".$niv[$res[5]]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** PERSONAL DE ACUERDO AL MONTO DADO EN APOYOS ECONÓMICOS - directores*******************//  
        
    }elseif($rn=="6_1"){
        $consulta=mysql_query("select sRFC, sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,e.sNombre,e.sLocalidad,e.sMunicipio,
                                (select (nBrutoMensual-nIsrMensual) from tApoyos_economicos where sRFCae like sRFC group by sRFCae) monto 
                                from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on (rh.sRFC=rhe.sRFCrhc) 
                                inner join tEscuelas e on rhe.sClaveEscuelaRhc=e.sClaveEscuela 
                                where nPuesto=2 order by monto desc");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Directores seg&uacute;n monto dado</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Monto Mensual</th></tr>";
            do{
                $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** Docente de acuerod al monto ntregado mensualmente*******************//  
        
    }elseif($rn=="6_2"){
        $consulta=mysql_query("select sRFC, sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,e.sNombre,e.sLocalidad,e.sMunicipio,
                                (select (nBrutoMensual-nIsrMensual) from tApoyos_economicos where sRFCae like sRFC group by sRFCae) monto 
                                from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on (rh.sRFC=rhe.sRFCrhc) 
                                inner join tEscuelas e on rhe.sClaveEscuelaRhc=e.sClaveEscuela 
                                where nPuesto=1 order by monto desc");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Docentes seg&uacute;n monto dado</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Monto Mensual</th></tr>";
            do{
                $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESPECIALISTAS SEGUN MONTO *******************//  
        
    }elseif($rn=="6_3"){
        $consulta=mysql_query("select sRFC, sNombreRH,sApellidoPaternoRH,sApellidoMaternoRH,e.sNombre,e.sLocalidad,e.sMunicipio,
                                (select (nBrutoMensual-nIsrMensual) from tApoyos_economicos where sRFCae like sRFC group by sRFCae) monto 
                                from tRecursos_humanos rh inner join tRecursos_hum_ciclo rhe on (rh.sRFC=rhe.sRFCrhc) 
                                inner join tEscuelas e on rhe.sClaveEscuelaRhc=e.sClaveEscuela 
                                where nPuesto=3 order by monto desc");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Docentes seg&uacute;n monto dado</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>RFC</th><th>Nombre</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Monto Mensual</th></tr>";
            do{
                $reporte.="<tr bgcolor=".$colr[$cont%2]."><td>$cont</td><td>".$res[0]."</td><td>".$res[1]." ".$res[2]." ".$res[3]."</td>
                   <td>".$res[4]."</td><td>".$res[5]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS DE OTRO CICLO ESCOLAR 2012-2013*******************//  
        
    }elseif($rn=="8_1"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** escuelas  FEDERALZIADAS DEL CICLO 2012-2013*******************//  
        
    }elseif($rn=="8_2"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS FEDERALIZADAS PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_3"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 1 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS FEDERALIZADAS PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_4"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 1 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES FEDERALIZADAS 2012-2013 *******************//  
        
    }elseif($rn=="8_5"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 1 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Especiales del ciclo 2012-2013</h2>";

            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_55"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESTATALES PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_6"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 2 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS ESTATALES PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_7"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 2 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_8"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 2 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS INDIGENAS*******************//  
        
    }elseif($rn=="8_85"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Ind&iacute;genas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS indigenas PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_9"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 3 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS indigenas PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_10"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 3 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_11"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=3 and nModalidad = 3 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*******************************************************************************************************************************************************************//  
                  //**************ESCUELAS DE OTRO CICLO ESCOLAR 2011-2012*******************//  
        
    }elseif($rn=="8_12"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** escuelas  FEDERALZIADAS DEL CICLO 2012-2013*******************//  
        
    }elseif($rn=="8_13"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS FEDERALIZADAS PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_14"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 1 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS FEDERALIZADAS PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_15"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 1 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES FEDERALIZADAS 2012-2013 *******************//  
        
    }elseif($rn=="8_16"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 1 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_17"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESTATALES PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_18"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 2 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS ESTATALES PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_19"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 2 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_20"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 2 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS INDIGENAS*******************//  
        
    }elseif($rn=="8_21"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Ind&iacute;genas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS indigenas PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_22"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 3 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            

        }
        
    //************** ESCUELAS indigenas PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_23"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 3 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_24"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=2 and nModalidad = 3 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
        //**************ESCUELAS DE OTRO CICLO ESCOLAR 2010-2011*******************//  
        
    }elseif($rn=="8_25"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** escuelas  FEDERALZIADAS DEL CICLO 2012-2013*******************//  
        
    }elseif($rn=="8_26"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS FEDERALIZADAS PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_27"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 1 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS FEDERALIZADAS PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_28"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 1 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES FEDERALIZADAS 2012-2013 *******************//  
        
    }elseif($rn=="8_29"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 1 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Federalizadas Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_30"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESTATALES PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_31"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 2 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS ESTATALES PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_32"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 2 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_33"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 2 AND nNivel = 3");
       
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Estatales Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS INDIGENAS*******************//  
        
    }elseif($rn=="8_34"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas Ind&iacute;genas del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS indigenas PRIMARIAS CICLO 2012-2013 *******************//  
        
    }elseif($rn=="8_35"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 3 AND nNivel = 2");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Primarias del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //************** ESCUELAS indigenas PREESCOLARES 2012-2013*******************//  
        
    }elseif($rn=="8_36"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 3 AND nNivel = 1");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Preescolares del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //**************ESCUELAS ESPECIALES ESTATALES 2012-2013 *******************//  
        
    }elseif($rn=="8_37"){
        $consulta=mysql_query("select sClaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,nModalidad,nZona,nSector
                                from tEscuelas inner join tEscuelas_ciclo ec on sClaveEscuela=sClaveEscuelaCiclo
                                where ec.nCiclo=1 and nModalidad = 3 AND nNivel = 3");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas indigenas Especiales del ciclo 2012-2013</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th>
                <th>Nivel</th><th>Modalidad</th><th>Zona</th><th>Sector</th></tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$mod[$res[5]]."</td><td>".$res[6]."</td><td>".$res[7]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*******************************************************************************************************************************************************************//  
        ///////////ESCUELAS CON MAYOR CANTIDAD DE DOCENTES, ALUMNOS Y UN ESPECIALISTA FEDERALIZADAS///////////////////////////////////////////////
    }elseif($rn=="9_1"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=1 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Nivel</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_2"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=1 and nNivel=2 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_3"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=1 and nNivel=1 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_4"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=1 and nNivel=3 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_5"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=2 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Nivel</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_6"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=2 and nNivel=2 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_7"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=2 and nNivel=1 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_8"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=2 and nNivel=3 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_9"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,nNivel,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=3 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Nivel</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$niv[$res[4]]."</td><td>".$res[5]."</td><td>".$res[6]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_10"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=3 and nNivel=2 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_11"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=3 and nNivel=1 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }elseif($rn=="9_12"){
        $consulta=mysql_query("select sclaveEscuela,sNombre,sLocalidad,sMunicipio,
                                (select sum(nAlumnos) from tNum_alum na, tAlumnos a where na.idNumAlum=a.idAlumnos and a.sClaveEscuelaAl like sClaveEscuela) alumnos, 
                                (select count(*) from tRecursos_hum_ciclo where sClaveEscuelaRhc like sClaveEscuela) docen 
                                from tEscuelas where nAfiliada=1 and nModalidad=3 and nNivel=3 and exists
                                (select * from tRecursos_hum_ciclo inner join tRecursos_humanos rh on sRFCrhc=sRFC where sClaveEscuelaRhc=sClaveEscuela and rh.nPuesto = 3)
                                order by alumnos desc,docen desc;");
        
        if($res=mysql_fetch_array($consulta)){
            $reporte="<h2>Escuelas con mayor cantidad de alumnos y docentes y al menos un especialista</h2>";
            $reporte.= "<tr bgcolor='#DDDDDD'><th>#</th><th>Clave</th><th>Escuela</th><th>Localidad</th><th>Municipio</th><th>Alumnos</th><th>Docentes</th>
                </tr>";
            do{
                $reporte.="<tr bgcolor='".$colr[$cont%2]."'><td>$cont</td><td>".$res[0]."</td><td>".$res[1]."</td><td>".$res[2]."</td><td>".$res[3]."</td>
                    <td>".$res[4]."</td><td>".$res[5]."</td></tr>"; 
               $cont++;
            }while($res=mysql_fetch_array($consulta));
        }else{
            $reporte="No hay resultados";            
        }
        
    //*************************************************************************//  
    }

    return $reporte;
}
?>