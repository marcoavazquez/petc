<?php 
mysql_connect("localhost","root","");
mysql_select_db("e_t_c");
$id=$_GET['id'];
$resultado=mysql_query("select * from coordinacion where id_adm=$id");
$res=mysql_fetch_array($resultado);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" media="all" href="calendario/calendar-green.css" title="win2k-cold-1" />
  <script type="text/javascript" src="calendario/calendar.js"></script>
  <script type="text/javascript" src="calendario/lang_calendar-es.js"></script>
  <script type="text/javascript" src="calendario/calendar-setup.js"></script>
<script> 
  function validar(){ 
	var m=document.getElementById("error");
if (document.frm_cor.cor_evento.value.length == 0) {
       m.innerHTML= "Ingrese un evento\n";
	   document.frm_cor.cor_evento.focus();
	   return false;}
	   	   
if (document.frm_cor.cor_fecha.value.length == 0) {
       m.innerHTML= "Selecciona una fecha \n";
	   document.frm_cor.cor_fecha.focus();
	   return false;}
if (document.frm_cor.cor_hora.value.length == 0) {
       m.innerHTML= "Selecciona la hora \n";
	   document.frm_cor.cor_hora.focus();
	   return false;}	   
if (document.frm_cor.cor_min.value.length == 0) {
       m.innerHTML= "Selecciona los minutos \n";
	   document.frm_cor.cor_min.focus();
	   return false;}	  
if (document.frm_cor.cor_lugar.value.length == 0) {
       m.innerHTML= "Ingrese el lugar \n";
	   document.frm_cor.cor_lugar.focus();
	   return false;}	    
}

  </script>
</head>

<body>
<form name="frm_cor" action="proceso_cambio_adm.php?id=<?php echo $res['id_adm'] ?>" method="post">
<table align="center">
<tr>
	<th>*Evento <br /> <textarea name="cor_evento" rows="3" cols="33"><?php echo $res['nom_evento'] ?></textarea></th>
    <th>*Fecha<br /> <input type="text" name="cor_fecha" id="cor_fecha" maxlength="10" value="<?php echo $res['fecha'] ?>" /><input type="button" id="lanzador" value="..." />
			<script type="text/javascript">
    Calendar.setup({
        inputField     :    "cor_fecha",      
        ifFormat       :    "%d/%m/%Y",       
        button         :    "lanzador"   
    	
	});
</script></th>
<th>*Hora anterior <?php echo $res['hora'] ?> <br /> <select name="cor_hora">
            					<option value="">--</option>
            					<option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
            				</select>:<select name="cor_min">
                            			<option value="">--</option>
                                        <option value="00">00</option>
                            			<option value="05">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        <option value="30">30</option>
                                        <option value="35">35</option>
                                        <option value="40">40</option>
                                        <option value="45">45</option>
                                        <option value="50">50</option>
                                        <option value="55">55</option>	
                            		</select></th>
          <th>*Lugar <br /><input type="text" name="cor_lugar"  value="<?php echo $res['lugar'] ?>"/></th>                          
        </tr>
        <tr><td><div id="error"></div></td></tr>
        <tr><td colspan="4" align="center"><input type="submit" value="Guardar"  onclick="return validar();"/></td>
</tr>
</table>
</form>
</body>
</html>