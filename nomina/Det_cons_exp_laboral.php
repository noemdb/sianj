<?include ("../class/conect.php");  include ("../class/funciones.php");
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SIA N&oacute;MINA Y PERSONAL (Detalles Informaci&oacute;n Laboral)</title>
<LINK href="../class/sia.css" type="text/css" rel="stylesheet">
</head>
<body>
 <table width="845" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td>
<?php if (!$_GET){$cod_empleado='';} else{$cod_empleado=$_GET["cod_empleado"];}
$sql="SELECT * FROM NOM010  where cod_empleado='$cod_empleado' order by fecha_desde"; $res=pg_query($sql);
?>
       <table width="840"  border="1" cellspacing='0' cellpadding='0' align="left" id="ret_estructura">
         <tr height="20" class="Estilo5">
           <td width="80" align="center" bgcolor="#99CCFF"><strong>Fecha Desde</strong></td>
           <td width="80" align="center" bgcolor="#99CCFF"><strong>Fecha Hasta</strong></td>
           <td width="200" align="center" bgcolor="#99CCFF" ><strong>Nombre Empresa </strong></td>
           <td width="200" align="center" bgcolor="#99CCFF" ><strong>Departamento </strong></td>
           <td width="180" align="center" bgcolor="#99CCFF" ><strong>Ultimo Cargo </strong></td>
           <td width="100" align="right" bgcolor="#99CCFF" ><strong>Sueldo</strong></td>
         </tr>
<? while($registro=pg_fetch_array($res)){$sfecha=$registro["fecha_desde"]; $fechad=formato_ddmmaaaa($sfecha); $sfecha=$registro["fecha_hasta"]; $fechah=formato_ddmmaaaa($sfecha); $monto_s=formato_monto($registro["sueldo"]);
?>
         <tr bgcolor='#FFFFFF' bordercolor='#000000' height="20" class="Estilo5" onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#FFFFFF'"o"];" >
           <td width="80" align="left"><? echo $fechad; ?></td>
           <td width="80" align="left"><? echo $fechah; ?></td>
           <td width="200" align="left"><? echo $registro["empresa"]; ?></td>
           <td width="200" align="left"><? echo $registro["departamento"]; ?></td>
           <td width="180" align="left"><? echo $registro["cargo"]; ?></td>
           <td width="100" align="right"><? echo $monto_s; ?></td>
         </tr>
         <?}?>
       </table></td>
   </tr>
 </table>
</body>
</html>
<?  pg_close();?>