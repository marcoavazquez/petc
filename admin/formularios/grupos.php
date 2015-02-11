<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<title>Agregar grupos</title>
</head>
<body bgcolor="eeffef">
<h1>Escuelas de Tiempo Completo</h1>
<hr>
<h2>Formulario de Grupos</h2>
<form name="formgrup" method="post" action="aggrupos.php" >
<table>
	<tr>
	<td>Clave de la escuela:</td><td><input type="text" NAME="clave_escuela"></td>
	</tr>
	<tr>
	<td>RFC de encargado:</td><td><input type="text" name="rfc"><br /></td>
	</tr>
	<tr>
		<td>Grado:</td><td><input type="text" name="grado"></td>
	</tr>
	<tr>
		<td>Grupo:</td><td><input type="text" name="grupo"></td>
	</tr>
	<tr>
		<input type="submit" name="accion" value="Guardar">
	</tr>
</table>
</form>
</body>
</html>

