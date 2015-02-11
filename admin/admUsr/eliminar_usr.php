<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");

$id=$_GET['id'];

mysql_query("delete from usuario where id=$id");
$pagina="usuario.php";
             header("Location: $pagina");

?>