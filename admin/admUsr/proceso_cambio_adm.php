<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");

$id=$_GET['id'];

extract ($_REQUEST);
	$cor_hh=$cor_hora.":".$cor_min;
	mysql_query("update coordinacion set nom_evento='$cor_evento',fecha='$cor_fecha',hora='$cor_hh',lugar='$cor_lugar' where id_adm='$id'");
	$pagina="coordinacion.php";
             header("Location: $pagina");
?>