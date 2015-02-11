<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    	<title>Explorador</title>
        <style>
			.vlv{
				color: #00a;
			}
			.vlv:hover{
				color:#005;
			}
			.arch{
				color:#444;
				text-decoration:none;
			}
			.arch:hover{
				color:#666;
				text-decoration:underline;
			}
			.crp{
				color:#c00;
				text-decoration:none;
			}
			.crp:hover{
				color:#d00;
				text-decoration:underline;
			}
		</style>
    </head>
<body>
<form action="explorador.php?carpeta=<?php 
	if(!isset($_GET['carpeta']))
	echo "./";
else 
	echo $_GET['carpeta'];
?>" 
method="post" >
Seleccione tipo de archivo:
	<select name="tipo" >
	<option value="todos">Todos</option>
    <option value="carp">Carpetas</option>
    <option value="word">Word</option>
    <option value="excel">Excel</option>
    <option value="ppt">Power Point</option>
    <option value="pdf">PDF</option>
    <option value="txt">Archivo de Texto</option>
    <option value="imagen">Imagen</option>
    <option value="comp">Comprimidos</option>
	</select>
    <input type="submit" value="Mostrar" />
</form>

<?php
if(!isset($_GET['carpeta']))
	$path="./";
else
	$path=$_GET['carpeta'];
	
if(!isset($_POST['tipo']))
	$tipo="todos";
else
	$tipo=$_POST['tipo'];

	$p = $_SERVER['PHP_SELF'];
	$crpact = dirname($p);
	
	$directorio=dir($_SERVER['DOCUMENT_ROOT']."/$crpact/".$path);
	$pn= array();//pila de nombres
	//bucle para llenar las pilas :P
	while ($archivo = $directorio->read()){
	//no mostrar ni "." ni ".." ni el propio "index.php"
		if(($archivo!="index.php") && ($archivo!=".") && ($archivo!="..") && substr($archivo,-4)!=".php" && substr($archivo,-4)!=".css" && substr($archivo,-3)!=".js" && substr($archivo,-5)!=".html" && substr($archivo,-4)!=".htm"){
			array_push($pn, $archivo);
		}
	}
	$directorio->close();

	//ordenar las 3 pilas segun la pila de nombres
	@array_multisort($pn,$pf,$pt);

	echo "<a href='explorador.php' class='vlv'>Ir a carpeta raiz</a>
			<br />";

//mostrar los datos
	switch($tipo){
		case "todos"://MUESTRA TODOS LOS ARCHIVOS
			echo "<b>TODOS LOS ARCHIVOS</b><br />";
			for($i=0; $i<count($pn); $i++){
				if(is_dir($_SERVER['DOCUMENT_ROOT']."/$crpact/".$path."/".$pn[$i])){
					echo "<a href='explorador.php?carpeta=$path/".$pn[$i]."' class='crp' >$pn[$i]</a><br />\n";
				}elseif(!is_dir($pn[$i])){
					echo "<a href='$path/$pn[$i]' class='arch'>$pn[$i]</a><br />";
				}
			}
		break;
		
		case "word":
			echo "<b>ARCHIVOS DE MICROSOFT WORD</b><br />";
			for($i=0; $i<count($pn); $i++){
				if(substr($pn[$i],-4)==".doc" or substr($pn[$i],-5)==".docx"){
						echo "<a href='$pn[$i]' class='arch' >$pn[$i]</a><br />";
					}else{
						echo "";
					}
			}
		break;
		
		case "excel":
			echo "<b>ARCHIVO DE MICROSOFT EXCEL</b><br />";
			for($i=0; $i<count($pn); $i++){
				if(substr($pn[$i],-4)==".xls" or substr($pn[$i],-5)==".xlsx"){
						echo "<a href='$pn[$i]' class='arch'> $pn[$i]</a><br />";
				}else{
						echo "";
				}
			}
		break;
		
		case "txt":
			echo "<b>ARCHIVO DE TEXTOS</b><br />";
			for($i=0; $i<count($pn); $i++){
				if(substr($pn[$i],-4)==".txt"){
					echo "<a href='$pn[$i]' class='arch' > $pn[$i]</a><br />";
				}else{
					echo "";
				}
			}
		break;
		
		case "imagen":
			echo "<b>IMAGENES</b><br />";
			for($i=0; $i<count($pn); $i++){
				if(substr($pn[$i],-4)==".jpg" or substr($pn[$i],-4)==".png" or substr($pn[$i],-4)==".bmp" or substr($pn[$i],-4)==".gif" or substr($pn[$i],-5)==".jpeg"){
					echo "<a href='$pn[$i]' class='arch' > $pn[$i]</a><br />";
				}else{
					echo "";
				}
			}
		break;
		
		case "pdf":
			echo "<h3>ARCHIVOS PDF'S</h3><br />";
			for($i=0; $i<count($pn); $i++){
				if(substr($pn[$i],-4)==".pdf"){
					echo "<a href='$pn[$i]' class='arch'> $pn[$i]</a><br />";
				}else{
					echo "";
				}
			}
		break;
		
		case "ppt":
			echo "<h3>ARCHIVOS DE POWER POINT</h3><br />";
			for($i=0; $i<count($pn); $i++){
				if(substr($pn[$i],-4)==".ppt" or substr($pn[$i],-5)==".pptx"){
						echo "<a href='$pn[$i]' class='arch'> $pn[$i]</a><br />";
					}else{
						echo "";
					}
				
			}
		break;
		
		case "comp":
			echo "<h3>ARCHIVOS COMPRIMIDOS</h3><br />";
			for($i=0; $i<count($pn); $i++){
				
					if(substr($pn[$i],-4)==".zip" or substr($pn[$i],-4)==".rar"){
						echo "<a href='$pn[$i]' class='arch' > $pn[$i]</a><br />";
					}else{
						echo "";
					}
				
			}
		break;
		
		case "carp":
			echo "<h3>CARPETAS</h3>";
			for($i=0; $i<count($pn); $i++){
				if(is_dir($_SERVER['DOCUMENT_ROOT']."/$crpact/".$path."/".$pn[$i])){
					echo "<a href='explorador.php?carpeta=$path/".$pn[$i]."' class='crp' >$pn[$i]</a><br />\n";
				}				
			}
		break;
	}	
?>
<br />
<a href="explorador.php" class="vlv">Ir a carpeta raiz</a> 
</body>
</html>