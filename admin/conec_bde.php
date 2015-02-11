<?php 
function ConectarseBDE(){
if (!($link=mysql_connect("localhost","root","")))
{
exit();
}
if (!mysql_select_db("escuelas_nivel_basico",$link))
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

