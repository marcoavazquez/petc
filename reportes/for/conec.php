<?php 
function Conectarse(){
if (!($link=mysql_connect("localhost","Marco","mava189mava189")))
{
exit();
}
if (!mysql_select_db("p_etc",$link))
{
exit();
}
return $link;
} 
/*include("conec.php");
Taller de PHP pecesama
56
$link=Conectarse();
$result=mysql_query("select * from tablacurso",$link);
*/
?>
