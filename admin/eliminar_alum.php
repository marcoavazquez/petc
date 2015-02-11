<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");

$id=$_GET['id'];
$clave=$_GET['clave'];
mysql_query("delete from tnum_alum where idNumAlum=$id");
$pagina="cambesc.php?claves=$clave";
             header("Location: $pagina");

?>