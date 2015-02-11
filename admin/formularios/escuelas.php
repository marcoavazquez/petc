<!DOCTYPE html PUBLIC "-//W3C//DTD/XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Agregar escuelas</title>
</head>
<body bgcolor="eeffee">
<h1>Escuelas de Tiempo Completo</h1>
<hr>
<h2>Formulario de Escuelas</h2>
<form name="formesc" method="post" action="agescuelas.php" >
<table id="telemail" >
	<tr>
	<td>Clave de la escuela:</td><td><input type="text" NAME="clave_escuela"></td>
	</tr>
	<tr>
	<td>nombre de la escuela:</td><td><input type="text" NAME="nombre_escuela"><br /></td>
	</tr>
	<tr>
		<td>DIRECCION:</td><td></td>
	</tr>
	<!--tr>
		<td>Calle:</td><td><input type="text" name="calle"></td>
	</tr>
	<tr>
		<td>numero:</td><td><input type="text" name="num"></td>
	</tr>
	<tr>
		<td>colonia: </td><td><input type="text" name="colonia"></td>
	</tr-->
	<tr>
		<td>municipio: </td><td><input type="text" name="municipio"><br /></td>
	</tr>
	<tr>
		<td>localidad: </td><td><input type="text" name="localidad"></td>
	</tr>
	<!--tr>
		<td>C.P. :</td><td><input type="text" name="cp"></td>
	</tr-->
	
	<!--tr>
		<td>teléfono(s): </td><td><textarea NAME="telefono" rows="2" cols="20"></textarea><br /></td>
	</tr>
	<tr>
		<td>Correo(s) electrónico(s): </td><td><textarea NAME="email" rows="2" cols="20"></textarea><br /></td>
	</tr-->
	<tr>
		<td>tipo<i>(estatal,federal,indigena)</i></td><td><input type="text" name="tipo"></td>
	</tr>
	<!--tr>
		<td>turno</td><td><input type="text" name="turno"></td>
	</tr-->
	<tr>
	<td>Zona: </td><td><input type="text" name="zona" /></td>
	</tr>
	<tr>
	<td>Sector: </td><td><input type="text" name="sector"  /></td>
	</tr>
	<tr>
	<td>Numero de docentes: </td> <td><input type="text" name="nodocentes" /></td>
	</tr>
	<tr>
		<!--td>no_aulas</td><td><input type="text" name="no_aulas" value="vacio"><small>* este se actualizará automaticamente cuando se llene la tabla de grupos</small><br /><br /-->
		<td><input type="submit" name="accion" value="Guardar"></td>
	</tr>
</table>
</form>
</body>
</html>

