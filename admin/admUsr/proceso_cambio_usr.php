<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");

$id=$_GET['id'];

extract ($_REQUEST);
	mysql_query("update usuario set usuario='$usr_usuario',contrasena='$usr_pass',tipo='usr_tipo' where id='$id'");
	$pagina="usuario.php";
             header("Location: $pagina");
?>