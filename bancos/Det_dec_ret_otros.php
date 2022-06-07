<?include ("../class/conect.php");  include ("../class/funciones.php"); 
$conn=pg_connect("host=".$host." port=".$port." password=".$password." user=".$user." dbname=".$dbname."");
if (pg_ErrorMessage($conn)) { echo "<p><b>Ocurrio un error conectando a la base de datos: .</b></p>"; exit; }
if (!$_GET){$codigo_mov='';}else{$codigo_mov=$_GET["codigo_mov"];}  $fecha_hoy=asigna_fecha_hoy();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>SIA ORDENAMIENTO DE PAGO (Detalles Planillas Retenci�n Otros)</title>
<LINK  href="../class/sia.css" type="text/css" rel="stylesheet">
</head>
<body>
<table width="845" border="0" cellspacing="0" cellpadding="0">
   <tr height="5"> <td><p>&nbsp;</p></td></tr>
   <tr> <td>
<?
$sql="SELECT fecha_emision,nro_orden,tipo_mov,ban029.ced_rif,tipo_documento,nro_documento,nro_con_factura,monto_pago,monto_objeto,tasa,monto_retencion,fecha_factura,pre099.nombre FROM ban029,pre099 where ban029.ced_rif=pre099.ced_rif and codigo_mov='$codigo_mov' order by tipo_retencion";
$res=pg_query($sql); 
?>
 <table width="950" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <td width="940">
       <table width="940"  border="1" cellspacing='0' cellpadding='0' align="left" id="ret_orden">
         <tr height="20" class="Estilo5">
		   <td width="50"  align="left" bgcolor="#99CCFF"><strong>id.</strong></td>
		   <td width="100"  align="left" bgcolor="#99CCFF"><strong>Fecha Orden</strong></td>
		   <td width="100"  align="left" bgcolor="#99CCFF"><strong>Nro. Orden</strong></td>
		   <td width="300" align="left" bgcolor="#99CCFF" ><strong>Beneficiario</strong></td>		   
           <td width="100"  align="left" bgcolor="#99CCFF"><strong>Rif</strong></td>
		   <td width="120" align="right" bgcolor="#99CCFF"><strong>Monto Objeto</strong></td>
           <td width="120" align="right" bgcolor="#99CCFF" ><strong>Monto Bruto</strong></td>
           <td width="120" align="right" bgcolor="#99CCFF" ><strong>Monto Retencion</strong></td>
           
         </tr>
<? $total=0;
while($registro=pg_fetch_array($res)){ $total=$total+$registro["monto_retencion"];
$monto_o=formato_monto($registro["monto_objeto"]); $tasa=formato_monto($registro["tasa"]); $monto_p=formato_monto($registro["monto_pago"]); $monto_r=formato_monto($registro["monto_retencion"]);
  $sfecha=$registro["fecha_emision"];  $fecha = substr($sfecha,8,2)."/".substr($sfecha,5,2)."/".substr($sfecha,0,4);  
?>
         <tr bgcolor='#FFFFFF' bordercolor='#000000' height="20" class="Estilo5" onMouseOver="this.style.backgroundColor='#CCCCCC';this.style.cursor='hand';" onMouseOut="this.style.backgroundColor='#FFFFFF'"o"];" onDblClick="javascript:Llama_Modificar('<? echo $codigo_mov; ?>');">
           
           <td width="50" align="left"><? echo $registro["tipo_mov"]; ?></td>
		   <td width="100" align="left"><? echo $fecha; ?></td>
		   <td width="100" align="left"><? echo $registro["nro_orden"]; ?></td>
		   <td width="300" align="left"><? echo $registro["nombre"]; ?></td>
	       <td width="100" align="left"><? echo $registro["ced_rif"]; ?></td>
	       <td width="120" align="right"><? echo $monto_o; ?></td>
		   <td width="120" align="right"><? echo $monto_p; ?></td>
           <td width="120" align="right"><? echo $monto_r; ?></td>
           
         </tr>
         <? }
 $total=formato_monto($total);
?>
       </table></td>
   </tr>
   <tr> <td>&nbsp;</td> </tr>  <tr> <td>&nbsp;</td> </tr>
   <tr>
     <td><table width="880" border="0">
       <tr>
         <td width="580">&nbsp;</td>
         <td width="150" align="center"><span class="Estilo5">TOTAL RETENCION :</span></td>
         <td><table width="150" border="1" cellspacing="0" cellpadding="0">
           <tr> <td width="123" align="right" class="Estilo5"><? echo $total; ?></td> </tr>
         </table></td>
       </tr>
     </table></td>
   </tr>
 </table>
 <p>&nbsp;</p>
</body>
</html>
<? pg_close(); ?>
