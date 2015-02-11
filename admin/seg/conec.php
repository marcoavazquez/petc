<?php 
function Conectarse(){
if (!($link=mysql_connect("localhost","root","")))
{
exit();
}
if (!mysql_select_db("e_t_c",$link))
{
exit();
}
return $link;
} 
/*include("conec.php");
$link=Conectarse();
$result=mysql_query("select * from tablacurso",$link);*/
?>

