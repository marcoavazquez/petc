<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");

$id=$_GET['id'];

mysql_query("delete from coordinacion where id_adm=$id");
$pagina="coordinacion.php";
             header("Location: $pagina");

?>