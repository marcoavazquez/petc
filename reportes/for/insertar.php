<html>
<head><title>Tt</title></head>
<body>
Esto debería funcionar
<?php
include('conec.php');
$link=Conectarse();
$bm=1;
$im=1;
$id=0;
for($a=1;$a<=10;$a++){
	
	for($i=1;$i<=11;$i++){
		$id++;
		$bm=$a+$i*888;
		$im=77*$i+$i+$i;
		echo $id ." = ID - - bm= ".$bm." im= ".$im."<br >";
	/////////////	mysql_query("update tapoyos_econ_rh set nBrutoMensualRH=$bm,nIsrMensualRH=$im where idApoyosEconRh=$id");
		
	}
}
?>
</body>
</html>