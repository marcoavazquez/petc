<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");
$id=$_GET['id'];
$resultado=mysql_query("select * from usuario where id=$id");
$res=mysql_fetch_array($resultado);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<script> 
  function validar(){ 
	var m=document.getElementById("error");
if (document.frm_usu.usr_tipo.value.length ==0) {
       m.innerHTML= "Selecciona el tipo de usuario\n";
	   document.frm_usu.usr_tipo.focus();
	   return false;}
	   	   
if (document.frm_usu.usr_usuario.value.length <= 5) {
       m.innerHTML= "Usuario invalido \n";
	   document.frm_usu.usr_usuario.focus();
	   return false;}
if (document.frm_usu.usr_pass.value.length <= 5 || document.frm_usu.usr_pass.value == document.frm_usu.usr_usuario.value) {
       m.innerHTML= "Contraseña invalida \n";
	   document.frm_usu.usr_pass.focus();
	   return false;}	   
}

  </script>
</head>

<body>
<form name="frm_usu" action="proceso_cambio_usr.php?id=<?php echo $res['id'] ?>" method="post">
<table align="center">
<tr>
<th>*Tipo de usuario anterior:<?php echo $res['tipo'] ?> <select name="usr_tipo">
				<option value="">[Selecciona]</option>
                <option value="usr">Usuario</option>
                <option value="adm">Adminitrador</option>
			</select></th>
<th>*Usuario <input type="text" name="usr_usuario" maxlength="12" size="14" value="<?php echo $res['usuario'] ?>"/></th>            
</tr>
<tr>
<th colspan="2">Contraseña <input type="password" name="usr_pass" maxlength="12" size="14" ></th>
</tr>
<tr><td><div id="error"></div></td></tr>
<tr>
<td colspan="2" align="center"><input type="submit" value="Guardar" onclick="return validar();" /></td>
</tr>
</table>
</form>
</body>
</html>